<div class="popup">
  <div class="popup__body">
    <form class="modal-call col-center rel" data-yandex-key="zvonok" data-google-key="zvonok">
      <div class="text21 ber mb fw7 tac">
        <?php the_field('m_header_1', 2); ?>
      </div>
      
      <div class="mc mb">
        <div class="mc-img mr">
          <img src="<?php the_field('m_ava_1', 2); ?>" alt="">
        </div>
        <div class="mc-text">
          <h4 class="text21 mbs">
            <?php the_field('m_fio_1', 2); ?>
          </h4>
          <div class="tsm13">
            <?php the_field('m_dol_1', 2); ?>
          </div>
        </div>
      </div>
      
      <div class="text tac mbm">
        <b class="fw7">Заполните форму,</b> мы вам <br>
        перезвоним и проконсультируем <br>
        по всем вопросам
      </div>
      
      <div class="col-center modal__inp-bl" style=" width: 100%;">
        <input type="hidden" name="title" class="js-val-inp" value="Консультация">
        <input type="hidden" name="formname" value="call">
  
        <div class="form__row">
          <label class="input form__input form__input_full-width">
            <span class="input__title input__title_center">Введите Ваше имя:</span>
            <input type="text" class="input__input" name="name">
          </label>
        </div>
        <div class="form__row">
          <label class="input form__input form__input_full-width">
            <span class="input__title input__title_center">Введите номер Вашего телефона:</span>
            <input type="tel" class="input__input" name="phone">
          </label>
        </div>
        <button type="submit" class="btn max mbm mbm">
          <span class="btn-blick"></span>
          <span class="tsm13 black fw4">Перезвонить и проконсультировать</span>
        </button>
        
        <a href="#" data-policy-link class="tsm10 link-hover btn-politics-js gray black tac">
          Мы не передаём Ваш номер третьим лицам <br>
          и не используем его для рассылки рекламы
        </a>
      </div>
    </form>
  </div>
</div>