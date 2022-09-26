<div class="decide psr">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big decide-cont fix-title psr v1">
			<div class="decide-left">


				<div class="title rel fw4 mb tal"> <?php the_field('decide-header', 2); ?>
					<div class="fl-dot"></div>
				</div>

				<div class="text24 msm">
					<?php the_field('decide-text', 2); ?>
				</div>

				<div class="decide-left__item mb">
					<div class="ansver">
						<div class="kr-text t2">
							<div class="kr-text__cir mrm"></div>
                            <div class="tsm12">
                                <div class="fw4 lh2">Звоните ежедневно </div>
                                <div>с 9:00 до 18:00</div>
                            </div>
						</div>
					</div>

					<div class="ansver-tel">

                        <div class="phone-block row-vcenter flexboxheader1">
                            <div class="phone-block__text sizetel">
                                Розничные продажи:
                            </div>
                            <div class="phone-block row-vcenter flexleft">
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

                        <div class="phone-block row-vcenter flexboxheader2 mrg-top">
                            <div class="phone-block__text sizetel2">
                                Опт СНГ:
                            </div>
                            <div class="phone-block row-vcenter flexleftEUSNG">
                                <a href="tel:+375336695317" class="phone-block__text black text-md link-hover fw6 mrm">+375 33 669-53-17</a>
                                <a class="phone-block__ico col-center mrm" href="viber://chat?number=%2B375336695317">
                                    <img src="https://kerland.ru/wp-content/uploads/2022/04/viber_14147.png" alt="">
                                </a>

                                <a class="phone-block__ico col-center mrm " href="https://wa.me/375336695317">
                                    <img src="https://kerland.ru/wp-content/uploads/2022/04/whatsapp_logo_icon_147205.png" alt="">
                                </a>

                                <a class="phone-block__ico col-center mrm" href="https://t.me/+375336695317">
                                    <img src="https://kerland.ru/wp-content/uploads/2022/04/telegram_logo_icon_168692.png" alt="">
                                </a>
                            </div>

                        </div>

                        <div class="phone-block row-vcenter flexboxheader3 mrg-top">
                            <div class="phone-block__text sizetel2">
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

                                <a class="phone-block__ico col-center mrm" href="https://t.me/+48883726594">
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
<!--				<div class="dline msm"></div>-->

<!--				<div class="decide-left__item ">-->
<!--					<div class=" mr">-->
<!--						<div class="kr-text t2">-->
<!--							<div class="kr-text__cir mrm"></div>-->
<!--							<div class="tsm12">-->
<!--								--><?php //the_field('decide-qw', 2); ?>
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!---->
<!--					<div class="social">-->
<!--						--><?php //
//							if( have_rows('phones-bl-3', 2) ):  while( have_rows('phones-bl-3', 2) ): the_row();
//
//								// vars
//								$img = get_sub_field('img');
//								$link = get_sub_field('link');
//
//							?>
<!---->
<!--							<a href="--><?php //echo $link; ?><!--" class="social-item mrs">-->
<!--								<img src="--><?php //echo $img; ?><!--" alt="">-->
<!--							</a>-->
<!--						--><?php //endwhile; ?>
<!--						--><?php //endif; ?>
<!--					</div>-->
<!--				</div>-->
			</div>

			<div class="decide-right">
				<div class="decide-right-bg">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rassrochka/cir.svg" alt="" class="decide-right-cir">
				</div>
				
				<h3 class="text24 msm">
					<?php the_field('decide-form-header', 2); ?>
				</h3>

				<img src="<?php the_field('decide-form-ava', 2); ?>" alt="" class="decide-right-wm">
				<div class="decide-right__block">
					<ul class="decide-right-ul tsm13 ">
						<?php 
							if( have_rows('decide-form-block', 2) ):  while( have_rows('decide-form-block', 2) ): the_row(); 

								$text = get_sub_field('text');

							?>
						<li class="row-vcenter mbm">
							<div class="fl-dot-gl2 mrm"></div>
							<span class="fw7 lhm">
								<?php echo $text; ?>
							</span>
						</li>
					<?php endwhile; ?>
					<?php endif; ?>
						

						
					</ul>

					<form data-embed-form data-yandex-key="zvonok" data-google-key="zvonok" action="#" class="form decide-right-form">
						<input type="hidden" name="title" value='Заказать звонок'>
<!--               	<input type="hidden" name="formname" value='catalog'> -->
            <div class="form__row">
              <label class="input">
                <span class="input__title input__title_center">Введите номер Вашего телефона:*</span>
                <input type="tel" class="input__input" name="phone">
              </label>
            </div>
						<button class="btn max mbm">
							<span class="btn-blick"></span>
							<span class="tsm13 black fw4">Заказать звонок</span>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>