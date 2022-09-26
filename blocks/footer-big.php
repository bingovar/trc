<div class="footer-big">
    <div class="container-big footer-big-cont fix-title ">
        <div class="footer-big-left">
            <div class="footer-big-left-item">
                <div href="#" class="logo-f mbm"><img alt="" src="<?php the_field('footer-logo2', 2); ?>" ></div>
                <div class="tsm12 msm">
                    <?php the_field('footer-logo-text2', 2); ?>
                </div>

                <!-- 				<ul class="footer-list tsm13">
                                    <li><a href="">Новости</a></li>
                                    <li><a href="">Отзывы / Видео</a></li>
                                    <li><a href="">Оптовикам</a></li>
                                    <li><a href="">Контакты</a></li>
                                    <li><a href="">О нас</a></li>
                                </ul> -->
                <?php wp_nav_menu( array(
                    'theme_location'  => 'top-mob',
                    'container'       => null,
                    'menu_class'      => 'footer-list tsm13',

                ) ); ?>
            </div>



        </div>

        <div class="footer-big-center">

        <div class="footer-big-center-menu">
        <div class="footer-big-ceter-item mb">
                <h3 class="mb text-md">Каталог</h3>


                <?php wp_nav_menu( array(
                    'theme_location'  => 'cat-mob',
                    'container'       => null,
                    'menu_class'      => 'footer-list tsm13',

                ) ); ?>
            </div>
        <div class="footer-big-center-item mb">

            <h3 class="mb text-md"> </h3>


            <?php wp_nav_menu( array(
                'theme_location'  => 'cat-mob2',
                'container'       => null,
                'menu_class'      => 'footer-list tsm13',

            ) ); ?>

        </div>
        </div>

             <div class="f-social">
                <h3 class="mr text-md">Мы в социальных сетях:</h3>
                <div class="social">
                    <?php
                    if( have_rows('phones-bl-3', 2) ):  while( have_rows('phones-bl-3', 2) ): the_row();

                        // vars
                        $img = get_sub_field('img');
                        $link = get_sub_field('link');

                        ?>

                        <a href="<?php echo $link; ?>" class="social-item mrs">
                            <img src="<?php echo $img; ?>" alt="">
                        </a>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>



        <div class="footer-big-right">
            <h3 class="mb text-md contactf">Наши контакты:</h3>
            <!-- <div class="kr-text">
                <div class="kr-text__cir mrm"></div>
                <div class="small-text">
                    Ежедневно с 9:00 до 18:00
                </div>
            </div>-->

            <div class="ansver-tel">

                <div class="phone-block row-vcenter flexboxheader1 mrg-top2">
                    <div class=" sizetel">
                        Розничные продажи:
                    </div>
                    <div class="phone-block row-vcenter flexleft2">
                        <div class="phone-block__ico col-center mrm">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/Belarus_29731.png" alt="">
                        </div>
                        <a href="tel:+375298888500" class="phone-block__text black text-md link-hover fw6">+375 29 888-85-00</a>
                    </div>

                    <div class="phone-block row-vcenter flexleft2">
                        <div class="phone-block__ico col-center mrm">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/Russia_29758.png" alt="">
                        </div>
                        <a href="tel:+74992887567" class="phone-block__text black text-md link-hover fw6">+7 499 288-75-67</a>
                    </div>
                </div>

                <div class="phone-block row-vcenter flexboxheader2 mrg-top2">
                    <div class=" sizetel2">
                        Опт СНГ:
                    </div>
                    <div class="phone-block row-vcenter flexleftEUSNG ">
                        <a href="tel:+375336695317" class="phone-block__text black text-md link-hover fw6 mrm">+375 33 669-53-17</a>

                        <a class="phone-block__ico col-center mrm" href="viber://chat?number=%2B375336695317">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/viber_14147.png" alt="">
                        </a>

                        <a class="phone-block__ico col-center mrm " href="https://wa.me/375336695317">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/whatsapp_logo_icon_147205.png" alt="">
                        </a>

                        <a class="phone-block__ico col-center mrm" href="https://telegram.me/mikola_322">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/telegram_logo_icon_168692.png" alt="">
                        </a>
                    </div>

                </div>

                <div class="phone-block row-vcenter flexboxheader3 mrg-top2 mrg-bot">
                    <div class=" sizetel2">
                        EU Wholesale:
                    </div>
                    <div class="phone-block row-vcenter flexleftEUSNG">
                        <a href="tel:+48883726594" class="phone-block__text black text-md link-hover fw6 mrm">+4 888 372-65-94</a>

                    <a class="phone-block__ico col-center mrm" href="viber://chat?number=%2B48883726594">
                        <img src="https://kerland.ru/wp-content/uploads/2022/04/viber_14147.png" alt="">
                    </a>

                    <a class="phone-block__ico col-center mrm" href="https://wa.me/48883726594">
                        <img src="https://kerland.ru/wp-content/uploads/2022/04/whatsapp_logo_icon_147205.png" alt="">
                    </a>

                    <a class="phone-block__ico col-center mrm" href="https://telegram.me/mikola_322">
                        <img src="https://kerland.ru/wp-content/uploads/2022/04/telegram_logo_icon_168692.png" alt="">
                    </a>
                    </div>

                </div>




                <!--<?php
                if( have_rows('phones-bl-2', 2) ):  while( have_rows('phones-bl-2', 2) ): the_row();

                    // vars
                    $img = get_sub_field('img');
                    $text = get_sub_field('text');
                    $link = get_sub_field('link');

                    ?>
							<div class="phone-block row-vcenter mbs">
								<div class="phone-block__ico col-center mrm">
									<img src="<?php echo $img; ?>" alt="">
								</div>
								<a href="tel:<?php echo $link; ?>" class="phone-block__text black text-md link-hover fw7"><?php echo $text; ?></a>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>		-->

            </div>




        </div>
    </div>
    <div class="msm"></div>
    <div class="container-big fct fix-title fw3">
        <div class="tsm10">
            © kerland.ru 2015-2022
        </div>
        <div class="tsm10 tac">
            Информация, размещённая на сайте, носит ознакомительный характер. <br>
            Уточняйте актуальные характеристики товаров и условия их покупки у наших специалистов.
        </div>
        <div class="tsm10 fct-end">

                <a href="https://kerland.ru/popup/policy/" data-popup-link class="tsm10 btn-politics-js link mbm">Политика обработки персональных данных</a>


        </div>
    </div>
</div>



<div class="to_top"></div>