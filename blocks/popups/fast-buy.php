<div class="popup popup_sm">
  <div class="popup__body">
    <form class="form modal-call col-center rel" action="#" data-yandex-key="kupit" data-google-key="kupit"">
      <div class="text21 ber mbm fw7 tac">Заказать в 1 клик</div>
      <div class="text-md mbm m-one m-title-tex-js fw7"><?=$_GET["product_name"]?></div>
      <div class="text tac mb"><?php the_field('m_descr_4', 2); ?></div>
      <div class="col-center modal__inp-bl" style="width: 100%;">
        <input type="hidden" name="title" class="one-title-val-js" value="Заказать в 1 клик">
        <input type="hidden" name="formname" value="call">
        <input type="hidden" name="product_name" value="<?=$_GET["product_name"]?>">
        <div class="form__row">
          <label class="input form__input form__input_full-width">
            <span class="input__title input__title_center">Введите номер Вашего телефона:*</span>
            <input type="tel" class="input__input" name="phone">
          </label>
        </div>
        <button class="btn max mbm mbm">
          <span class="tsm13 black fw4">Заказать прямо сейчас</span>
        </button>
      
        <a href="#" data-policy-link class="tsm10 link-hover btn-politics-js gray black tac">
          Мы не передаём Ваш номер третьим лицам <br>
          и не используем его для рассылки рекламы
        </a>
      </div>
  
    </form>
  </div>
</div>