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
															<h3 class="k-portlet__head-title">Lista clientes atraso</h3>
															</div>


														</div>

                        		<div class="k-portlet__body">

                              <!-- ================================================= -->



                              <!--begin: Datatable -->
                              <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
                                <thead>
                                  <tr>
                                    <th>Parcela</th>
                                    <th>Venda N°</th>
                                    <th>Data Venc.</th>
                                    <th>Valor</th>
                                    <th>Cliente</th>
                                    <th>Tel.Cel</th>
                                    <th>Tel.Out</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($listaatraso as $key => $value): ?>
                                    <tr>
                                      <td><a href="<?php echo base_url() ?>Crediario/crediario_cliente/1"><i class="fa fa-angle-double-right"></i> <?php echo $value['parcela'] ?></a></td>
                                      <td><?php echo $value['venda_id'] ?></td>
                                      <td><?php echo $value['data_parcela'] ?></td>
                                      <td><?php echo $value['valor_parcela'] ?></td>
                                      <td><?php echo $value['nome'] ?></td>
                                      <td><a href="<?php echo $value['whatsapp'] ?>" target="_blank"> <i class="fab fa-whatsapp fa-2x"></i> &nbsp;<?php echo $value['telCel'] ?> </a></td>
                                      <td><?php echo $value['telOut']?></td>
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


    <!--begin::Page Scripts -->
    <script src="<?php echo base_url(); ?>assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
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
          columnDefs: [
            {
              targets: -1,
              title: '',
              orderable: false,
            },
            {
              targets: 4,
              render: function(data, type, full, meta) {


                var status = {
                  1: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  2: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  3: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  4: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  5: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  6: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  7: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  8: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  9: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  10: {'title': 'Atraso', 'class': ' k-badge--danger'},
                  0: {'title': 'Em dia', 'class': ' k-badge--success'},
                };

                console.log(data);
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
