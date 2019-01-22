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
																<h3 class="k-portlet__head-title">Informação pessoais</h3>
															</div>

														</div>

                           <div class="k-portlet__body">
														<form class="k-form k-form--label-right" action="<?php echo base_url() ?>Profile/post" method="post" enctype="multipart/form-data">
															<div class="k-portlet__body">
																<div class="k-section k-section--first">
																	<div class="k-section__body">
																		<div class="row"><label class="col-xl-3"></label></div>

  																<div class="form-group row">
																			<label class="col-xl-3 col-lg-3 col-form-label">Nome (*)</label>
																			<div class="col-lg-9 col-xl-6">
																				<input class="form-control" type="text" name="nome" value="<?php echo  $this->session->usuario[0]['nome']; ?>" autocomplete="off" required>
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-xl-3 col-lg-3 col-form-label">E-mail (*)</label>
																			<div class="col-lg-9 col-xl-6">
																				<input class="form-control" type="email" name="email" value="<?php echo  $this->session->usuario[0]['email']; ?>" autocomplete="off" required>
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-xl-3 col-lg-3 col-form-label">Senha</label>
																			<div class="col-lg-9 col-xl-6">
																				<input class="form-control" type="password" name="senha" value="" autocomplete="off">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="k-separator k-separator--border-dashed k-separator--portlet-fit k-separator--space-lg"></div>
															</div>
															<div class="k-portlet__foot">
																<div class="k-form__actions">
																	<div class="row">
																		<div class="col-lg-3 col-xl-3">
																		</div>
																		<div class="col-lg-9 col-xl-9">
																			<button type="submit" class="btn btn-success">Salvar</button>&nbsp;
																			<button type="reset" class="btn btn-secondary">Cancelar</button>

                                      	<input class="form-control" type="hidden" name="id" value="<?php echo  $this->session->usuario[0]['id']; ?>">
																		</div>
																	</div>
																</div>
															</div>
														</form>
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

    <!--================================================ -->
    <!--begin::Script Alert -->
    <?php $this->view('partials/ScriptAlert'); ?>
    <!--end::Script Alert -->
    <!--================================================ -->

	</body>

	<!-- end::Body -->
</html>
