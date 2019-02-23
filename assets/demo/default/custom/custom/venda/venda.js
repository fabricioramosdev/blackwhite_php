$('formularioFormaPagamento').hide();

var carrinho_compras = [{itens:new Array()},{desconto:new Array()},{pagamento: new Array()},{cliente: new Array()}]


var salvar_venda = function(){

  var venda_itens = []
  for(var elem in carrinho_compras[0]['itens']){
    venda_itens.push(carrinho_compras[0]['itens'][elem])
  }
  venda_itens =  JSON.stringify(venda_itens);

  var venda_desconto = {}
  venda_desconto =  JSON.stringify({
    valor_desconto:carrinho_compras[1]['desconto']['descontoValor'],
    taxa_desconto:carrinho_compras[1]['desconto']['descontoTaxa'],
    total_sem_desconto:carrinho_compras[1]['desconto']['valorSemDesconto'],
    total_com_desconto:carrinho_compras[1]['desconto']['valorComDesconto'],
  });


  var venda_forma_pagamento = {}
  venda_forma_pagamento = JSON.stringify({
    id:carrinho_compras[2]['pagamento']['forma'],
    descricao:carrinho_compras[2]['pagamento']['descricao'],
    parcelas:carrinho_compras[2]['pagamento']['parcelas'],
    vencimento:carrinho_compras[2]['pagamento']['vencimento']
  });

  var venda_cliente = {}
  venda_cliente = JSON.stringify({
     id:carrinho_compras[3]['cliente']['id'],
     nome:carrinho_compras[3]['cliente']['nome']
   });



  $.ajax(
    {
      url: app_u + 'Venda/finalizar_venda',
      data: {
        venda_forma_pagamento:venda_forma_pagamento,
        venda_desconto:venda_desconto,
        venda_cliente:venda_cliente,
        venda_itens:venda_itens
      },
      type: 'post',
      dataType: 'json',
      cache: false,
      success: function (data) {
        if(data){


        }
      }
    }
  );

}



var adicionar_produto = function(elem){
  $.ajax(
    {
      url: app_u +'Venda/busca_produto',
      data: {
        id: elem.value,
      },
      type: 'post',
      dataType: 'json',
      success : function (data) {

        if(data){

          let produto = data[0];
          let preco_venda = parseFloat(produto.preco_venda).toFixed(2);
          let total_item = parseFloat( produto.preco_venda*1).toFixed(2);
          produto.total_item = total_item;
          produto.quantidade_item = 1;
          // verifica se existe produto no carrinho se existir ele add mais um e recalcula os valores
          if(valida_item_duplicados(produto,carrinho_compras) == false){
            carrinho_compras[0]['itens'].push(produto);
          }

          monta_tabela(carrinho_compras);

        }

      }
    }
  );
  elem.value = '';
}


var valida_item_duplicados =  function(produto,carrinho_compras){

  let existe =  false
  if(carrinho_compras[0]['itens'].length > 0){
    for(var x in carrinho_compras[0]['itens']){
      if(produto.id == carrinho_compras[0]['itens'][x].id){
        // se existe produto no carrinho add +1 na quantidade e re-calcula o valor total
        let preco_venda = parseFloat(carrinho_compras[0]['itens'][x].preco_venda).toFixed(2);
        carrinho_compras[0]['itens'][x].quantidade_item += 1;
        let total_item = parseFloat( carrinho_compras[0]['itens'][x].preco_venda*carrinho_compras[0]['itens'][x].quantidade_item).toFixed(2);
        carrinho_compras[0]['itens'][x].total_item = total_item;
        existe =  true
      }
    }
  }
  return existe
}


var total_itens_venda =  function(){
  let total_itens = 0;
  total_itens = carrinho_compras[0]['itens'].length
  return total_itens
}

var soma_valor_itens_venda =  function(){
  let soma = 0;
  for(valor in carrinho_compras[0]['itens']){
    if(valor != 'desconto'){
      soma += parseFloat(carrinho_compras[0]['itens'][valor].total_item)
    }
  }
  return soma.toFixed(2)
}

var altera_quantidade = function(quantidade,id){

  let soma =  parseFloat($('valorTotalVenda').html());
  let table = $('#table_produtos');

  $.each(carrinho_compras[0]['itens'], function(index,value){
    if(value.id == id){
      carrinho_compras[0]['itens'][index].total_item =  parseFloat(carrinho_compras[0]['itens'][index].preco_venda*quantidade).toFixed(2);
      carrinho_compras[0]['itens'][index].quantidade_item = parseInt(quantidade);
      table.find(`tr:eq(${index+1})`).find("td:eq(4)").html(`R$ ${ carrinho_compras[0]['itens'][index].total_item}`);

    }
  });

  $('valorTotalVenda').html('');
  $('valorTotalVenda').html(soma_valor_itens_venda());

  $('descontoValor').html('00.00')
  $('descontoTaxa').html('00')
  carrinho_compras[1]['desconto'] = '';

}


