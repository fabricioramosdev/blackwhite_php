<!--begin::Script alert -->
<script type="text/javascript">
    <?php
    if(!empty($this->session->flashdata('notfy'))) {
      $message = $this->session->flashdata('notfy');
      ?>
      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-full-width",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

        toastr.<?php echo $message['type'];?>('<?php echo $message['msg'];?>', '<?php echo $message['title'];?>');
    <?php	} ?>
</script>
<!--end::Script alert -->
