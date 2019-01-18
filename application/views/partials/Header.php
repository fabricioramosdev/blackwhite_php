<!-- begin:: Header -->
<div id="k_header" class="k-header k-grid__item  k-header--fixed ">

  <!-- begin: Header Menu -->
<button class="k-header-menu-wrapper-close" id="k_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
 <div class="k-header-menu-wrapper" id="k_header_menu_wrapper">
    <div id="k_header_menu" class="k-header-menu k-header-menu-mobile ">&nbsp;</div>
  </div>
  <!-- end: Header Menu -->

  <!-- begin:: Header Topbar -->
  <div class="k-header__topbar">


    <!--begin: User bar -->
    <div class="k-header__topbar-item k-header__topbar-item--user">
      <div class="k-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px -2px">
        <div class="k-header__topbar-user">
          <span class="k-header__topbar-welcome k-hidden-mobile">Hello!, </span>
          <span class="k-header__topbar-username k-hidden-mobile"><?php echo  $this->session->usuario[0]['nome']; ?></span>
          <img alt="Pic" src="<?php echo base_url(); ?>assets/media/users/<?php echo  $this->session->usuario[0]['avatar']; ?>" />

          <!--use below badge element instead the user avatar to display username's first letter(remove k-hidden class to display it) -->
          <span class="k-badge k-badge--username k-badge--lg k-badge--brand k-hidden">A</span>
        </div>
      </div>
      <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-md">
        <div class="k-user-card k-margin-b-50 k-margin-b-30-tablet-and-mobile" style="background-image: url(<?php echo base_url(); ?>assets/media/misc/head_bg_sm.jpg)">
          <div class="k-user-card__wrapper">
            <div class="k-user-card__pic">
              <img alt="Pic" src="<?php echo base_url(); ?>assets/media/users/<?php echo  $this->session->usuario[0]['avatar']; ?>" />
            </div>
            <div class="k-user-card__details">
              <div class="k-user-card__name"><?php
              $nome = explode(" ",$this->session->usuario[0]['nome']);
              echo $nome[0].' '.$nome[count($nome)-1];
              ?></div>
              <!--============================================================== -->
              <div class="k-user-card__position"><?php echo  $this->session->usuario[0]['descperfil']; ?>, <?php echo  $this->session->usuario[0]['descloja']; ?>.</div>
              <!--============================================================== -->
            </div>
          </div>
        </div>
        <ul class="k-nav k-margin-b-10">
          <li class="k-nav__item">
            <a href="<?php echo base_url() ?>Profile" class="k-nav__link">
              <span class="k-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
              <span class="k-nav__link-text">Meu perfil</span>
            </a>
          </li>
          <li class="k-nav__item k-nav__item--custom k-margin-t-15">
            <a href="<?php echo base_url() ?>LogOut" class="btn btn-outline-metal btn-hover-brand btn-upper btn-font-dark btn-sm btn-bold">Log Out</a>
          </li>
        </ul>
      </div>
    </div>

    <!--end: User bar -->

  </div>

  <!-- end:: Header Topbar -->
</div>

<!-- end:: Header -->
