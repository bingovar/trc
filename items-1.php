<?php
/*
Template Name: Запчасть
*/
?>
<?php 
	include 'blocks/head.php';
 ?>
<body>

	<div  class="main page-mb" id="main">
		<?php 
			include 'blocks/header.php';
		 ?>
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
	</div>
	
	<!-- <div class="main-pages-wrap"> -->
		<div class="container-big main-pages psr">
			<div class="lines">
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
			</div>
			<div class="main-pages-left psr" style="width: 100%;">
				<?php
				/* breadcrumb Yoast */
				if ( function_exists( 'yoast_breadcrumb' ) ) :
				   yoast_breadcrumb( '<div id="breadcrumbs" class="bread small-text fw4 msm">', '</div>' );
				endif;
				?>
		
				
			</div>
		
		</div>
	<!-- </div> -->

	<div class="it psr">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big it-cont psr">
			<div class="it-left">
				<div class="container-big psr">
					<div class="t-min rel fw4 msm tal"><span class="fwb"><?php the_title(); ?> </span>
						<div class="fl-dot"></div>
					</div>
				</div>
				<div class="it-slider">
					<?php  $ff = 1;
			            if( have_rows('img_item') ):  while( have_rows('img_item') ): the_row(); 

			                // vars
			                $img = get_sub_field('img');
			                if($ff == 1):
			            ?>
					<a href="<?php echo $img; ?>" data-fancybox='a1' class="it-slider-item mbs">
							<?php endif; ++$ff; endwhile; ?>
						<?php endif; ?>
							<?php  $ff = 1;
			            if( have_rows('img_item') ):  while( have_rows('img_item') ): the_row(); 

			                // vars
			                $img = get_sub_field('img');
			                if($ff == 1):
			            ?>
							<img src="<?php echo $img; ?>" alt="">
							<?php endif; ++$ff; endwhile; ?>
						<?php endif; ?>

						<div class="catalog__opt col-center">
								
								<?php if( get_field('lb_1') ): ?>
								<div class="catalog__opt-item mbs col-center blue tac" title="Лучшая цена">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico3.png" alt="">
								</div>
								<?php endif; ?>

							</div>	
					</a>

					<?php  $tt = 1 ;
		            if( have_rows('img_item') ):  while( have_rows('img_item') ): the_row(); 

		                // vars
		                $img = get_sub_field('img');
		                if($tt  > 4){$gg = 'display: none;';}else{$gg = '';}
		            ?>
					<a href="<?php echo $img; ?>" data-fancybox='a1' class="it-slider-item v2 mbs" style="<?php echo $gg; ?>">
						<img src="<?php echo $img; ?>" alt="">
					</a>
					<?php if($tt  == 5): ?>
						<a href="<?php echo $img; ?>" data-fancybox='a1' class="ctg-spl catalog-header__plus tac col-center text fwb black"></a>
					<?php endif; ?>
					<?php ++$tt; endwhile; ?>
					<?php endif; ?>
					
				</div>
			</div>

			<div class="it-right">
				<div class="it-right-left">

					<div class="catalog-text__header link-hover black msm">
