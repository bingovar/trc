<div class="popup popup_sm">
  <div class="popup__body">
    <form class="form modal-call col-center rel" action="#" data-yandex-key="nashli_deshevle" data-google-key="nashli_deshevle">
      <div class="text21 ber mbs fw4 tac">Нашли этот товар дешевле<br> у другого продавца?</div>
      <div class="text21 ber mbm fw7 tac"><?php the_field('m_header_6', 2); ?></div>
      <div class="small-text tac mb"><?php the_field('m_descr_5', 2); ?></div>
      <div class="col-center modal__inp-bl w80" >
        <input type="hidden" name="title" value="Нашли дешевле?">
        <input type="hidden" name="formname" value="call">
        <input type="hidden" name="product_name" value="<?=$_GET["product_name"]?>">
        <div class="form__row">
          <label class="input form__input form__input_full-width">
            <span class="input__title input__title_center">Ссылка на товар:</span>
            <input type="text" class="input__input" name="link">
          </label>
        </div>
        <div class="form__row">
          <div class="file-input file-input_full-width">
            <div class="file-input__title file-input__title_center">Фотография с ценником:</div>
            <div class="file-input__wrapper">
              <div class="file-input__names-block"></div>
              <label class="file-input__button-wrapper">
                <input type="file" class="file-input__input" name="userfile[]" accept="image/*" multiple>
                <span class="file-input__button file-input__button_size-vw" type="button">Выбрать</span>
              </label>
            </div>
          </div>
        </div>
        <div class="form__row">
          <label class="input form__input form__input_full-width">
            <span class="input__title input__title_center input__title_center-margin">Ваш контактный номер:</span>
            <input type="tel" class="input__input" name="phone">
          </label>
        </div>
        <button class="btn max mbm mbm">
          <span class="btn-blick"></span>
          <span class="tsm13 black fw4">Отправить</span>
        </button>

      </div>
    </form>
  </div>
</div>