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
        <div class="k-widget-3 k-widget-3--warningr">
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

<!--end::Dashboard 2-->
