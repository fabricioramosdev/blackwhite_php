<!-- begin:: Aside -->
<button class="k-aside-close " id="k_aside_close_btn"><i class="la la-close"></i></button>
<div class="k-aside  k-aside--fixed 	k-grid__item k-grid k-grid--desktop k-grid--hor-desktop" id="k_aside">

  <!-- begin:: Aside -->
  <div class="k-aside__brand	k-grid__item " id="k_aside_brand">
    <div class="k-aside__brand-logo">
      <a href="<?php echo base_url(); ?>App/index">
        <img  src="<?php echo base_url(); ?>assets/media/logos/logo-1-bw.png" />
      </a>
    </div>
    <div class="k-aside__brand-tools">
      <button class="k-aside__brand-aside-toggler k-aside__brand-aside-toggler--left" id="k_aside_toggler"><span></span></button>
    </div>
  </div>
  <!-- end:: Aside -->

  <!-- begin:: Aside Menu -->
  <div class="k-aside-menu-wrapper	k-grid__item k-grid__item--fluid" id="k_aside_menu_wrapper">
    <div id="k_aside_menu" class="k-aside-menu " data-kmenu-vertical="1" data-kmenu-scroll="1" data-kmenu-dropdown-timeout="500">
      <ul class="k-menu__nav ">
        <li class="k-menu__item  k-menu__item--submenu k-menu__item--open k-menu__item--here" aria-haspopup="true" data-kmenu-submenu-toggle="hover"><a href="javascript:;" class="k-menu__link k-menu__toggle"><i class="k-menu__link-icon flaticon2-graphic"></i><span class="k-menu__link-text">Minha loja</span><i class="k-menu__ver-arrow la la-angle-right"></i></a>
          <div class="k-menu__submenu "><span class="k-menu__arrow"></span>
            <ul class="k-menu__subnav">
              <?php foreach ($this->session->usuario[0]['routes'] as $key => $value): ?>
                      <li class="k-menu__item " aria-haspopup="true"><a href="<?php echo base_url($value['url']);  ?>" class="k-menu__link "><i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span class="k-menu__link-text"><?php echo $value['label'] ?></span></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </li>

      </ul>
    </div>
  </div>

  <!-- end:: Aside Menu -->

  <!-- begin:: Aside -->
  <!-- <div class="k-aside__footer		k-grid__item" id="k_aside_footer">
    <div class="k-aside__footer-nav">
      <div class="k-aside__footer-item">
        <a href="#" class="btn btn-icon"><i class="flaticon2-gear"></i></a>
      </div>
      <div class="k-aside__footer-item">
        <a href="#" class="btn btn-icon"><i class="flaticon2-cube"></i></a>
      </div>
      <div class="k-aside__footer-item">
        <a href="#" class="btn btn-icon"><i class="flaticon2-bell-alarm-symbol"></i></a>
      </div>
      <div class="k-aside__footer-item">
        <button type="button" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="flaticon2-add"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-left">
          <ul class="k-nav">
            <li class="k-nav__section k-nav__section--first">
              <span class="k-nav__section-text">Export Tools</span>
            </li>
            <li class="k-nav__item">
              <a href="#" class="k-nav__link">
                <i class="k-nav__link-icon la la-print"></i>
                <span class="k-nav__link-text">Print</span>
              </a>
            </li>
            <li class="k-nav__item">
              <a href="#" class="k-nav__link">
                <i class="k-nav__link-icon la la-copy"></i>
                <span class="k-nav__link-text">Copy</span>
              </a>
            </li>
            <li class="k-nav__item">
              <a href="#" class="k-nav__link">
                <i class="k-nav__link-icon la la-file-excel-o"></i>
                <span class="k-nav__link-text">Excel</span>
              </a>
            </li>
            <li class="k-nav__item">
              <a href="#" class="k-nav__link">
                <i class="k-nav__link-icon la la-file-text-o"></i>
                <span class="k-nav__link-text">CSV</span>
              </a>
            </li>
            <li class="k-nav__item">
              <a href="#" class="k-nav__link">
                <i class="k-nav__link-icon la la-file-pdf-o"></i>
                <span class="k-nav__link-text">PDF</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="k-aside__footer-item">
        <a href="#" class="btn btn-icon"><i class="flaticon2-calendar-2"></i></a>
      </div>
    </div>
  </div>
  <!-- end:: Aside --> -->
</div>

<!-- end:: Aside -->
