<div class="header">
			<div class="header__cont v1">
				<div class="logo">
					<div class="logo__block">
						<a href="https://kerland.ru/" class="logo__img">
							<img src="<?php the_field('main-logo-2', 2); ?>" alt="">
						</a>
					</div>					
				</div>
				
				

				<div class="nav__wrap">

					<div class="close close-nav"></div>

					
					<?php wp_nav_menu( array(
				'theme_location'  => 'top',
				'container'       => null,
				'menu_class'      => 'nav tsm13',
				
			) ); ?>
				</div>

                <a href="/popup/download-catalog" data-download-catalog-popup class="">
				<button class="btn b-yel header__btn " >
					<span class="tsm13 black fw5">Оптовым покупателям</span>
				</button>
                </a>

<!--				<div class="nav-search__zoom nav-search__zoom-ico col-center" style="display: none">-->
<!--					<img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/img/main/lupa.png" alt="">-->
<!--				</div>	-->
				

				<div class="burger__wrap-block" style="display: none">
					<div class="burger__wrap red">
						<div class="burger">
							<span></span>
						</div>
					</div>
				</div>

			</div>
			<div class="header__cont v2">

				<div class="phone-block__text text-md header__timetable fw4 flexboxheader flextext"><?php the_field('main-timetable', 2); ?></div>

                <div class="flexboxheader6">
                    <?php get_search_form(); ?>
                </div>

                <div class="phone-block row-vcenter flexboxheader1">
                    <div class="phone-block__text sizetel">
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

                <div class="phone-block row-vcenter flexboxheader2">
                    <div class="phone-block__text sizetel2">
                        Опт СНГ:
                    </div>
                    <div class="phone-block row-vcenter flexleft ">
                        <a href="tel:+375336695317" class="phone-block__text black text-md link-hover fw6 mrm">+375 33 669-53-17</a>

                        <a class="phone-block__ico col-center mrm" href="viber://chat?number=%2B375336695317">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/viber_14147.png" alt="">
                        </a>

                        <a class="phone-block__ico col-center mrm" href="https://wa.me/375336695317">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/whatsapp_logo_icon_147205.png" alt="">
                        </a>

                        <a class="phone-block__ico col-center mrm" href="https://t.me/+375336695317">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/telegram_logo_icon_168692.png" alt="">
                        </a>
                    </div>

                    <div class="phone-block row-vcenter flexleft2">
                        <a href="malito:kerland2018@mail.ru" class="phone-block__text black text-md link-hover fw6">kerland2018@mail.ru</a>
                    </div>

                </div>

                <div class="phone-block row-vcenter flexboxheader3">
                    <div class="phone-block__text sizetel2">
                        EU Wholesale:
                    </div>
                    <div class="phone-block row-vcenter flexleft">
                        <a href="tel:+48883726594" class="phone-block__text black text-md link-hover fw6 mrm">+4 888 372-65-94</a>

                        <a class="phone-block__ico col-center mrm" href="viber://chat?number=%2B48883726594">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/viber_14147.png" alt="">
                        </a>

                        <a class="phone-block__ico col-center mrm" href="https://wa.me/48883726594">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/whatsapp_logo_icon_147205.png" alt="">
                        </a>

                        <a class="phone-block__ico col-center mrm" href="https://t.me/+48883726594">
                            <img src="https://kerland.ru/wp-content/uploads/2022/04/telegram_logo_icon_168692.png" alt="">
                        </a>



                    </div>

                    <div class="phone-block row-vcenter flexleft2">
                        <a href="malito:kerland.belarus@gmail.com" class="phone-block__text black text-md link-hover fw6">kerland.belarus@gmail.com</a>
                    </div>

                </div>

                </div>
			</div>
	