<!--						<div class="gray2 mbs small-text">--><?php //the_field('types'); ?><!--</div>-->
						<div class="t-ss fw7 title-card-js"><?php the_title(); ?></div>
					</div>
					<div class="catalog__btns msm2">
						<?php 
								$ancestors = get_ancestors( get_the_id(), 'page' );
								$top_cat_id = array_pop( $ancestors );
							 ?>
						<?php if( get_field('price_global', $top_cat_id) ): ?>
							<?php if( get_field('prc') ): ?>
						<div class="btn catalog__btn b-gray c-a">
							<!-- <span class="btn-blick"></span> -->
							<?php 
									$money = get_field('usd', $top_cat_id) * get_field('prc_num');
									$moneyOld = get_field('usd', $top_cat_id) * get_field('prc_num_2'); ?>
							<span class="t-ss fw7 lh08"><?php echo $money; ?> <span class="fw4 text">руб.</span></span>
							
							<?php if( get_field('act_pr') ): ?>
							<div class="text gray tdt prc-tg"><?php echo $moneyOld; ?> руб.</div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
							<?php endif; ?>
						<button data-popup-link="/popup/fast-buy?product_name=<?=urlencode(get_the_title())?>" class="btn catalog__btn one2-js">
							<span class="btn-blick"></span>
							<span class="tsm13 black fw5">Заказать в 1 клик</span>
						</button>
					</div>
					<div class="dline mb"></div>
					<div class="decide-left__item mb">
						<div class="">
							<b class="tsm13 mbm fw7 db">Розничная продажа <br>
							запчастей:</b>
							<div class="kr-text t2">
								<div class="kr-text__cir mrm"></div>
								<div class="tsm12">
									Ежедневно 09:00 - 19:00
								</div>
							</div>
						</div>

						<div class="">
							<div class="phone-block row-vcenter mbs">
								<div class="phone-block__ico col-center mrm">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/main/ico1.png" alt="">
								</div>
								<a href="tel:(29) 765-43-21" class="phone-block__text black text-md link-hover fw7">(29) 765-43-21</a>
							</div>
							<div class="phone-block row-vcenter mbs">
								<div class="phone-block__ico col-center mrm">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/main/ico2.png" alt="">
								</div>
								<a href="tel:(44) 123-45-67" class="phone-block__text black text-md link-hover fw7">(44) 123-45-67</a>
							</div>
						</div>
					</div>
					<div class="dline msm"></div>

					<div class="link-row">
						<a href="/popup/found-cheaper?product_name=<?=urlencode(get_the_title())?>" data-popup-link class="link-a tsm13 fw7 dprice-js">Нашли дешевле? </a>
						<a href="/popup/price-drop?product_name=<?=urlencode(get_the_title())?>" data-popup-link class="link-a dsh tsm13 fw7 down-js">Сообщить о снижении цены</a>
					</div>
				</div>

				<?php if( get_field('act_1') ): ?>
				<div class="it-right-right">

					<div class="it-right-right-text">
						<h4 class="t-min tgc2 mbm">
							<?php the_field('atrxt_1'); ?>
						</h4>

						<div class="text24">
							<?php the_field('atrxt_2'); ?>
						</div>
						<h4 class="title fwb">
							<?php the_field('atrxt_3'); ?>
						</h4>
					</div>
					
					<img src="<?php the_field('img_act'); ?>" alt="">

					<div class="it-right-right-text tac">
						<div class="text tac mb title-act-js">
							<?php the_field('atrxt_4'); ?>
						</div>
<!-- 						act-js -->
						<a href="/popup/gift" data-popup-link class="link-a text fw7 call2-js">Узнать условия</a>
					</div>
				</div>
				<?php endif; ?>
				
				<?php if( get_field('act_3') ): ?>
				<div class="it-right-right">

					<div class="it-right-right-text">
						<h4 class="t-ss tac mb">
							Гарантия <br>
							лучшей цены!
						</h4>
					</div>
					
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pig.png" alt="">

				</div>
				<?php endif; ?>
				
				
				<?php if( get_field('act_2') ): ?>
				<div class="it-right-right t2">
					<h4 class="t-ss tac mb">
						<?php the_field('text_a2'); ?>
					</h4>
					<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/items/af.png" alt=""> -->
					<?php 
			            if( have_rows('gifts') ):  while( have_rows('gifts') ): the_row(); 

			                // vars
			                $img = get_sub_field('img');
			                $text = get_sub_field('text');

			            ?>
					<div class="itr-block mbm">
						<div class="catalog-header__plus tac col-center text fwb black mr"></div>
						<div class="itr-block-left">
							<img src="<?php echo $img; ?>" alt="">
						</div>
					</div>
					<h4 class="text tac mb"><?php echo $text; ?></h4>

					<?php endwhile; ?>
						<?php endif; ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/items/b2.png" alt="" class="it-rfg">
				</div>
				<?php endif; ?>

				<div class="it-right-center">
					<h4 class="text-md">
						Почему <br>
						покупают у нас
					</h4>

					<div class="it-right-slider">
						<?php  $fb = 1;
			            if( have_rows('wht') ):  while( have_rows('wht') ): the_row(); 

			                // vars
			                $img = get_sub_field('img');
			                $title = get_sub_field('title');
			                $hover = get_sub_field('hover');

			            ?>
						<div class="techno-advas__item islit psr" data-text="<?php echo $hover; ?>">
							<div class="techno-advas__item-head mbm">
								<div class="tsm12 gray">
<!-- 									0<?php echo $fb; ?> -->
								</div>
								<div class="techno-advas__item-img">
									<img src="<?php echo $img; ?>" alt="">
								</div>
							</div>
					
							<div class="techno-advas__item-text	">
								<div class="tsm12 rel fw4   tal"> 
									<?php echo $title; ?>
									<div class="fl-dot"></div>
								</div>
								
							</div>
					
						</div>

						<?php ++$fb; endwhile; ?>
						<?php endif; ?>


					</div>
				</div>
			</div>
			

		</div>
	</div>

	<div class="islit-hover tsm10">
		
	</div>


	<!-- opt -->
	<?php 
		include 'blocks/opt.php';
	 ?>
	
	<!-- decide -->
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