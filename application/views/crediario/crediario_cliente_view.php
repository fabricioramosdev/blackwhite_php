<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<!--
Theme: Keen - The Ultimate Bootstrap Admin Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: You must have a valid license purchased only from https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/ in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
   <?php $this->view('partials/Head'); ?>
  <!-- end::Head -->

	<!-- begin::Body -->
	<body class="k-header--fixed k-header-mobile--fixed k-aside--enabled k-aside--fixed">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
     <?php $this->view('partials/HeaderMobile'); ?>
    <!-- end:: Header Mobile -->

    <div class="k-grid k-grid--hor k-grid--root">
			<div class="k-grid__item k-grid__item--fluid k-grid k-grid--ver k-page">

				<!-- begin:: Aside -->
		    <?php $this->view('partials/Aside'); ?>
				<!-- end:: Aside -->

				<div class="k-grid__item k-grid__item--fluid k-grid k-grid--hor k-wrapper" id="k_wrapper">

					<!-- begin:: Header -->
           <?php $this->view('partials/Header'); ?>
				  <!-- end:: Header -->


          <!-- begin:: Content -->
          <div class="k-content	k-grid__item k-grid__item--fluid k-grid k-grid--hor" id="k_content">
            <!-- begin:: Content Head -->
            <?php $this->view('partials/ContentHead'); ?>
            <!-- end:: Content Head -->


            <!-- begin:: Content Body -->
            <div class="k-content__body	k-grid__item k-grid__item--fluid" id="k_content_body">

              <!-- =========================================================================== -->
              <div class="row">
										<div class="col-lg-12 col-xl-12">
											<div class="tab-content">

												<!--begin: Personal Information-->
												<div class="tab-pane fade show active" id="k_profile_tab_personal_information" role="tabpanel">
													<div class="k-portlet">
														<div class="k-portlet__head">
															<div class="k-portlet__head-label">
																<h3 class="k-portlet__head-title">Parcelas abertas<br> <span class="text-success"><?php echo isset($listaparcelas[0])?$listaparcelas[0]['cliente_nome']:"" ?><span></h3>
															</div>
														</div>

                        		<div class="k-portlet__body">




                              <!-- ================================================= -->
                              <div class="row" style="margin-bottom:15px">
                                <div class="col-sm col-md"><a href="<?php echo base_url(); ?>Crediario/index" class="btn btn-focus btn-wide"><i class="fa fa-undo"></i> Voltar</a></div>
                              </div>
                              <!-- ================================================= -->

                              <!--begin: Datatable -->
            									<table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
            										<thead>
            											<tr>
            												<th>ID</th>
            												<th>Venda N°</th>
            												<th>Parcela</th>
            												<th>Data Venc.</th>
            												<th>Valor</th>
            												<th>Status</th>
                                    <th>Atraso</th>
            												<th></th>
            											</tr>
            										</thead>
            										<tbody>
                                  <?php foreach ($listaparcelas as $key => $value): ?>
            											<tr>
            												<td><?php echo $value['id']; ?></td>
            												<td><?php echo $value['venda']; ?></td>
            												<td><?php echo $value['parcela']; ?></td>
            												<td><?php echo $value['data_parcela']; ?></td>
            												<td>R$ <?php echo number_format($value['valor_parcela'],2); ?></td>
                                    <td><?php echo $value['status']; ?></td>
                                    <td><?php echo $value['atraso']; ?></td>

            												<td nowrap></td>
            											</tr>
                                  <?php endforeach; ?>

            										</tbody>
            										<tfoot>
            											<tr>
                                    <th>ID</th>
                                    <th>Venda N°</th>
                                    <th>Parcela</th>
                                    <th>Data Venc.</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Atraso</th>
                                    <th></th>
            											</tr>
            										</tfoot>
            									</table>
												<!--end: Datatable-->

                        <div class="row"><div class="col-12">&nbsp;</div></div>
                        <div class="row"><div class="col-12">&nbsp;</div></div>

                        <div class="row">
                          <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

                            <!--begin::Portlet-->
                            <div class="k-portlet k-portlet--fit k-portlet--height-fluid">
                              <div class="k-portlet__body k-portlet__body--fluid">
                                <div class="k-widget-3 k-widget-3--brand">
                                  <div class="k-widget-3__content">
                                    <div class="k-widget-3__content-info">
                                      <div class="k-widget-3__content-section">
                                        <div class="k-widget-3__content-title">Total parcelado</div>
                                        <div class="k-widget-3__content-desc">VALOR TOTAL PARCELADO</div>
                                      </div>
                                      <div class="k-widget-3__content-section">
                                        <span class="k-widget-3__content-bedge">R$</span>
                                        <span class="k-widget-3__content-number"><?php echo isset($resumo_cliente_crediario[0])?$resumo_cliente_crediario[0]['total_parcelado']:'00.00' ?></span>
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
                                <div class="k-widget-3 k-widget-3--danger">
                                  <div class="k-widget-3__content">
                                    <div class="k-widget-3__content-info">
                                      <div class="k-widget-3__content-section">
                                        <div class="k-widget-3__content-title">Total em atraso</div>
                                        <div class="k-widget-3__content-desc">TOTAL PARCELAS ATRASADAS</div>
                                      </div>
                                      <div class="k-widget-3__content-section">
                                        <span class="k-widget-3__content-bedge">R$</span>
                                        <span class="k-widget-3__content-number"><?php echo isset($resumo_cliente_crediario[2])? $resumo_cliente_crediario[2]['total_parcelado']:'00.00' ?></span>
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
															<div class="k-widget-3__content-title">Total em dia</div>
															<div class="k-widget-3__content-desc">TOTAL PARCELAS EM DIA</div>
														</div>
														<div class="k-widget-3__content-section">
                                <span class="k-widget-3__content-bedge">R$</span>
															<span class="k-widget-3__content-number"><?php echo isset($resumo_cliente_crediario[1])?$resumo_cliente_crediario[1]['total_parcelado']:'00.00' ?></span>
														</div>
													</div>
											  </div>
											</div>
										</div>
									</div>

									<!--end::Portlet-->
								</div>
							</div>


											</div>
										</div>
							</div>
              <!-- =========================================================================== -->
            </div>
            <!-- end:: Content Body -->
          </div>
          <!-- end:: Content -->

					<!-- begin:: Footer -->
			     <?php $this->view('partials/Footer'); ?>
					<!-- end:: Footer -->

				</div>
			</div>
		</div>
		<!-- end:: Page -->

		<!-- begin:: Topbar Offcanvas Panels -->
    <?php $this->view('partials/TopbarOffcanvasPanels'); ?>
		<!-- end:: Topbar Offcanvas Panels -->

		<!-- begin::Quick Panel -->
      <?php $this->view('partials/QuickPanel'); ?>
	  <!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="k_scrolltop" class="k-scrolltop">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scrolltop -->

		<!-- begin::Global Config -->
		<script>
			var KAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"metal": "#c4c5d6",
						"light": "#ffffff",
						"accent": "#00c5dc",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995",
						"focus": "#9816f4"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
		<!-- end::Global Config -->

    <!-- begin::Scripts -->
      <?php $this->view('partials/Scripts'); ?>
    <!-- end::Scripts -->

    <!--begin::Page Vendors -->
    <script src="<?php echo base_url(); ?>assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/demo/default/custom/components/extended/sweetalert2.js" type="text/javascript"></script>
    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->
    <script src="<?php echo base_url(); ?>assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/demo/default/custom/custom/crediario/crediario.js" type="text/javascript"></script>
    <!--end::Page Scripts -->

    <!-- ============================= Script custom da pagina ========================== -->
    <script type="text/javascript">

    var DatatablesBasicPaginations = function() {

      var initTable = function() {
      var table = $('table');

        // begin first table
        table.DataTable({
          responsive: true,
          pagingType: 'full_numbers',
          rowGroup: {
                     dataSrc: 1,
                   },
          columnDefs: [
            {
              targets: -1,
              title: '',
              orderable: false,

              render: function(data, type, full, meta) {

                return `<span class="dropdown">
                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                  <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:;"  onClick="plus(${full[1]})"><i class="la la-search"></i>Mais Detalhes</a>
                                    <a class="dropdown-item" href="javascript:;"  onClick="pagar_parcela(${full[0]})"><i class="la la-level-down"></i>Pagar parcela</a>
                                </div>
                            </span>
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                              <i class="la la-edit"></i>
                            </a>`;
              },
            },
            {
              targets: 5,
              render: function(data, type, full, meta) {
                var status = {
                  1: {'title': 'Aberta', 'class': ' k-badge--accent'},
                  0: {'title': 'Paga', 'class': ' k-badge--info'},
                  2: {'title': 'Em atraso', 'class': ' k-badge--danger'}
                };
                if (typeof status[data] === 'undefined') {
                  return data;
                }
                return '<span class="k-badge ' + status[data].class + ' k-badge--inline k-badge--pill">' + status[data].title + '</span>';
              },
            },
            {
              targets: 6,
              render: function(data, type, full, meta) {
                var status = {
                  1: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  '': {'title': 'Em dia', 'class': ' k-badge--success'},

                };
                if (typeof status[data] === 'undefined') {
                  return data;
                }
                return '<span class="k-badge ' + status[data].class + ' k-badge--inline k-badge--pill">' + status[data].title + '</span>';
              },
            },

          ],
        });
      };

      return {
        //main function to initiate the module
        init: function() {
          initTable();
        },

      };

    }();

    jQuery(document).ready(function() {
      DatatablesBasicPaginations.init();
    });

    </script>
    <!-- ============================= Script custom da pagina ========================== -->

    <!--================================================ -->
    <!--begin::Script Alert -->
    <?php $this->view('partials/ScriptAlert'); ?>
    <!--end::Script Alert -->
    <!--================================================ -->

	</body>

	<!-- end::Body -->
</html>
