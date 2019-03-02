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
																<h3 class="k-portlet__head-title">Parcelas abertas<br> <span class="text-success"><?php echo $listaparcelas[0]['cliente_nome'] ?><span></h3>
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
            												<th>Venda</th>
            												<th>Parcela</th>
            												<th>Data Venc.</th>
            												<th>Valor</th>
            												<th>Status</th>
            												<th>##</th>
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
            												<td nowrap></td>
            											</tr>
                                  <?php endforeach; ?>

            										</tbody>
            										<tfoot>
            											<tr>
                                    <th>ID</th>
                                    <th>Venda</th>
                                    <th>Parcela</th>
                                    <th>Data Venc.</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>##</th>
            											</tr>
            										</tfoot>
            									</table>
												<!--end: Datatable-->


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
		<script src="<?php echo base_url(); ?>assets/demo/default/custom/components/datatables/extensions/rowgroup.js" type="text/javascript"></script>
    <!--end::Page Scripts -->

    <!-- ============================= Script custom da pagina ========================== -->
    <script type="text/javascript">

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
