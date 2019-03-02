<!--begin::Dashboard 2-->

<div class="row">
  <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

    <!--begin::Portlet-->
    <div class="k-portlet k-portlet--fit k-portlet--height-fluid">
      <div class="k-portlet__body k-portlet__body--fluid">
        <div class="k-widget-3 k-widget-3--primary">
          <div class="k-widget-3__content">
            <div class="k-widget-3__content-info">

              <div class="k-widget-3__content-section">
                <span class="k-widget-3__content-number"><span>R$&nbsp;</span><?php echo number_format($vendas_mes[0]['vendas_mes'],2) ?></span>
              </div>
            </div>

            <div class="k-widget-3__content-stats">

              <div class="k-widget-3__content-action">
                <div class="k-widget-3__content-text">Vendas mês</div>
                <div class="k-widget-3__content-value">MÊS (<?php echo date('m/Y') ?>)</div>
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
        <div class="k-widget-3 k-widget-3--metal">
          <div class="k-widget-3__content">
            <div class="k-widget-3__content-info">

              <div class="k-widget-3__content-section">
                <span class="k-widget-3__content-number"><span>R$&nbsp;</span><?php echo number_format($vendas_semana[0]['vendas_semana'],2) ?></span>
              </div>
            </div>

            <div class="k-widget-3__content-stats">

              <div class="k-widget-3__content-action">
                <div class="k-widget-3__content-text">Vendas semana</div>
                <div class="k-widget-3__content-value">SEMANA (<?php echo $vendas_semana[0]['semana'] ?>)</div>
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
        <div class="k-widget-3 k-widget-3--warning">
          <div class="k-widget-3__content">
            <div class="k-widget-3__content-info">

              <div class="k-widget-3__content-section">
                <span class="k-widget-3__content-number"><span>R$&nbsp;</span><?php echo number_format($vendas_atradas[0]['total_vencida'],2) ?></span>
              </div>
            </div>

            <div class="k-widget-3__content-stats">

              <div class="k-widget-3__content-action">
                <div class="k-widget-3__content-text"><a href="<?php echo base_url(); ?>Crediario/atraso"><i class="fa fa-angle-double-right"></i> Parcelas em atraso</a></div>
                <div class="k-widget-3__content-value"> EM (<?php echo date('d/m/Y') ?>)</div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!--end::Portlet-->
  </div>
</div>






<!--begin::Row-->
<div class="row">
  <div class="col-lg-8 col-xl-8 order-lg-1 order-xl-1">

    <!--begin::Portlet-->
    <?php $this->view('charts/faturamento_mensal'); ?>
    <!--end::Portlet-->
  </div>
  <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

    <!--begin::Portlet-->
    <?php $this->view('charts/vendas_forma_pagamento'); ?>
    <!--end::Portlet-->
  </div>

</div>

<!--end::Row-->

<!--begin::Row-->
<div class="row">
  <div class="col-lg-1 col-xl-1 order-lg-1 order-xl-1"></div>
  <div class="col-lg-10 col-xl-10 order-lg-1 order-xl-1">

    <!--begin::Portlet-->
    <?php $this->view('charts/curva_abc_produtos'); ?>
    <!--end::Portlet-->
  </div>
  <div class="col-lg-1 col-xl-1 order-lg-1 order-xl-1"></div>
</div>

<!--end::Row-->


<!--begin::Row-->
<div class="row">

  <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
    <!--begin::Portlet-->


    <div class="k-portlet">
      <div class="k-portlet__head">
        <div class="k-portlet__head-label">
          <h3 class="k-portlet__head-title">Aniversariantes do mês (<?php echo date('m') ?>)</h3>
        </div>
      </div>
      <div class="k-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
          <thead>
            <tr>

              <th>Nome</th>
              <th>Data Nascimento</th>
              <th>Tel.Cel</th>
              <th>Tel.Out</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($aniversariantes_mes as $key => $value): ?>
              <tr>
                <td><?php echo $value['nome'] ?></td>
                <td><?php echo $value['datanasc'] ?></td>
                <td><a href="<?php echo $value['whatsapp'] ?>" target="_blank"> <i class="fab fa-whatsapp fa-2x"></i> &nbsp;<?php echo $value['telCel'] ?> </a></td>
                <td><?php echo $value['telOut'] ?></td>                
                <td nowrap></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>


      </div>
    </div>

    <!--end::Portlet-->
  </div>

</div>

<!--end::Row-->


<!--end::Dashboard 2-->
