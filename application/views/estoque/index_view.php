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
																<h3 class="k-portlet__head-title">Estoque rápido</h3>
															</div>


														</div>

                        		<div class="k-portlet__body">

                            <!-- ================================================= -->
                            <div class="row" style="margin-bottom:15px">
                        			<div class="col-sm col-md"><a href="javascript:;" onClick="history.back();" class="btn btn-focus btn-wide"><i class="fa fa-undo"></i> Voltar</a></div>
                        		</div>
                            <!-- ================================================= -->

                            <!-- =================================================
                            id, nome, endereco, cpf, telefone, whastapp, email,  observacao, registro, status, hash

                           -->

                            <!--begin: Datatable -->
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Código</th>
                                  <th>Descrição</th>
                                  <th>Estoque saldo</th>
                                  <th>Status</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>


                                <?php foreach ($listaprodutos as $key => $value): ?>
                                  <tr>
                                    <td><?php echo $value['id'] ?></td>
                                    <td><?php echo $value['codigo'] ?></td>
            												<td><?php echo $value['descricao'] ?></td>
                                    <td><?php echo $value['estoque_saldo'] ?></td>
                        						<td><?php echo $value['status'] ?></td>
            												<td nowrap></td>
                                  </tr>
                                <?php endforeach; ?>

                              </tbody>
                            </table>

                            <!--end: Datatable -->

                            <!-- ================================================= -->
                           </div>

													</div>
												</div>

												<!--end: Personal Information-->


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
    <!-- ============================= Script custom da pagina ========================== -->
    <script type="text/javascript">
    var DatatablesBasicPaginations = function() {

    	var initTable = function() {
    	var table = $('table');

    		// begin first table
    		table.DataTable({
    			responsive: true,
    			pagingType: 'full_numbers',
    			columnDefs: [
    				{
    					targets: -1,
    					title: '',
    					orderable: false,
    					render: function(data, type, full, meta) {

    						return `
                            <span class="dropdown">
                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                  <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="javascript:;"  onClick="view('${full[0]}','${full[3]}','${full[2]}')"><i class="la la-cube"></i>Alterar Estoque</a>
                                </div>
                            </span>
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                              <i class="la la-edit"></i>
                            </a>`;
    					},
    				},
    				{
    					targets: 4,
    					render: function(data, type, full, meta) {
    						var status = {
    							1: {'title': 'Ativo', 'class': ' k-badge--success'},
    							0: {'title': 'Inativo', 'class': ' k-badge--danger'},
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



    var view =  function(id,saldo,descricao){


          var e = jQuery(`<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form  class="k-form k-form--label-right"  action="<?php echo base_url() ?>Estoque/put" method="post">

                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Estoque rápido </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h5 class="text-center"><span class="produto"></span></h5>
                        <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 col-form-label">Estoque</label>
                          <div class="col-lg-9 col-xl-39">
                            <input class="form-control" type="number" name="estoque_saldo" value="" autocomplete="off" required>
                            <span class="form-text text-muted">Estoque saldo</span>
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <input class="form-control" type="hidden" name="id" value="" autocomplete="off">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                    </form>
                  </div>
              </div>`);

              e.find('input[name="id"]').val(id);
              e.find('span[class="produto"]').html(descricao);
              e.find('input[name="estoque_saldo" ]').val(saldo);
              e.modal('toggle');

        }




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
