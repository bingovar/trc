<div class="popup popup_sm">
  <div class="popup__body">
    <form class="form modal-call col-center rel" action="#" data-yandex-key="download_catalog">
      <div class="text tac mb">

      </div>
      <div class="text21 ber mb fw7 tac">
        <?php the_field('m_header_3', 2); ?>
      </div>

      <div class="mc2 mb">
        <img class=" lazyloaded" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ctg.png" alt="">
<!--        <img src="--><?php //the_field('m_list_1', 2); ?><!--" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/modals/arr.png" alt="" class="mc2-arr">-->
      </div>

      <div class="text tac mbm">
<!--        --><?php //the_field('m_descr_1', 2); ?>
      </div>

      <div class="col-center modal__inp-bl" style=" width: 100%;">
        <input type="hidden" name="typecatalog" value="catalog-opt">
        <input type="hidden" name="title" value="Скачка оптового каталога">
        <input type="hidden" name="formname" value='catalog'>
          <div class="form__row">
              <label class="input form__input form__input_full-width">
                  <span class="input__title input__title_center">Ваше имя:</span>
                  <input type="name" class="input__input" name="name">
              </label>
          </div>
        <div class="form__row">
          <label class="input form__input form__input_full-width">
            <span class="input__title input__title_center">Ваш контактный номер:</span>
            <input type="tel" class="input__input" name="phone">
          </label>
        </div>
        <button class="btn max mbm mbm">
          <span class="tsm13 black fw4">Отправить</span>
        </button>
          <!--
        <div class="tsm10 gray mbm tac">
          PDF 2.5 Mb  &bull;   Обновлен <span class="date-js">01.06.2021</span>
        </div>
        <a href="#" data-policy-link class="tsm10 link-hover btn-politics-js gray black tac">
          Мы не передаём Ваш номер третьим лицам <br>
          и не используем его для рассылки рекламы
        </a>
      </div>
        -->
    </form>
  </div>
</div>

