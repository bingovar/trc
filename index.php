<?php
/*
Template Name: Главная
*/
?>
<?php 
	include 'blocks/head.php';
 ?>
<body>

<div style="background: url(<?php the_field('main_bg', 2); ?>) no-repeat; background-size: 100%;background-position-y: 81%;" class="main main-f-med" id="main">
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

		<div class="container-big main__cont">

			<div class="main__block">
				<div class="main__left">


                    <div class="row-vcenter main__item bannertop">
                        <div class="textbig fw6 white">
                            ЕВРОПЕЙСКАЯ ТЕХНИКА<br> по белорусской цене
                        </div>
                    </div>

					<?php 
						if( have_rows('main_items', 2) ):  while( have_rows('main_items', 2) ): the_row(); 

							// vars
							$text = get_sub_field('text');

						?>

						<div class="row-vcenter main__item mbbanner">
                            <div class="fl-dot-gl mrm"></div>
							<div class="text fw7 lhm white">
								<?php echo $text; ?>
							</div>
						</div>
					
					<?php endwhile; ?>
					<?php endif; ?>
                    
                        <button class="btn b-yel header__btn test1-js buttentop" data-technics-select-link>
                            <span class="tsm13 black fw5">Подобрать технику</span>
				</div>
			</div>
			<div class="main-bg-med col-center" style="display: none">
				<img src="<?php the_field('main_bg_sm_mod', 2); ?>" alt="">
			</div>
		</div>
	</div>


	<!-- opt -->
	<?php 
		include 'blocks/opt.php';
	 ?>


	<!-- 1 -->
	<div class="catalog pdbot">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big">
			<div class="title rel fw4 msm tal">
				<?php the_field('title_14'); ?>
				<div class="fl-dot"></div>
			</div>
		</div>
	</div>

	<!-- 2 -->
	<?php  $dd = 1;
	if( have_rows('blocks', 2) ):  while( have_rows('blocks', 2) ): the_row(); 

	    // vars
	    $title = get_sub_field('title');
	    $link = get_sub_field('link');
	    $id = get_sub_field('id');

	?>
	<div class="catalog">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="catalog__block container-big psr">
						<?php
//         $temp = $wp_query;  // re-sets query
//         $wp_query = null;   // re-sets query

        $numberId =  $id;
        $numberIdArr = explode(", ", $numberId);
//        	echo implode(", ", $numberIdArr);
			$args = array('post_type' => 'page', 'post__in'  => $numberIdArr,'posts_per_page' => 20, );
// 		$wp_query = new WP_Query( [
// 			'post_type' => 'page',
// 			'post__in'  => [ 48, 49, 50 ],
// 		] );
        $wp_query = new WP_Query();
        $wp_query->query( $args );
        while ($wp_query->have_posts()) : $wp_query->the_post();

            ?>
					<div class="catalog__item">
						<div class="catalog__top rel"> 
						    <a href="<?php the_permalink() ?>" class="perm-l">
						        <img class="cat-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
						    </a>
						    
							
							<div class="catalog__opt col-center">
								<?php if( get_field('lb_2') ): ?>
								<div class="catalog__opt-item mbs col-center red tac" title="Хит">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico1.png" alt="">
								</div>
								<?php endif; ?>
								<?php if( get_field('lb_3') ): ?>
								<div class="catalog__opt-item mbs col-center green tac" title="Новинка">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico2.png" alt="">
								</div>
								<?php endif; ?>
								<?php if( get_field('lb_1') ): ?>
								<div class="catalog__opt-item mbs col-center blue tac" title="Лучшая цена">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico3.png" alt="">
								</div>
								<?php endif; ?>

							</div>
							<?php if( get_field('vid_lb') ): ?>
							<a href="<?php the_field('vid_lb_link'); ?>" class="catalog__video fancy-class video row-vcenter ">
								<div class="catalog__vid-img rel col-center mrm"></div>
								<div class="text catalog__video-text black fw4">Видеообзор</div>
							</a>
							<?php endif; ?>
						</div>
						<div class="catalog-text">
							<div class="catalog-text__center">
								<a href="<?php the_permalink() ?>" class="catalog-text__header link-hover black mr">
<!--									<div class="gray2 mbs small-text">--><?php //the_field('types'); ?><!--</div>-->
									<div class="text24 fw7"><?php the_title(); ?></div>
								</a>
								<?php if( get_field('gifts') ): ?>
								<div class="catalog-text__gift col-center tac tsm13">
									<div class="catalog-text__gift-img mbs rel col-center">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/gift.svg" alt="">
										<div class="catalog-text__gift-val col-center tac small-text fw8">
											<?php the_field('col'); ?>
										</div>
									</div>
									<?php the_field('col_t'); ?>
								</div>
								<?php endif; ?>
							</div>
							<!-- <?php 
								$ancestors = get_ancestors( get_the_id(), 'page' );
								$top_cat_id = array_pop( $ancestors );
							 ?>
							<?php if( get_field('price_global', $top_cat_id) ): ?>
							<?php if( get_field('prc') ): ?>
							<div class="tsm13">Цена:</div>
							<div class="price-mod mbm">

								<?php 
									$money = get_field('usd', $top_cat_id) * get_field('prc_num');
									$moneyOld = get_field('usd', $top_cat_id) * get_field('prc_num_2'); ?>
								<div class="price-mod-left t-min2 fwb mr">
									<?php echo $money; ?> руб.
								</div>

								<div class="price-mod-rigt text21 gray tdt">
									<?php echo $moneyOld; ?> руб.
								</div>
							</div>
							<?php endif; ?>
							<?php endif; ?> -->

						</div>
						<div class="catalog__btns">
							<a href="<?php the_permalink() ?>" class="btn catalog__btn b-gray">
								<span class="btn-blick"></span>
								<span class="tsm13 fw5">Подробнее</span>
							</a>
							<a href="/popup/calculate-price?product_name=<?=urlencode(get_the_title())?>" data-popup-link class="btn catalog__btn catalog__btn one-js-2">
								<span class="btn-blick"></span>
								<span class="tsm13 black fw5">Рассчитать цену</span>
							</a>
						</div>
					</div>
					<!-- /div> -->
			<?php endwhile; ?>		
		</div>




	</div>
		<?php ++$dd; endwhile; ?>
	<?php endif; ?>

<div class="catalog-button">
    <button class="btn inp-cmgl">
        <a href="https://kerland.ru/navesnoe-oborudovanie/" class="small-text black fw6">Смотреть все модели</a>
    </button>
</div>



    <?php
		include 'blocks/vid.php';
	 ?>
	

	<?php 
		include 'blocks/garant.php';
	 ?>
	

	<!-- <div class="mlg2"></div> -->
	<!-- decide -->
	<?php 
		include 'blocks/decide.php';
	 ?>
	
	

	

	<!-- ct2 -->


	 <?php 
		include 'blocks/seo_style.php';
	 ?>
	 <?php 
		include 'blocks/seob.php';
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