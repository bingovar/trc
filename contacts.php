<?php
  /*
  Template Name: Контакты
  */
?>
<?php
  include 'blocks/head.php';
?>
<body>

<div class="main page-mb" id="main">
  <div class="lines">
    <div class="lines__item"></div>
    <div class="lines__item"></div>
    <div class="lines__item"></div>
    <div class="lines__item"></div>
    <div class="lines__item"></div>
  </div>
  <?php
    include 'blocks/header.php';
  ?>

</div>
<div class="mb"></div>
<div class="lines">
  <div class="lines__item"></div>
  <div class="lines__item"></div>
  <div class="lines__item"></div>
  <div class="lines__item"></div>
  <div class="lines__item"></div>
</div>
<!-- <div class="main-pages-wrap"> -->
<div class="container-big main-pages psr">
  
  <div class="main-pages-left" style="width: 100%;">
    <?php
      /* breadcrumb Yoast */
      if (function_exists('yoast_breadcrumb')) :
        yoast_breadcrumb('<div id="breadcrumbs" class="bread small-text fw4 msm">', '</div>');
      endif;
    ?>
  
  </div>

</div>
<!-- </div> -->


<div class="pcontacts pages-cont ">
  <div class="lines">
    <div class="lines__item"></div>
    <div class="lines__item"></div>
    <div class="lines__item"></div>
    <div class="lines__item"></div>
    <div class="lines__item"></div>
  </div>
  <div class="container-big pcontacts-cont psr">
    
    <div class="pcontacts-left">
      <?php
        if (have_rows('contacts-scroll-355', 4424)): while (have_rows('contacts-scroll-355', 4424)): the_row();
          
          // vars
          $header = get_sub_field('header');
          $timetable = get_sub_field('timetable');
          $mail_text = get_sub_field('mail_text');
          $mail_img = get_sub_field('mail_img');
          $img_bg = get_sub_field('img_bg');
          ?>
          
          <div class="pcontacts-left-item msmсcontact">
            <div class="t-min2 rel fw4 msm tal"> <?php echo $header; ?>
            </div>
            <div class="pcontacts-left-item__head">
              <div class="pcontacts-left-item__head-text">
                <div class="kr-text mbm">
                  <div class="tsm13 black text-md link-hover fw6  phone-block-contact">
                    <?php echo $timetable; ?>
                  </div>
                </div>
                <?php
                  if (have_rows('phones_bl_355', 4424)): while (have_rows('phones_bl_355', 4424)): the_row();
                    
                    // vars
                    $img = get_sub_field('img');
                    $text = get_sub_field('text');
                    $link = get_sub_field('link');
                    
                    ?>
                    <div class="phone-block row-vcenter mbm-contact">
                      <div class="adres-block__text black text-md"><?php echo $text; ?></div>
                    </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
                <div class="phone-block row-vcenter mbm-contact">
                  <div class="phone-block__ico col-center mrm">
                    <img src="<?php echo $mail_img; ?>" alt="">
                  </div>
                  <a href="mailto:<?php echo $mail_text; ?>" class="phone-block__text  black tsm13 link-hover fw4"><?php echo $mail_text; ?></a>
                </div>
              
              
              </div>
            </div>
          
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    
    <div class="map">
        <div class="t-min3 rel fw4 mrg-bot tal">GPS: 52.173898, 24.344685</div>
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Acb3845e1840d8fec4fb9e85d90c50dfd60f3ad1f8adf2fe9caff9f8cf445b6cb&amp;source=constructor" width="100%" height="90%" frameborder="0"></iframe>
    </div>
  </div>
</div>

<!-- departments -->

<!-- requisites -->
<div class="requisites psr">
  <div class="container-big requisites-cont psr">

     <!-- <div class="requisites-left">
      <div class="requisites-left-block tsm13">
        <div class="container-big fix-title departments-cont psr">
          <?php
            if (have_rows('contacts_bl_355', 4424)): while (have_rows('contacts_bl_355', 4424)): the_row();
              
              // vars
              $header = get_sub_field('header');
              $timetable = get_sub_field('timetable');
              $mail_text = get_sub_field('mail_text');
              $mail_img = get_sub_field('mail_img');
              ?>
              
              <div class="departments-item msm">
                <h3 class="t-min2 fw5 mbm">
                  <?php echo $header; ?>
                </h3>
                <div class="kr-text mbm">
                  <div class="kr-text__cir mrm"></div>
                  <div class="tsm13">
                    <?php echo $timetable; ?>
                  </div>
                </div>
                
                <div class="departments-item__cont">
                  <?php
                    if (have_rows('phones_bl2_355', 4424)): while (have_rows('phones_bl2_355', 4424)): the_row();
                      
                      // vars
                      $img = get_sub_field('img');
                      $text = get_sub_field('text');
                      $link = get_sub_field('link');
                      
                      ?>
                      <div class="phone-block row-vcenter mbm">
                        <div class="phone-block__ico col-center mrm">
                          <img src="<?php echo $img; ?>" alt="">
                        </div>
                        <a href="tel:<?php echo $text; ?>" class="phone-block__text black text-md link-hover fw7"><?php echo $text; ?></a>
                      </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                  <div class="phone-block row-vcenter mbm">
                    <div class="phone-block__ico col-center mrm">
                      <img src="<?php echo $mail_img; ?>" alt="">
                    </div>
                    <a href="mailto:<?php echo $mail_text; ?>" class="phone-block__text black text-md link-hover fw4"><?php echo $mail_text; ?></a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php endif; ?>
        
        </div>
      </div>
    
    </div>-->

    <form data-embed-form data-yandex-key="obratbnaya_svyaz" data-google-key="obratbnaya_svyaz" class="requisites-right">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/contacts/crc.svg" alt="" class="psdf poe requisites-right__bg-img">
      <h3 class="t-min2 mb tac">
        Обратная связь
      </h3>
      <div class="requisites-right__block form">
        <div class="requisites-right__block-item">
          <input type="hidden" name="title" value='Обратная связь'>
          <label class="input form__input form__input_full-width requisites-right__input">
            <span class="input__title">Введите Ваше имя:</span>
            <input type="text" class="input__input input__input_thin" name="name">
          </label>
          <label class="input form__input form__input_full-width requisites-right__input">
            <span class="input__title">Введите номер Вашего телефона:*</span>
            <input type="tel" name="phone" class="input__input input__input_thin">
          </label>
          <label class="input form__input form__input_full-width requisites-right__input">
            <span class="input__title">Ваша электронная почта:</span>
            <input type="text" class="input__input input__input_thin" name="email">
          </label>
        </div>
        <div class="form__col requisites-right__block-item">
          <label class="input form__input form__input_full-width form__input_full-height requisites-right__input">
            <span class="input__title">Ваше сообщение:</span>
            <textarea name="message" class="input__input input__input_textarea"></textarea>
          </label>
          <button class="btn max mbs requisites-right__submit-button">
            <span class="btn-blick"></span>
            <span class="text black fw4">Отправить</span>
          </button>
        </div>
      </div>
      

    </form>
  </div>
</div>

<?php
  include 'blocks/modals.php';
?>
<?php
  include 'blocks/footer-big.php';
?>





<?php
  include 'blocks/scripts.php';
?>


</body>
</html>