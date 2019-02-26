<!-- begin:: Content Body -->
<div class="k-content__body	k-grid__item k-grid__item--fluid" id="k_content_body">
<!-- begin::Dashboard-->
  <?php
    if( $this->router->class == 'App'){
      $this->view("partials/Dashboard_{$this->session->usuario[0]['descperfil']}");
    }
    ?>
<!--end::Dashboard-->
</div>
<!-- end:: Content Body -->
