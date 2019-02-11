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
			<a class="nav-link" data-toggle="tab" href="#k_tabs_8_2" role="tab" aria-selected="false">
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
			Forma de pagamento
		</div>
		<div class="tab-pane fade" id="k_tabs_8_3" role="tabpanel">
			Finalizar venda
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
		<div class="k-portlet k-portlet--fit k-portlet--height-fluid">
			<div class="k-portlet__body k-portlet__body--fluid">
				<div class="k-widget-3 k-widget-3--success">
					<div class="k-widget-3__content">
						<div class="k-widget-3__content-info">
							<div class="k-widget-3__content-section">
								<div class="k-widget-3__content-title">Desconto</div>
							</div>
							<div class="k-widget-3__content-section">
								<span class="k-widget-3__content-bedge">R$</span>
								<span class="k-widget-3__content-number">00.00</span>
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
								<span class="k-widget-3__content-number"><valorTotalVenda>00.00</valorTotalVenda></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--end::Portlet-->
	</div>


</div>
