<div class="to_top"></div>

<!-- modals -->
<!--<div class="right-menu tsm13">
  <a href="/popup/technics-select/" class="right-menu__item btn-price-js" data-technics-select-link>
    <span class="right-menu__item-hover">Подобрать технику</span>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/modals/calc.svg" alt="">
  </a>
  <a href="/popup/back-call/" data-popup-link class="right-menu__item">
    <span class="right-menu__item-hover">Обратный звонок</span>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/modals/ph.svg" alt="">
  </a>
  <a href="/popup/gift" data-popup-link class="right-menu__item">
    <span class="right-menu__item-hover">Получить подарок</span>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/modals/gift.svg" alt="">
  </a>
  <a href="/popup/download-catalog" data-download-catalog-popup class="end-js right-menu__item">
    <span class="right-menu__item-hover">Скачать каталог</span>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/modals/dowvlad.svg" alt="">
  </a>
</div>
-->
<div class="ml-test" style="display: none">
  <div class="close"></div>
  <div class="ml-test-img">
    <img src="<?php the_field('m_ml_img', 2); ?>" alt="">
  </div>
  <div class="ml-test-text">
    <div class="tsm12 mbm">
      Бесплатный тест:
    </div>
    <h5 class="text mbm">
      Подберите<br>
      навесное оборудование
    </h5>
    <button class="btn max mbm mbm test1-js" id="technics-select-alert-button">
      <span class="tsm12 black fw4">Пройти тест</span>
    </button>
  </div>
</div>

<input type="hidden" id="dir-site-start" value="<?php the_permalink(2); ?>/">
<input type="hidden" id="dir-site" value="<?php echo get_stylesheet_directory_uri(); ?>/">
<input type="hidden" id="catalog-pdf-opt" value="<?php the_field('pdf-opt', 2); ?>">
<input type="hidden" id="catalog-pdf-rozn" value="<?php the_field('pdf-rozn', 2); ?>">
<input type="hidden" id="ajax-form-handler" value="<?php echo admin_url('admin-ajax.php?action=formHandler'); ?>">
<input type="hidden" id="ajax-modal-base" value="<?php echo admin_url('admin-ajax.php?action=modal&name='); ?>">
<input type="hidden" class="thank-url" value="<?php the_permalink(964); ?>">