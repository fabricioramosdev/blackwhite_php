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


                      <div class="k-portlet__body">

                        <!-- ================================================= -->
                        <div class="row" style="margin-bottom:15px">
                          <div class="col-sm col-md"><a href="<?php echo base_url(); ?>Categoria/index" class="btn btn-focus btn-wide"><i class="fa fa-undo"></i> Voltar</a></div>
                        </div>
                        <!-- ================================================= -->

                        <!-- ================================================= -->

                        <div class="k-portlet__body">
                          <div class="k-section k-section--first">
                            <div class="k-section__body">



                              <form class="k-form k-form--label-right" action="<?php echo base_url() ?>Categoria/post_categoria" method="post">
                                <h3>Categoria</h3>
                                <div class="form-group row">
                                  <label class="col-xl-3 col-lg-3 col-form-label">Descrição (*)</label>
                                  <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" type="text" name="descricao" value="" autocomplete="off" required>
                                    <span class="form-text text-muted">Descrição da categoria Ex. vestuário, acessório, calçado, outros</span>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-12 col-xl-12">
                                    <button type="submit" class="btn btn-success  btn-wide">Salvar Categoria</button>&nbsp;
                                  </div>
                                </div>
                              </form>

                              <div class="row"><div class="col-12">&nbsp;</div></div>
                              <div class="row"><div class="col-12"><hr/></div></div>
                              <div class="row"><div class="col-12">&nbsp;</div></div>
                                                            
                              <form class="k-form k-form--label-right" action="<?php echo base_url() ?>Categoria/post_subcategoria" method="post">
                                <h3>SubCategoria</h3>
                                <div class="form-group row">
                                  <label class="col-xl-3 col-lg-3 col-form-label">Categoria (*)</label>
                                  <div class="col-lg-6 col-xl-6">
                                    <select class="form-control" name="categoria" required>
                                      <option value="">Selecione...</option>
                                      <?php foreach ($listaprodutoscategorias as $key => $value): ?>
                                        <option value="<?php echo $value['id']  ?>"><?php echo $value['descricao'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-xl-3 col-lg-3 col-form-label">Descrição (*)</label>
                                  <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" type="text" name="descricao" value="" autocomplete="off" required>
                                    <span class="form-text text-muted">Descrição da subcategoria Ex. camise, bandana, tênis, corrente, etc</span>
                                  </div>
                                </div>

                                <div class="row">

                                  <div class="col-lg-12 col-xl-12">
                                    <button type="submit" class="btn btn-success  btn-wide">Salvar SubCategoria</button>&nbsp;
                                  </div>
                                </div>
                              </form>




                            </div>
                          </div>

                        </div>



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



  <!-- ============================= Script custom da pagina ========================== -->
  <script type="text/javascript">


  $('input[name="codigo"]').inputmask("mask", {
    "mask": "[AA]9999"
  });



  // retorna as primeiras letras da categoria de produto para compor o codigo interno
  $('select[name="categoria"]').on('change',function(){
    $('input[name="codigo"]').val($('option:selected', this).html().slice(0,2).toUpperCase());
    $('input[name="codigo"]').focus();
  })


  $('input[name="codigo"]').on('focusout',function() {

    var codigo = this.value;

    if(codigo != ''){

      //===============================================
      $.ajax(
        {
          url: app_u+'Produto/checkcodigo',
          data: {
            codigo: codigo
          },
          type: 'post',
          dataType: 'json',
          success: function (data) {

            if(data.length != 0){
              swal(
                'Código interno duplicado !',
                `Este código ${codigo} esta sendo usado por outro produto !`,
                'warning'
              );
            }

          }
        }
      );
      //===============================================


    }


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
