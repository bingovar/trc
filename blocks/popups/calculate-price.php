<div class="popup popup_sm">
  <div class="popup__body">
    <form class="modal-call col-center rel form" action="#" data-yandex-key="calculate_price" data-google-key="calculate_price">
      <div class="text21 ber mbs fw4 tac">
        Расчет цены
      </div>
      <div class="text21 ber mb fw7 tac m-title-tex2-js"><?=$_GET["product_name"]?></div>
      <div class="mp-block">
        <div class="col-center modal__inp-bl w100">
          <input type="hidden" name="title" class="one-title-val2-js" value="Расчёт цены">
          <input type="hidden" name="formname" value="call">
          <input type="hidden" name="product_name" value="<?=$_GET["product_name"]?>">
          <!--1-->
          <div class="small-text fw7 paradigma_otstoi">
            <?php the_field('m_ph_1', 2); ?>
          </div>
          <label class="radio">
            <input type="radio" class="radio__input" name="delivery" checked value="<?php the_field('m_p_1', 2); ?>">
            <span class="radio__icon radio__icon_size-vw"></span>
            <span class="radio__title radio__title_size-vw"><?php the_field('m_p_1', 2); ?></span>
          </label>
          <label class="radio">
            <input type="radio" class="radio__input" name="delivery" value="<?php the_field('m_p_2', 2); ?>">
            <span class="radio__icon radio__icon_size-vw"></span>
            <span class="radio__title radio__title_size-vw"><?php the_field('m_p_2', 2); ?></span>
          </label>
          <!--2-->
          <div class="small-text fw7 paradigma_otstoi">
            <?php the_field('m_ph_2', 2); ?>
          </div>
          <label class="radio">
            <input type="radio" class="radio__input" name="payment_type" checked value="<?php the_field('m_p_3', 2); ?>">
            <span class="radio__icon radio__icon_size-vw"></span>
            <span class="radio__title radio__title_size-vw"><?php the_field('m_p_3', 2); ?></span>
          </label>
          <label class="radio">
            <input type="radio" class="radio__input" name="payment_type" value="<?php the_field('m_p_4', 2); ?>">
            <span class="radio__icon radio__icon_size-vw"></span>
            <span class="radio__title radio__title_size-vw"><?php the_field('m_p_4', 2); ?></span>
          </label>
          <!--3-->
          <div class="form__row paradimenet">
            <label class="input form__input form__input_full-width">
              <span class="small-text fw7 tac paradigma_otstoi">3. Ваш населенный пункт</span>
              <input type="text" class="input__input" name="address">
            </label>
          </div>
          <!--4-->
          <div class="form__row">
            <label class="input form__input form__input_full-width">
              <span class="small-text fw7 tac paradigma_otstoi">4. Ваш номер телефона</span>
              <input type="tel" class="input__input" name="phone">
            </label>
          </div>
          <button class="btn max mbm mbm">
            <span class="btn-blick"></span>
            <span class="tsm13 black fw4">Рассчитать цену</span>
          </button>
<!--          <a href="#" data-policy-link class="tsm10 link-hover btn-politics-js gray black tac">-->
<!--            Мы не передаём Ваш номер третьим лицам <br>-->
<!--            и не используем его для рассылки рекламы-->
<!--          </a>-->
        </div>
      </div>
    
    </form>
  </div>
</div>