var monta_tabela = function(carrinho_compras){

  let table = $('#table_produtos');

  $("#table_produtos tbody tr").remove();
  for(key in carrinho_compras[0]['itens']){

    table.append(`<tr>
      <td>${carrinho_compras[0]['itens'][key].codigo}<inpuy type="hidden" name="id" value="${carrinho_compras[0]['itens'][key].id}"></td>
      <td>${carrinho_compras[0]['itens'][key].descricao}</td>
      <td>
      <input type="number" name="quantidade" class="form-control" max="${carrinho_compras[0]['itens'][key].estoque_saldo}" min="1" value="${carrinho_compras[0]['itens'][key].quantidade_item}" onchange="altera_quantidade(this.value,${carrinho_compras[0]['itens'][key].id})">
      </td>
      <td>R$ ${carrinho_compras[0]['itens'][key].preco_venda}</td>
      <td>R$<valorTotalitem> ${carrinho_compras[0]['itens'][key].total_item}</valorTotalitem></td>
      <td>
      <button type="button" class="btn btn-danger btn-elevate btn-circle btn-icon" onclick="deletar_produto(${carrinho_compras[0]['itens'][key].id})" title="Excluir Produto"><i class="flaticon-delete"></i></button>
      </td>
      </tr>`);

    }


    $('input[name="quantidade"]').TouchSpin({
      buttondown_class: 'btn btn-secondary',
      buttonup_class: 'btn btn-secondary',
      verticalbuttons: true,
      verticalupclass: 'la la-angle-up',
      verticaldownclass: 'la la-angle-down'
    });

    $('itensCarrinho').html('');
    $('itensCarrinho').html(total_itens_venda());
    $('valorTotalVenda').html('');
    $('valorTotalVenda').html(soma_valor_itens_venda());

    $('descontoValor').html('00.00')
    $('descontoTaxa').html('00')
    carrinho_compras[1]['desconto'] = '';

  }

  var deletar_produto =  function(elem){

    swal({
      title: 'Você tem certeza?',
      text: "Você não poderá reverter isso!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sim, exclua!',
      cancelButtonText: 'Não, cancelar!',
      reverseButtons: true
    }).then(function(result){
      if (result.value) {

        if(carrinho_compras[0]['itens'].length > 0){
          for(var x in carrinho_compras[0]['itens']){
            if(elem == carrinho_compras[0]['itens'][x].id){
              carrinho_compras[0]['itens'].splice(x,1)
            }
          }
          monta_tabela(carrinho_compras);
        }
      }

    });

      carrinho_compras[1]['desconto'] = '';

  }

  var desconto_R$_dinheiro = function(x){

    let total =  parseFloat(soma_valor_itens_venda());
    let valor = parseFloat(x);
    desconto = (total - valor);

    $('descontoValor').html('')
    $('descontoValor').html(valor.toFixed(2));

    $('valorTotalVenda').html('');
    $('valorTotalVenda').html(desconto.toFixed(2));

    // calcular a partir do desconto em dinheiro qual a taxa
    descontoTaxa = (valor*100)/total
    $('descontoTaxa').html('')
    $('descontoTaxa').html(descontoTaxa.toFixed(0));
    $('input[name="desconto_taxa"]').val(descontoTaxa.toFixed(0));

    carrinho_compras[1]['desconto'] = {descontoValor:valor.toFixed(2), descontoTaxa:descontoTaxa.toFixed(0),valorSemDesconto:total.toFixed(2),valorComDesconto:desconto.toFixed(2)}

  }

  var desconto_percente_taxa = function(x){
    let total =  parseFloat(soma_valor_itens_venda());
    let valor = parseFloat(x);
    descontoValor = (total*valor)/100
    desconto = total - descontoValor ;

    $('descontoTaxa').html('')
    $('descontoTaxa').html(valor.toFixed(2));

    $('valorTotalVenda').html('');
    $('valorTotalVenda').html(desconto.toFixed(2));

    $('descontoValor').html('')
    $('descontoValor').html(descontoValor.toFixed(2));

    $('input[name="desconto_dinheiro"]').val(descontoValor.toFixed(2));

    carrinho_compras[1]['desconto'] = {descontoValor:descontoValor.toFixed(2), descontoTaxa:valor.toFixed(0),valorSemDesconto:total.toFixed(2),valorComDesconto:desconto.toFixed(2)}

  }


  var descontos  = function(){

    var e = jQuery(`<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Descontos </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form>

    <div class="form-group row">
    <label class="col-form-label col-lg-4 col-sm-4">Desconto <strong>R$</strong></label>
    <div class="col-lg-8 col-md-8 col-sm-8">
    <input  type="text" class="form-control" value="0" name="desconto_dinheiro" placeholder="" style="display: block;" onchange="desconto_R$_dinheiro(this.value)">
    </div>
    </div>

    <div class="form-group row">
    <label class="col-form-label col-lg-4 col-sm-4">Desconto <strong>%<strong></label>
    <div class="col-lg-8 col-md-8 col-sm-8">
    <input  type="text" class="form-control bootstrap-touchspin-vertical-btn" value="" name="desconto_taxa" placeholder="10%" style="display: block;"  onchange="desconto_percente_taxa(this.value)">
    </div>
    </div>

    </form>

    </div>
    <div class="modal-footer">
    <input class="form-control" type="hidden" name="id" value="" autocomplete="off">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
    </div>

    </div>
    </div>`);

    e.find('input[name="desconto_dinheiro"]').TouchSpin({
      buttondown_class: 'btn btn-secondary',
      buttonup_class: 'btn btn-secondary',
      min: 0.0,
      max: 1000000000.0,
      step: 0.1,
      decimals: 2,
      postfix: 'R$'
    });


    e.find('input[name="desconto_taxa"]').TouchSpin({
      buttondown_class: 'btn btn-secondary',
      buttonup_class: 'btn btn-secondary',
      verticalbuttons: true,
      verticalupclass: 'la la-plus',
      verticaldownclass: 'la la-minus',
      postfix: '%'
    });

    e.modal('toggle');

  }


  var forma_pagamento = function(pagamentoEm, descricao){

    carrinho_compras[2]['pagamento']['forma'] = pagamentoEm
    carrinho_compras[2]['pagamento']['descricao'] = descricao

    if(pagamentoEm =='1'){
      //dinheiro
        finalizar_venda()
      //$('a[href="#k_tabs_8_3"]').click();
    }else if(pagamentoEm =='2'){
       //credito
         finalizar_venda()
       //$('a[href="#k_tabs_8_3"]').click();
    }else if(pagamentoEm =='3'){
        //debito
        finalizar_venda()
        //$('a[href="#k_tabs_8_3"]').click();
    }else if(pagamentoEm == '4') {
        //crediario
        $('formularioFormaPagamento').toggle(200);
    }

  }


  var adicionar_cliente  = function(elem){

        let id = elem.value
        let nome = $(elem).find(":selected").text();
        carrinho_compras[3]['cliente']['id'] = id;
        carrinho_compras[3]['cliente']['nome']  = nome;

  }


  var adicionar_parcelas = function(elem){

    let parcelas = elem.value
    carrinho_compras[2]['pagamento']['parcelas'] = parcelas


  }

  var data_vencimento  = function(elem){
    let data_vencimento  = elem.value
    carrinho_compras[2]['pagamento']['vencimento'] = data_vencimento
  }

  var finalizar_venda = function(){

      $('RCliente').html(carrinho_compras[3]['cliente']['nome'])
      $('RDescricaoPagamento').html(carrinho_compras[2]['pagamento']['descricao'])

      if(carrinho_compras[2]['pagamento']['parcelas']){
        $('RParcelas').html(`Parcelado: ${carrinho_compras[2]['pagamento']['parcelas']} x`)
      }

      if(carrinho_compras[2]['pagamento']['vencimento']){
        $('RVencimento').html(`1° venc.: ${carrinho_compras[2]['pagamento']['vencimento']}`)
      }

      let table =  $("#tabela_produtos_resumo tbody");
      $("#tabela_produtos_resumo tbody").empty();

      for(key in carrinho_compras[0]['itens']){

        table.append(`<tr>
              <td>${carrinho_compras[0]['itens'][key].codigo}</td>
              <td>${carrinho_compras[0]['itens'][key].descricao}</td>
              <td>${carrinho_compras[0]['itens'][key].quantidade_item}</td>
              <td>R$ ${carrinho_compras[0]['itens'][key].preco_venda}</td>
              <td>R$ ${carrinho_compras[0]['itens'][key].total_item}</td>
          </tr>`);

        }

      //envia para aba de finalizar venda para exibir o resumo
      $('a[href="#k_tabs_8_3"]').click();

  }
