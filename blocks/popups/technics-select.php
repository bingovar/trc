<div class="popup technics-select-popup">
  <div class="popup__body">
    <form class="technics-select-popup__inner" action="#">
      <div class="technics-select-popup__main">
        <div class="technics-select-popup__header">
          <div class="text ber mbs fw4 technics-select-popup__header">
            Пройдите бесплатный тест:
          </div>
          <div class="t-ss ber mbm ttu fw7">
            <?php the_field('test_h_1', 2); ?>
          </div>
          <div class="text21 mb">
            <?php the_field('test_h_2', 2); ?>
          </div>
          <div class="test-ns msm technics-select-popup__progress-bar-wrapper">
            <div class="test-ns-num mr">
              <b class="fw7">Вопрос <span class="technics-select-popup__page-num">0</span></b> из 4
            </div>
            <div class="progress-bar">
              <div class="progress-bar__line-wrap">
                <div class="progress-bar__line">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="technics-select-popup__form">
          <div class="popup__pages">
            <div class="popup__page">

                <div class="popup__page-left">

              <h3 class="text23 mb technics-select-popup__question-header"><?php the_field('test_qw1_h', 2); ?></h3>
              <label class="input input_num input_title-right technics-select-popup__question-input">
                  <span class="input__title input__title_right red2">Введите площадь Вашего участка</span>
                  <span class="input__title input__title_right red2">соток</span>
                <input type="text" class="input__input input__input_num" name="area">
              </label>
              <div class="slider-block sbrt mb">
                <input type="text" class="js-range-slider" value=""/>
              </div>
                </div>
                <div class="technics-select-popup__information-block technics-select-popup__information-block_main">
                    <div class="technics-select-popup__question-image">
                        <div class="qwiz"><img src="<?php the_field('test_qw1_img', 2); ?>" alt="">
                        </div></div>

                </div>
            </div>




            <div class="popup__page">

                <div class="popup__page-left">
              <h3 class="text23 mb technics-select-popup__question-header">
                <?php the_field('test_qw2_h', 2); ?>
              </h3>
              <label class="input input_num input_title-right technics-select-popup__question-input">
                <span class="input__title input__title_right">л. с.</span>
                <input type="text" class="input__input input__input_num" name="power">
              </label>
              <div class="slider-block sbrt mb">
                <input type="text" class="js-range-slider" value=""/>
              </div>
            </div>

                <div class="technics-select-popup__information-block technics-select-popup__information-block_main">
                    <div class="technics-select-popup__question-image">
                        <div class="qwiz"> <img src="<?php the_field('test_qw2_img', 2); ?>" alt=""></div>

                    </div>
                </div>
                </div>


            <div class="popup__page">

                <div class="popup__page-left">
              <h3 class="text23 mb technics-select-popup__question-header">
                <?php the_field('test_qw3_h', 2); ?>
              </h3>
              <?php $nums = 1; ?>
              <?php if (have_rows('test_qw3_bl', 2)): ?>
                <?php while (have_rows('test_qw3_bl', 2)): ?>
                  <?php
                  the_row();
                  $text = get_sub_field('text');
                  ?>
                  <label class="checkbox technics-select-popup__checkbox">
                    <input type="checkbox" name="work-type" value="<?= $text ?>" class="checkbox__input">
                    <span class="checkbox__checkbox technics-select-popup__checkbox-icon">
                      <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/test/v.png" alt="Иконка выделено" class="checkbox__checkbox-arrow-icon">
                    </span>
                    <span class="checkbox__title technics-select-popup__checkbox-title"><?= $text ?></span>
                  </label>
                  <?php ++$nums; ?>
                <?php endwhile; ?>
              <?php endif; ?>

            </div>
                <div class="technics-select-popup__information-block technics-select-popup__information-block_main">
                    <div class="technics-select-popup__question-image">
                        <div class="qwiz"><img src="<?php the_field('test_qw3_img', 2); ?>" alt="">
                        </div></div>
                </div>

            </div>

            <div class="popup__page">
                <div class="popup__page-left">

              <h3 class="text23 mbs lh technics-select-popup__question-header"><?php the_field('test_qw4_h', 2); ?></h3>
              <div class="text mb"><?php the_field('test_qw4_h2', 2); ?></div>
              <div class="te-img technics-select-popup__todo-image">
                <img src="<?php the_field('test_qw4_list', 2); ?>" alt="">
              </div>
              <label class="input input_num technics-select-popup__phone-input">
                <span class="input__title">Ваш контактный номер:</span>
                <input type="tel" class="input__input" name="phone">
              </label>
              <input type="hidden" name="gift" value="Тест"/>
              <input type="hidden" name="title" value="Подобрать технику"/>
              <input type="hidden" name="formname" value="test"/>
                </div>

                <div class="technics-select-popup__information-block technics-select-popup__information-block_result">
                    <div class="technics-select-popup__questions-result-wrapper">
                        <div class="text24 mbm">Ваши ответы:</div>
                        <div class="row-vcenter main__item mbm">
                            <div class="main__y-ico col-center mr">
                                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/main/ar-ico.png" alt="Стрелка">
                            </div>
                            <div class="text fw7 lhm">
                                <span id="question-result-1">0</span>
                                <span class="fw4">соток</span>
                            </div>
                        </div>
                        <div class="row-vcenter main__item mbm">
                            <div class="main__y-ico col-center mr">
                                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/main/ar-ico.png" alt="Стрелка">
                            </div>
                            <div class="text fw7 lhm">
                                <span id="question-result-2">0</span>
                                <span class="fw4">л. с.</span>
                            </div>
                        </div>
                        <div class="row-vcenter main__item mbm">
                            <div class="main__y-ico col-center mr">
                                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/main/ar-ico.png" alt="Стрелка">
                            </div>
                            <div class="text fw7 ">
                                <span class="fw5 tsm12" id="question-result-3"></span>
                            </div>
                        </div>
                    </div>


                    <div class="test-item-right2-bot">
                        <!-- <div class="test-item-right2-item mb">


                            <div class="test-item-right2-text mr">
                                <div class="text21">Ваш подарок:</div>
                                <div class="t-min2 fwb">
                                    <?php the_field('test_qw4_gift', 2);  ?>
                                </div>
                            </div>
                            <img src="<?=get_stylesheet_directory_uri()?>/assets/img/test/gg.svg" alt="Иконка подарка" class="test-item-right2-img">
                        </div>-->
                        <img src="<?php the_field('test_qw4_img', 2);  ?>" alt="">
                    </div>
                </div>



            </div>
              <div class="technics-select-popup__buttons">
                  <button class="button button_regular button_font-size-vw technics-select-popup__button technics-select-popup__button_prev">Назад</button>
                  <button class="button button_accent button_font-size-vw technics-select-popup__button technics-select-popup__button_next" disabled>Далее</button>
                  <div class="cup technics-select-popup__click-information">
                      <img src="<?=get_stylesheet_directory_uri();?>/assets/img/test/cr.svg" alt="" class="mr cup-img">
                      <div class="next_question">
                          Нажмите на кнопку, чтобы перейти к следующему вопросу
                      </div>
                  </div>
              </div>
          </div>





        </div>
      </div>




    </form>
  </div>
</div>