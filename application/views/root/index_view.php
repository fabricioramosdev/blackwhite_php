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
            <div class="k-content__body	k-grid__item k-grid__item--fluid" id="k_content_body">
              <div class="row">
                <div class="col-md-6">

                  <!--begin::Portlet-->
                  <div class="k-portlet">
                    <div class="k-portlet__head">
                      <div class="k-portlet__head-label">
                        <h3 class="k-portlet__head-title">Profile root</h3>
                      </div>
                    </div>

                    <!--begin::Form-->
                    <form class="k-form" action="<?php echo base_url(); ?>Root/putprofile" method="post">
                      <div class="k-portlet__body">

                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="nome" class="form-control" value="<?php echo $usuarioroot[0]['nome']; ?>"  placeholder="Nome">
                        </div>


                        <div class="form-group">
                          <label>E-mail</label>
                          <input type="email" name="email" class="form-control" value="<?php echo $usuarioroot[0]['email']; ?>"  placeholder="E-mail">
                        </div>


                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="senha" class="form-control" value="" placeholder="Password">
                        </div>
                      </div>
                      <div class="k-portlet__foot">
                        <div class="k-form__actions">
                          <input type="hidden" name="id"  class="form-control" value="<?php echo $usuarioroot[0]['id']; ?>">
                          <button type="submit" class="btn btn-primary">Save</button>
                          <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                      </div>
                    </form>

                    <!--end::Form-->
                  </div>

                  <!--end::Portlet-->





                  <!--begin::Portlet-->
                  <div class="k-portlet">
                    <div class="k-portlet__head">
                      <div class="k-portlet__head-label">
                        <h3 class="k-portlet__head-title">Profile access routes view</h3>
                      </div>
                    </div>
                    <!--begin::Form-->
                    <div class="k-portlet__body">


                      <!--begin: Datatable -->
                      <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_2">
                        <thead>
                          <tr>
                            <th>Perfil</th>
                              <th>PID</th>
                            <th>Label</th>
                            <th>Controller</th>
                            <th>Method</th>
                            <th>Assid</th>

                          </tr>
                        </thead>
                        <tbody>


                          <?php foreach ($perfillistaacessos as $key => $value): ?>
                            <tr>
                              <td><?php echo $value['perfil'] ?></td>
                              <td><?php echo $value['pid'] ?></td>
                              <td><?php echo $value['label'] ?></td>
                              <td><?php echo $value['controller'] ?></td>
                              <td><?php echo $value['method'] ?></td>
                              <td><?php echo $value['aside'] ?></td>
                            </tr>
                          <?php endforeach; ?>

                        </tbody>
                      </table>

                      <!--end: Datatable -->


                    </div>
                    <div class="k-portlet__foot">
                      <div class="k-form__actions">
                      </div>
                    </div>
                    <!--end::Form-->
                  </div>

                  <!--end::Portlet-->


                </div>
                <div class="col-md-6">

                  <!--begin::Portlet-->
                  <div class="k-portlet">
                    <div class="k-portlet__head">
                      <div class="k-portlet__head-label">
                        <h3 class="k-portlet__head-title">Access Routes</h3>
                      </div>
                    </div>

                    <!--begin::Form-->
                    <form class="k-form">
                      <div class="k-portlet__body">


                        <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Label</th>
                              <th>Controller</th>
                              <th>Method</th>
                              <th>Assid</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>


                            <?php foreach ($routes as $key => $value): ?>
                              <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['label'] ?></td>
                                <td><?php echo $value['controller'] ?></td>
                                <td><?php echo $value['method'] ?></td>
                                <td><?php echo $value['aside'] ?></td>
                                <td><?php echo $value['status'] ?></td>
                              </tr>
                            <?php endforeach; ?>

                          </tbody>
                        </table>

                      </div>
                      <div class="k-portlet__foot">
                        <div class="k-form__actions">

                        </div>
                      </div>
                    </form>

                    <!--end::Form-->
                  </div>

                  <!--end::Portlet-->


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
      var table_1 = $('#k_table_1');
     var table_2 = $('#k_table_2');


      table_1.DataTable({
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
              <a class="dropdown-item" href="javascript:;" onClick="liberar('${full[0]}','${full[2]}/${full[3]}')"><i class="la la-edit"></i> Liberar Acesso</a>
              <a class="dropdown-item" href="javascript:;" onClick="deletar('${full[0]}','${full[2]}/${full[3]}')"><i class="la la-edit"></i> Deletar Acesso</a>
              <a class="dropdown-item" href="javascript:;" onClick="clonar()"><i class="la la-edit"></i> Clonar Acesso</a>
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
                1: {'title': 'Ativo', 'class': ' k-badge--success'},
                0: {'title': 'Inativo', 'class': ' k-badge--danger'},
              };
              if (typeof status[data] === 'undefined') {
                return data;
              }
              return '<span class="k-badge ' + status[data].class + ' k-badge--inline k-badge--pill">' + status[data].title + '</span>';
            },
          },


          {
            targets: 4,
            render: function(data, type, full, meta) {
              var status = {
                1: {'title': 'Visivel', 'class': ' k-badge--success'},
                0: {'title': 'Invisivel', 'class': ' k-badge--danger'},
              };
              if (typeof status[data] === 'undefined') {
                return data;
              }
              return '<span class="k-badge ' + status[data].class + ' k-badge--inline k-badge--pill">' + status[data].title + '</span>';
            },
          },

        ]
      });


      table_2.DataTable({
        responsive: true,
        pagingType: 'full_numbers',
        columnDefs: [
          {
            targets: 5,
            render: function(data, type, full, meta) {
              var status = {
                1: {'title': 'Visivel', 'class': ' k-badge--success'},
                0: {'title': 'Invisivel', 'class': ' k-badge--danger'},
              };
              if (typeof status[data] === 'undefined') {
                return data;
              }
              return '<span class="k-badge ' + status[data].class + ' k-badge--inline k-badge--pill">' + status[data].title + '</span>';
            },
          },

        ]
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











  var liberar =  function(id, descricao){

    var e = jQuery(`<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form  class="k-form k-form--label-right"  action="<?php echo base_url() ?>Root/postLiberarAcesso" method="post">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Liberar Acesso</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">


    <div class="routes"></div>

    <br>
    <div class="form-group row">
    <div class="col-lg-12 col-xl-12">
    <div class="form-group">
    <label for="exampleSelect1">Perfil</label>
    <select class="form-control" name="perfil">
    <option value="">Selecione ...</option>
    <?php foreach ($perfil as $key => $value) { ?>
      <option value="<?php echo $value['id'] ?>"><?php echo $value['descricao'] ?></option>
      <?php } ?>
      </select>
      </div>
      <input class="form-control" type="hidden" name="routes" value="">
      </div>
      </div>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
      </div>
      </form>
      </div>
      </div>`);

      e.find('div[class="routes"]').html(`Liberar acesso para: ${descricao}`);
      e.find('input[name="routes"]').val(id);
      e.modal('toggle');
    }



    var deletar =  function(id, descricao){

      var e = jQuery(`<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <form  class="k-form k-form--label-right"  action="<?php echo base_url() ?>Root/deletarAcesso" method="post">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Deletar Acesso</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">


      <div class="routes"></div>

      <br>
      <div class="form-group row">
      <div class="col-lg-12 col-xl-12">
      <div class="form-group">
      <label for="exampleSelect1">Perfil</label>
      <select class="form-control" name="perfil">
      <option value="">Selecione ...</option>
      <?php foreach ($perfil as $key => $value) { ?>
        <option value="<?php echo $value['id'] ?>"><?php echo $value['descricao'] ?></option>
        <?php } ?>
        </select>
        </div>
        <input class="form-control" type="hidden" name="routes" value="">
        </div>
        </div>

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
        </form>
        </div>
        </div>`);

        e.find('div[class="routes"]').html(`Liberar acesso para: ${descricao}`);
        e.find('input[name="routes"]').val(id);
        e.modal('toggle');
      }


      var clonar =  function(){

        var e = jQuery(`<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form  class="k-form k-form--label-right"  action="<?php echo base_url() ?>Root/clonarAcesso" method="post">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Deletar Acesso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

        <div class="form-group row">
        <div class="col-lg-12 col-xl-12">
        <div class="form-group">
        <label for="exampleSelect1">Perfil De</label>
        <select class="form-control" name="in">
        <option value="">Selecione ...</option>
        <?php foreach ($perfil as $key => $value) { ?>
          <option value="<?php echo $value['id'] ?>"><?php echo $value['descricao'] ?></option>
          <?php } ?>
          </select>
          </div>
          </div>
          </div>


          <br>
          <div class="form-group row">
          <div class="col-lg-12 col-xl-12">
          <div class="form-group">
          <label for="exampleSelect1">Perfil Para</label>
          <select class="form-control" name="to">
          <option value="">Selecione ...</option>
          <?php foreach ($perfil as $key => $value) { ?>
            <option value="<?php echo $value['id'] ?>"><?php echo $value['descricao'] ?></option>
            <?php } ?>
            </select>
            </div>
            </div>
            </div>

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Clonar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
            </form>
            </div>
            </div>`);

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
