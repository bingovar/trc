<?php
/*
Template Name: Рассрочка
*/
?>
<?php 
	include 'blocks/head.php';
 ?>
<body>

	<div class="main main_no-br" id="main">
		<?php 
			include 'blocks/header.php';
		 ?>

	</div>
	<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
	<div class="container-big psr rassrochka-block">

		<?php
				/* breadcrumb Yoast */
				if ( function_exists( 'yoast_breadcrumb' ) ) :
				   yoast_breadcrumb( '<div id="breadcrumbs" class="bread small-text fw4 msm">', '</div>' );
				endif;
				?>
	</div>

	<div class="container-big rassrochka-advas psr">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<?php $num = 1; $label = '';
            if( have_rows('ras_bl_353', 353) ):  while( have_rows('ras_bl_353', 353) ): the_row(); 

                // vars
                $img = get_sub_field('img');
                $text = get_sub_field('text');
				$link = get_sub_field('link');
		
			if($num == 1){
				$label = 'active';
				
			} else{
				$label = '';
			}

            ?>
			
		
			<a href="<?php echo $link; ?>" class="rassrochka-advas__item link-scroll tac black <?php echo $label; ?>">
				<div class="rassrochka-advas__item-img ">
					<img src="<?php echo $img; ?>" alt="">
				</div>
				<span class="text tac-rassrohka">
					<?php echo $text; ?>
				</span>
			</a>
		<?php ++$num; endwhile; ?>
		<?php endif; ?>
		

	</div>

	<div class="section why-buy">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big cont-mod psr">
			<div class="title rel fw4 mlg tal"><?php the_field('ras_header_353', 353); ?>
				<div class="fl-dot"></div>
			</div>
		</div>

		<div class="container-big fix-title psr">
			<div class="why-buy-block">
				<?php 
					if( have_rows('ras_bl2_353', 353) ):  while( have_rows('ras_bl2_353', 353) ): the_row(); 

						// vars
						$img = get_sub_field('img');
						$text = get_sub_field('text');
						$header = get_sub_field('header');

					?>
					<div class="why-buy__item mlg">
						<div class="why-buy__item-head mbm">
							<div class="why-buy__item-img mr">
								<img src="<?php echo $img; ?>" alt="">
							</div>

							<h3 class="tsm13">
								<?php echo $header; ?>
							</h3>
						</div>

						<p class="tsm12 lhm">
							<?php echo $text; ?>
						</p>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- credit -->
	<div class="credit psr" id="credit">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big cont-mod psr">
			<div class="title rel fw4 mlg tal"><?php the_field('ras_header2_353', 353); ?>
				<div class="fl-dot"></div>
			</div>
		</div>

		<div class="container-big fix-title psr pmb">
			<!--<div class="credit-row v1 msm">
				<div class="credit-img" style="background: url(<?php the_field('ras_img_353', 353); ?>) no-repeat center; background-size: cover;">
					<div class="credit-img-block tac">
						<div class="small-text">
							<?php the_field('ras_img-text_353', 353); ?>
						</div>
					</div>
				</div>

				<div class="credit-vzn">
					<?php 
						if( have_rows('ras_bl3_353', 353) ):  while( have_rows('ras_bl3_353', 353) ): the_row(); 

							// vars
							$img = get_sub_field('img');
							$text = get_sub_field('text');

						?>
						<div class="credit-vzn-item tac">
							<div class="credit-vzn-item-img mbm">
								<img src="<?php echo $img; ?>" alt="">
							</div>
							<h4 class="t-ss fwb ttu"><?php echo $text; ?></h4>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
					
					
				</div>
			</div>-->

			<div class="credit-row ">
				<?php $rr = 1;
					if( have_rows('credit_bl_353', 353) ):  while( have_rows('credit_bl_353', 353) ): the_row(); 

						// vars
						$btn_text = get_sub_field('btn-text');
						$header = get_sub_field('header');
					?>
					<div class="credit-data">
						<h3 class="text21 tac mb"><?php echo $header; ?></h3>
						<ul class="credit-data-list small-text mbm">
							<?php 
								if( have_rows('credit_bl-int_353', 353) ):  while( have_rows('credit_bl-int_353', 353) ): the_row(); 

									// vars
									$text = get_sub_field('text');

								?>
								<li class="row-vcenter credit-data-list__item mb">
									<span class="main__y-ico col-center mr">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/main/ar-ico.png" alt="">
									</span>
									<span class="fw7 lhm">
										<?php echo $text; ?>
									</span>
								</li>
							<?php endwhile; ?>
							<?php endif; ?>
							
						</ul>

						<a href="<?=$rr == 1 ? "/popup/installment-kredit" : "/popup/kredit"?>" class="btn credit-btn tac min" data-popup-link>
							<span class="btn-blick"></span>
							<span class="tsm13 black fw5"><?php echo $btn_text; ?></span>
						</a>
					</div>	
						
				<?php ++$rr; endwhile; ?>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
    <!--
    <div class="section delivery" id="delivery">
         <div class="lines">
             <div class="lines__item"></div>
             <div class="lines__item"></div>
             <div class="lines__item"></div>
             <div class="lines__item"></div>
             <div class="lines__item"></div>
         </div>
        	<div class="container-big cont-mod psr">
                 <div class="title rel fw4 mlg tal">
                     <div class="fl-dot"></div>
                 </div>
    </div>
   -->
    <!-- оплата   -->

    <div class="container-big cont-mod psr" id="oplata">
        <div class="title rel fw4 mlg tal"><?php the_field('del_header_1', 353); ?>
            <div class="fl-dot"></div>
        </div>
        <div class="delivery-row">
            <div class="delivery-text">
                <p class="tsm13">
                    <?php the_field('del_text_1', 353); ?>
                </p>
            </div>
            <div class="delivery-img">
                <img src="<?php the_field('del_img_1', 353); ?>" alt="">
            </div>
        </div>
    </div>

    </div>
        <!-- доставка до порога -->

    <div class="container-big cont-mod psr" id="dostavka">
        <div class="title rel fw4 mlg tal"><?php the_field('del_header_2', 353); ?>
            <div class="fl-dot"></div>
        </div>

        <div class="delivery-row t2">
            <div class="delivery-text">
                <p class="tsm13">
                    <?php the_field('del_text_2', 353); ?>
                </p>
            </div>
            <div class="delivery-dostavka">
                <img src="<?php the_field('del_img_2', 353); ?>" alt="">
            </div>
        </div>

    </div>
    </div>

	<!-- service -->
	<div class="section service">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>

		<div class="container-big cont-mod psr" id="service">
			<div class="title rel fw4 mlg tal"><?php the_field('ras_header3_353', 353); ?>
				<div class="fl-dot"></div>
			</div>
		</div>

		<div class="container-big service-cont fix-title psr">
			<div class="service-item mb">
                <div class="service-item-header">
                    <h3 class="text21 mb ttu">
                        <?php the_field('serv_header_1', 353); ?>
                    </h3>
                </div>
                <div class="service-item_block">
				<div class="service-item__text2">
					<p class="tsm13">
						<?php the_field('serv_text_1', 353); ?>
					</p>
				</div>
                <div class="service-item__text2">
                    <p class="tsm13">
                        <?php the_field('serv_text_2', 353); ?>
                    </p>
                </div>
                </div>
			</div>
			<div class="service-item mb">
				<div class="service-item__img">
					<img src="<?php the_field('serv_img_2', 353); ?>" alt="">
				</div>
			</div>


            <!-- Приедем влюбую точку страны -->
			<div class="service-item mb">
				<div class="service-item__text">
					<h3 class="text21 mb ttu">
						<?php the_field('serv_header_3', 353); ?>
					</h3>
					<h4 class="text mbm">
						<?php the_field('serv_subheader_3', 353); ?>
					</h4>
					<p class="tsm13">
						<?php the_field('serv_text_3', 353); ?>
					</p>
				</div>
				<div class="service-item__img">
					<img src="<?php the_field('serv_img_3', 353); ?>" alt="">
				</div>
			</div>
			<div class="service-item mb">
				<div class="service-item__text">
					<h3 class="text21 mb ttu">
						<?php the_field('serv_header_4', 353); ?>
					</h3>
                    <p class="tsm13">
                        <?php the_field('serv_text_4', 353); ?>
                    </p>
                </div>
                <div class="service-item__img">
                    <img src="<?php the_field('serv_img_4', 353); ?>" alt="">
                </div>
                    <!-- 	<div class="kr-text mbm">
						<div class="kr-text__cir mrm"></div>
						<div class="small-text">
							Ежедневно с 9:00 до 18:00
						</div>
					</div> -->
            </div>
            <!-- Бесплатная телефонная консультация -->
            <div class="service-item mb">
                <div class="service-item__text">
                    <h3 class="text21 mb ttu">
                        <?php the_field('serv_header_5', 353); ?>
                    </h3>
                    <h4 class="text mbm">
                        <?php the_field('serv_subheader_5', 353); ?>
                    </h4>
                    <p class="tsm13">
                        <?php the_field('serv_text_5', 353); ?>
                    </p>
                </div>
                <div class="service-item__img">
                    <img src="<?php the_field('serv_img_5', 353); ?>" alt="">
                </div>
            </div>
            <div class="service-item mb">
                <div class="service-item__text">
                    <!--  <h3 class="text21 mb ttu">
                        <?php the_field('serv_header_6', 353); ?>
                    </h3>?-->
                    <!--<h4 class="text mbm">
                        <?php the_field('serv_subheader_6', 353); ?>
                    </h4> -->
                    <p class="tsm13">
                        <?php the_field('serv_text_6', 353); ?>
                    </p>
                </div>
                <div class="service-item__img">
                    <img src="<?php the_field('serv_img_6', 353); ?>" alt="">
                </div>
            </div>

          <?php
						if( have_rows('phones-bl-2', 2) ):  while( have_rows('phones-bl-2', 2) ): the_row();

							// vars
							$img = get_sub_field('img');
							$text = get_sub_field('text');
							$link = get_sub_field('link');

						?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>

    <!-- запчатси -->
    <div class="container-big cont-mod psr" id="zapchasti">
        <div class="title rel fw4 mlg tal"><?php the_field('zap_header-sect', 353); ?>
            <div class="fl-dot"></div>
        </div>
    </div>


    <div class="container-big fix-title psr">
        <div class="delivery2-row">
            <div class="delivery-text">
                <h3 class="t-ss ttu mb">
                    <?php the_field('zap_header_1', 353); ?>
                </h3>
                <h4 class="text mbm">
                    <?php the_field('zap_subheader_1', 353); ?>
                </h4>
                <p class="tsm13">
                    <?php the_field('zap_text_2', 353); ?>
                </p>
            </div>
            <div class="delivery-img">
                <img src="<?php the_field('zap_img_2', 353); ?>" alt="">
            </div>
        </div>
    </div>


    <!-- Остались вопросы?-->

	<?php
		include 'blocks/decide.php';
	 ?>

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