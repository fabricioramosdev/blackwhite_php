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
                        <div class="row" style="margin-bottom:20px">
                          <div class="col-sm-6 col-md-6  col-xl-6 col-6"><a href="<?php echo base_url(); ?>Categoria/add" class="btn btn-success btn-wide">Adicionar Categoria / Sub-categoria</a></div>


                        </div>
                        <!-- ================================================= -->

                        <!--begin: Datatable Categorias -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
                          <caption>Lista de Categorias</caption>
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Descrição</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($listaprodutoscategorias as $key => $value): ?>

                              <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['descricao'] ?></td>
                                <td><?php echo $value['status'] ?></td>
                                <td><i class="la la-trash"></i></td>
                              </tr>

                            <?php endforeach; ?>
                          </tbody>
                        </table>

                        <!--end: Datatable Categorias -->


                        <div class="row"><div class="col-12">&nbsp;</div></div>
                        <div class="row"><div class="col-12"><hr/></div></div>
                        <div class="row"><div class="col-12">&nbsp;</div></div>


                        <!--begin: Datatable SubCategorias -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_2">
                          <caption>Lista de Sub-categorias</caption>
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Categoria</th>
                              <th>Descrição</th>
                              <th>Status</th>
                              <th><i class="la la-trash"></i></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach ($listasubcategoria as $key => $value): ?>

                              <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['categoria'] ?></td>
                                <td><?php echo $value['descricao'] ?></td>
                                <td><?php echo $value['status'] ?></td>
                                <td></td>
                              </tr>

                            <?php endforeach; ?>

                          </tbody>
                        </table>

                        <!--end: Datatable SubCategorias -->


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
      var table_1 = $('#k_table_1');
      // begin first table
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
              <a class="dropdown-item" href="javascript:;"  onClick="deletar(${full[0]},'Categoria/delete_categoria')"><i class="la la-trash"></i>Deletar Categoria</a>
              </div>
              </span>
              <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
              <i class="la la-edit"></i>
              </a>`;
            },
          },
          {
            targets: 2,
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



      var table_2 = $('#k_table_2');
      // begin first table
      table_2.DataTable({
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
              <a class="dropdown-item" href="javascript:;"  onClick="deletar(${full[0]},'Categoria/delete_subcategoria')"><i class="la la-trash"></i>Deletar Sub-categoria</a>
              </div>
              </span>
              <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
              <i class="la la-edit"></i>
              </a>`;
            },
          },
          {
            targets: 3,
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


  var deletar =  function(id, url) {

    if (id != '') {
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


          //===============================================
          $.ajax(
            {
              url: app_u +''+ url,
              data: {
                id: id
              },
              type: 'post',
              dataType: 'json',
              success: function (data) {

                swal(
                  'Deletado!',
                  'Seu registro foi excluído.',
                  'success'
                );
                location.reload();
              }
            }
          );
          //===============================================
        } else if (result.dismiss === 'cancel') {
          swal(
            'Cancelado',
            'Seu registro  está seguro :)',
            'error'
          )
        }
      });

    }

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
