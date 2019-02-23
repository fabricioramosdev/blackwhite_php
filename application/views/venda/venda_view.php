<!-- begin:: Content Body -->
<div class="k-portlet__body">
	<ul class="nav nav-pills nav-tabs-btn" role="tablist">
		<li class="nav-item">
			<a class="nav-link active show" data-toggle="tab" href="#k_tabs_8_1" role="tab" aria-selected="true">
				<span class="nav-link-icon"><i class="flaticon-shopping-basket"></i></span>
				<span class="nav-link-title">1. Nova venda</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab"  href="#k_tabs_8_2" role="tab" aria-selected="false">
				<span class="nav-link-icon"><i class="flaticon-piggy-bank"></i></span>
				<span class="nav-link-title">2. Forma de pagamento</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#k_tabs_8_3" role="tab" aria-selected="false">
				<span class="nav-link-icon"><i class="flaticon-bag"></i></span>
				<span class="nav-link-title">3. Finalizar venda</span>
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active show" id="k_tabs_8_1" role="tabpanel">
			<div class="form-group row">

				<div class="col-lg-12 col-md-12 col-sm-10">

					<select class="form-control k_selectpicker" data-live-search="true" onchange="adicionar_produto(this)">
						<option>Nothing selected</option>
						<?php foreach ($produto as $key => $value): ?>
							<option value="<?php echo $value['id']; ?>"><?php echo $value['codigo'] ?> - <?php echo $value['descricao'] ?>  </option>
						<?php endforeach; ?>
					</select>

				</div>

			</div>

			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">

					<table class="table table-striped- table-bordered table-hover table-checkable" id="table_produtos">
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome Produto</th>
								<th>Quantidade</th>
								<th>Valor Unitário</th>
								<th>Valor Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>


						</tbody>
					</table>


				</div>
			</div>




		</div>
		<div class="tab-pane fade" id="k_tabs_8_2" role="tabpanel">



			<div class="row">
				<div class="col-3 col-sm-3 col-md-3"><button onclick="forma_pagamento('1','Dinheiro')" type="button" class="btn btn-outline-success btn-elevate btn-pill btn-wide btn-lg"><i class="fa fa-money-bill"></i> Dinheiro</button></div>
				<div class="col-3 col-sm-3 col-md-3"><button onclick="forma_pagamento('2','Cartão Crédito')"  type="button" class="btn btn-outline-info btn-elevate btn-pill btn-wide btn-lg"><i class="fa fa-wallet"></i> Cartão Crédito</button></div>
				<div class="col-3 col-sm-3 col-md-3"><button onclick="forma_pagamento('3','Cartão Débito')"  type="button" class="btn btn-outline-focus btn-elevate btn-pill btn-wide btn-lg"><i class="fa fa-wallet"></i> Cartão Débito</button></div>
				<div class="col-3 col-sm-3 col-md-3"><button onclick="forma_pagamento('4','Crediário Loja')" type="button" class="btn btn-outline-dark btn-elevate btn-pill btn-wide btn-lg"><i class="fa fa-money-check"></i> Crediário Loja</button></div>
			</div>

			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">&nbsp;</div>
			</div>

			<!-- ========================================================================= -->
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">
					<formularioFormaPagamento>



						<div class="k-portlet__body">

							<div class="form-group row">
								<div class="col-lg-12">
									<label>Cliente</label>

									<select class="form-control k_selectpicker" data-live-search="true"  onchange="adicionar_cliente(this)">
										<option>Nothing selected</option>
										<?php foreach ($clientes as $key => $value): ?>
											<option value="<?php echo $value['id'] ?>"><?php echo $value['cpf'] ?> - <?php echo $value['nome'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>

							</div>

							<div class="form-group row">
								<div class="col-lg-6">
									<label>Parcelas:</label>
									<input type="number" class="form-control" value="0" onchange="adicionar_parcelas(this)">
									<span class="form-text text-muted">Digite o número de parcelas</span>

								</div>
								<div class="col-lg-6">
									<label class="">Data vencimento:</label>
									<input type="text" class="form-control" id="k_datepicker_1" readonly placeholder="Select date" / onchange="data_vencimento(this)">
									<span class="form-text text-muted">Data vencimento 1° parcela</span>
								</div>
							</div>


							<div class="form-group row">
								<div class="col-lg-6">
									<button type="button" class="btn btn-warning btn-lg btn-block" onclick="location.reload()"><i class="flaticon-circle"></i> Cancelar Venda</button>
								</div>
								<div class="col-lg-6">
									<button type="button" class="btn btn-success btn-lg  btn-block" onclick="finalizar_venda()"><i class="flaticon-bag"></i>Finalizar venda</button>
								</div>
							</div>

						</div>

					</formularioFormaPagamento>
				</div>
			</div>
			<!-- ========================================================================= -->



			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">&nbsp;</div>
			</div>




		</div>
		<div class="tab-pane fade" id="k_tabs_8_3" role="tabpanel">




			<div class="k-invoice-v2">

				<div class="k-invoice-v2__line"></div>
				<div class="k-invoice-v2__details">
					<div class="k-invoice-v2__details-left">
						<div class="k-invoice-v1__details-label">Venda para:</div>
						<div class="k-invoice-v2__details-value">
							<RCliente>Cliente</RCliente>
						</div>
						<div class="k-invoice-v1__details-label">Forma Pagamento:</div>
						<div class="k-invoice-v1__details-value">
							<RDescricaoPagamento>&nbsp;</RDescricaoPagamento>
						</div>
						<div class="k-invoice-v1__details-value">
							<RParcelas>&nbsp;</RParcelas>
						</div>
						<div class="k-invoice-v1__details-value">
							<RVencimento>&nbsp;</RVencimento>
						</div>
					</div>
					<div class="k-invoice-v2__details-right">
						<div class="k-invoice-v2__detail--date">
							<div class="k-invoice-v1__details-label">Data:</div>
							<div class="k-invoice-v2__details-value"><?php echo date('d/m/Y') ?></div>
						</div>
					</div>
				</div>
				<div class="k-invoice-v2__body">
					<div class="table-responsive">
						<table class="k-invoice-v2__summary" id="tabela_produtos_resumo">
							<thead class="k-invoice-v2__summary-header">
								<tr>
									<td>Código</td>
									<td>Nome Produto</td>
									<td>Quantidade</td>
									<td>Valor Unitário</td>
									<td>Valor Total</td>
								</tr>
							</thead>
							<tbody class="k-invoice-v2__summary-body">

							</tbody>
						</table>
					</div>

					<div class="form-group row">
						<div class="col-lg-12">
							<button type="button" class="btn btn-success btn-lg  btn-block" onclick="salvar_venda()"><i class="flaticon-bag"></i>Finalizar venda</button>
						</div>
					</div>

				</div>
			</div>


			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">&nbsp;</div>
			</div>

		</div>
	</div>
</div>

<!-- end:: Content Body -->



<div class="row">

	<div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

		<!--begin::Portlet-->
		<div class="k-portlet k-portlet--fit k-portlet--height-fluid">
			<div class="k-portlet__body k-portlet__body--fluid">
				<div class="k-widget-3 k-widget-3--danger">
					<div class="k-widget-3__content">
						<div class="k-widget-3__content-info">
							<div class="k-widget-3__content-section">
								<div class="k-widget-3__content-title">Itens</div>
							</div>
							<div class="k-widget-3__content-section">
								<span class="k-widget-3__content-number"><itensCarrinho>0</itensCarrinho></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--end::Portlet-->
	</div>


	<div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

		<!--begin::Portlet-->
		<div class="k-portlet k-portlet--height-fluid k-widget-12 bg-secondary">
			<div class="k-portlet__body">
				<div class="k-widget-12__body">
					<div class="k-widget-12__head">
						<div class="k-widget-12__label">
							<h2 class="k-widget-12__title">Descontos</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="k-portlet__foot k-portlet__foot--md bg-warning k-font-secondary">
				<div class="k-portlet__foot-wrapper">
					<div class="k-portlet__foot-info">
						<div class="k-widget-3__content-section">
							<span class="k-widget-3__content-bedge">R$</span>
							<span class="k-widget-3__content-number"><descontoValor>00.00</descontoValor></span>
						</div>

						<div class="k-widget-3__content-section">
							<span class="k-widget-3__content-bedge"><descontoTaxa>00</descontoTaxa></span>
							<span class="k-widget-3__content-number">%</span>
						</div>
					</div>
					<div class="k-portlet__foot-toolbar">
						<a href="javascript:;" onclick="descontos()" class="btn btn-focus btn-elevate btn-pill"><i class="flaticon-business"></i> Desconto</a>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
	</div>

	<div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

		<!--begin::Portlet-->
		<div class="k-portlet k-portlet--fit k-portlet--height-fluid">
			<div class="k-portlet__body k-portlet__body--fluid">
				<div class="k-widget-3 k-widget-3--brand">
					<div class="k-widget-3__content">
						<div class="k-widget-3__content-info">
							<div class="k-widget-3__content-section">
								<div class="k-widget-3__content-title">Total venda</div>
							</div>
							<div class="k-widget-3__content-section">
								<span class="k-widget-3__content-bedge">R$</span>
								<span class="k-widget-3__content-number"><valorTotalVenda>00.00</valorTotalVenda></span><br>
								<!-- <i class="flaticon2-percentage"></i> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--end::Portlet-->
	</div>


</div>
