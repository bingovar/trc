<div class="popup popup_min">
  <div class="popup__body">
    <form class="form modal-call col-center rel" action="#" data-yandex-key="snizhenie_ceni" data-google-key="snizhenie_ceni">
      <div class="text21 ber mbm fw7 tac">
        Сообщить о снижении цены
      </div>
      <div class="form_title">
        Оставьте номер своего телефона,
        Мы перезвоним Вам, когда цена
        на этот товар снизится.
      </div>
      <div class="col-center modal__inp-bl" style=" width: 100%;">
        <input type="hidden" name="title" class="dowm-modal-val" value="Сообщить о снижении цены">
        <input type="hidden" name="formname" value="call">
        <input type="hidden" name="product_name" value="<?=$_GET["product_name"]?>">
        <div class="form__row">
          <label class="input form__input form__input_full-width">
            <span class="input__title input__title_center">Ваше имя:</span>
            <input type="text" class="input__input" name="name">
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
      </div>
    </form>
  </div>
</div>