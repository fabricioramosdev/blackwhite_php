<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Venda extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Venda';
		$this->load->model('Cliente_model');
		$this->load->model('Venda_model');
		$this->load->model('Produto_model');
		$this->load->helper('date_helper');

	}

	public function index($hash = null)
	{

		$this->data['produto'] = $this->Produto_model->listaProduto();
		$this->data['clientes'] = $this->Cliente_model->listaCliente();
		$this->load->view('venda/index_view',$this->data);

	}



	public function search_produto() {

		$query = $this->input->get();

		$array = $this->Venda_model->search_produto($query['query']);
		$autocomplete = [];
		foreach ($array as $key => $value) {
			array_push($autocomplete,$value);
		}
		echo $this->input->get('callback') . '(' . json_encode($autocomplete) . ')';
	}


	public function busca_produto(){

		$id = $this->input->post();
		echo json_encode($this->Produto_model->listaProduto($id['id']));

	}


	public function finalizar_venda(){

		$form =  $this->input->post();


		$venda_itens = json_decode($form['venda_itens']);
		$venda_forma_pagamento = json_decode($form['venda_forma_pagamento']);
		$venda_desconto = json_decode($form['venda_desconto']);
		$venda_cliente = json_decode($form['venda_cliente']);


		$total_compra = 0.00;
		foreach ($venda_itens as $key => $value) {
			$total_compra += (Float)$value->total_item;
		}


		$venda = Array(
			'usuario_id'=> $this->session->usuario[0]['id'],
			'cliente_id' => (isset($venda_cliente->id))?$venda_cliente->id:null,
			'cliente_nome'=> (isset($venda_cliente->nome))?$venda_cliente->nome:null,
			'pagamento_id'=>$venda_forma_pagamento->id,
			'pagamento_descricao'=>$venda_forma_pagamento->descricao,
			'pagamento_parcelas'=>(isset($venda_forma_pagamento->parcelas))?$venda_forma_pagamento->parcelas:null,
			'pagamento_vencimento'=>(isset($venda_forma_pagamento->vencimento))?parseDate($venda_forma_pagamento->vencimento):null,
			'desconto_valor'=>(isset($venda_desconto->valor_desconto))?$venda_desconto->valor_desconto:00.00,
			'desconto_taxa'=>(isset($venda_desconto->taxa_desconto))?$venda_desconto->taxa_desconto:00.00,
			'desconto_valor_sem_desconto'=>(isset($venda_desconto->total_sem_desconto))?$venda_desconto->total_sem_desconto:00.00,
			'desconto_valor_com_desconto'=>(isset($venda_desconto->total_com_desconto))?$venda_desconto->total_com_desconto:00.00,
			'venda_total'=>(isset($venda_desconto->total_com_desconto))?$venda_desconto->total_com_desconto:$total_compra,
		);



		if($venda['cliente_id'] == null){
			unset($venda['cliente_id']);
		}

		if($venda['cliente_nome'] == null){
			unset($venda['cliente_nome']);
		}

		if($venda['pagamento_parcelas'] == null){
			unset($venda['pagamento_parcelas']);
		}

		if($venda['pagamento_vencimento'] == null){
			unset($venda['pagamento_vencimento']);
		}

		$venda_id = $this->Venda_model->save_venda($venda);

		$lista_itens = Array();
		foreach ($venda_itens as $key => $value) {

			$item = Array(
				'produto_id'=>$value->id,
				'produto_codigo'=>$value->codigo,
				'produto_descricao'=>$value->descricao,
				'produto_preco_venda'=>$value->preco_venda,
				'produto_quantidade'=>$value->quantidade_item,
				'venda_id'=>$venda_id
			);


			array_push($lista_itens,$item);
			$this->Venda_model->baixa_itens($item);

		}

		$result = $this->Venda_model->save_itens($lista_itens);

		// verifica se venda foi parcelada
		if($venda_forma_pagamento->id == 4 && (isset($venda_forma_pagamento->parcelas))){

			$data_parcela = parseDate($venda_forma_pagamento->vencimento);
			$parcela = (int) $venda_forma_pagamento->parcelas;
			$valor_parcela =  ((Float)$venda['venda_total']/$parcela);
			$cliente_id = $venda_cliente->id;
			$venda_id = $venda_id;
			$data = $data_parcela;

			$venda_parcelas = [];
			for($i = 1; $i <= $parcela;$i++){

				if($i == 1){
					$data = $data_parcela;
				}else{
					$data = date('Y-m-d', strtotime($data ."+1 month"));
				}
				$dados = Array(
					"cliente_id" => $cliente_id,
					"parcela" => "{$i}/{$parcela}",
					"data_parcela"=> $data,
					"valor_parcela"=> $valor_parcela,
					"venda_id"=>$venda_id
				);
				array_push($venda_parcelas,$dados);
			}

			$result = $this->Venda_model->save_parcelas($venda_parcelas);

		}

		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sucesso !!",
			'msg' => ":) - Venda salva com sucesso!"
		));

		echo json_encode($venda_id);

	}

	public function vdoc($id){


		$venda = $this->Venda_model->pdf_venda($id);



		$this->load->library('Pdf_Libary');
		$hash = md5($venda[0]['id']);
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle("vdoc_{$hash}");


		$PDF_HEADER_LOGO = base_url() . 'assets/media/logos/logo-4-bw.png';
		$PDF_HEADER_LOGO_WIDTH = 20;
		$PDF_HEADER_TITLE =  'DOCUMENTO VENDA - N.'.$id;
		$PDF_HEADER_SUBTITLE = "Cliente: {$venda[0]['cliente_nome']}\nData compra: {$venda[0]['registro']}";

		// set default header data
		$pdf->SetHeaderData($PDF_HEADER_LOGO,$PDF_HEADER_LOGO_WIDTH,$PDF_HEADER_TITLE,$PDF_HEADER_SUBTITLE);


		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------
		// set font
		$pdf->SetFont('dejavusans', '', 10, '', false);

		// add a page
		$pdf->AddPage();


		$html_iten = '';
		foreach ($venda[0]['itens'] as $key => $value) {
			$html_iten .= "<tr>
			<td>{$value['produto_descricao']}</td>
			<td>{$value['produto_quantidade']}</td>
			<td>R$ {$value['produto_preco_venda']}</td>
			</tr>";

		}

	 $html_1 = <<<EOD
	 <h3>Itens na venda:</h3>
	 <table style="width: 600px" border="1" cellspacing="1" cellpadding="3">
	 <tbody>
	 <tr style="background-color: #dedbd0;">
	 <td style="width: 200px;"><strong>Descri&ccedil;&atilde;o</strong></td>
	 <td style="width: 200px;"><strong>Quantidade</strong></td>
	 <td style="width: 200px;"><strong>Pre&ccedil;o</strong></td>
	 </tr>
	 	{$html_iten}
	 <tr style="background-color: #dedbd0;">
	 <td style="width: 600px;" colspan="3">
	 <h3 style="text-align: center;">Total: R$ {$venda[0]['venda_total']}</h3>
	 </td>
	 </tr>
	 </tbody>
	 </table>
EOD;



	$html_parcela = '';
	foreach ($venda[0]['parcelas'] as $key => $value) {
		$vencimento  = to_brazilian($value['data_parcela']);
		$html_parcela .= "<tr>
		<td>{$value['parcela']}</td>
		<td>{$vencimento}</td>
		<td>R$ {$value['valor_parcela']}</td>
		<td>___/___/_____ Visto:______________</td>
		</tr>";

	}

 $html_2 = <<<EOD
 <h3>Parcelas:</h3>
 <table style="width: 600px" border="1" cellspacing="1" cellpadding="3">
 <tbody>
 <tr style="background-color: #dedbd0;">
 <td style="width: 80px;"><strong>Parcela</strong></td>
 <td style="width: 150px;"><strong>Data Venc.</strong></td>
 <td style="width: 150px;"><strong>R$ Valor</strong></td>
 <td style="width: 220px;"><strong>Visto</strong></td>
 </tr>
	{$html_parcela}

 </tbody>
 </table>
EOD;


$traco = '';
for ($i = -5; $i <= strlen($venda[0]['cliente_nome']); $i++) {

	$traco .= '_';
}
$agora = date('d/m/Y');

 $html_3 = <<<EOD
<table style="width: 600px; height: 44px;">
<tbody>
<tr>
<td style="width: 200px;">&nbsp;</td>
<td style="width: 400px;">{$traco}</td>
</tr>
<tr>
<td style="width: 200px;">&nbsp;</td>
<td style="width: 400px;"><strong>{$venda[0]['cliente_nome']}</strong><br> {$agora}</td>
</tr>
</tbody>
</table>
EOD;


$pdf->writeHTMLCell(0, 0, '', '', $html_1, 0, 1, 0, true, '', true);
$pdf->ln(5);
$pdf->writeHTMLCell(0, 0, '', '', $html_2, 0, 1, 0, true, '', true);
$pdf->ln(10);
$pdf->SetY(-70);
$pdf->writeHTMLCell(0, 0, '', '', $html_3, 0, 1, 0, true, '', true);
$pdf->ln();

//========= force print dialog
$js = 'print(true);';
//========== set javascript
$pdf->IncludeJS($js);
//========== I =  abre no navegador, D = faz o download
$pdf->Output("vdoc_{$hash}.pdf", 'I');

	}



}
