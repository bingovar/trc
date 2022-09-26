<?php
/*
Template Name: Поиск по каталогу
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
		<div class="container-big main-pages psr mrg-top-searc">
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
		
				<h1 class="title tac msm">
					Поиск по каталогу
				</h1>

				<div class="form-ser msm">
					<form class="nav-search">
						<input name="s" id="s" value="<?php echo $_GET['s'];?>" placeholder="Что ищем?" class="input search search2 tsm12" type="text">
						<button class="nav-search__zoom col-center">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/main/lupa.png" alt="">
						</button>
					</form>
				</div>
				<?php $kk = 1; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if($kk == 1): ?>
				<div class="t-ss fwb msm tac">

					По Вашему запросу "<?php echo $_GET['s'];?>" нашлось :
				</div>
				<?php endif;?> <?php ++$kk; endwhile;?> <?php endif;?>

				<div class="catalog__block psr page-block">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="catalog__item">
						<div class="catalog__top rel">
							<a href="<?php the_permalink() ?>" class="perm-l">
						        <img class="cat-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
						    </a>
							<div class="catalog__opt col-center">
								<?php if( get_field('lb_1') ): ?>
								<div class="catalog__opt-item mbs col-center red tac" title="Хит">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico1.png" alt="">
								</div>
								<?php endif; ?>
								<?php if( get_field('lb_3') ): ?>
								<div class="catalog__opt-item mbs col-center green tac" title="Новинка">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico2.png" alt="">
								</div>
								<?php endif; ?>
								<?php if( get_field('lb_3') ): ?>
								<div class="catalog__opt-item mbs col-center blue tac" title="Лучшая цена">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico3.png" alt="">
								</div>
								<?php endif; ?>

							</div>
							<?php if( get_field('vid_lb') ): ?>
							<a href="https://www.youtube.com/watch?v=EfTOZAsmUL4" class="catalog__video fancy-class video row-vcenter ">
								<div class="catalog__vid-img rel col-center mrm"></div>
								<div class="text catalog__video-text black fw4">Видеообзор</div>
							</a>
							<?php endif; ?>
						</div>
						<div class="catalog-text">
							<?php if( get_field('nalik') ): ?>
							<?php else: ?>
							<div class="catalog__have mbm row-vcenter">
								<div class="cat-pok no col-center mrm tac">
									
								</div>
								<div class="text fw5">Под заказ</div>
							</div>
							<?php endif; ?>
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
							<?php 
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
							<?php endif; ?>

						</div>
						<div class="catalog__btns">
							<a href="<?php the_permalink() ?>" class="btn catalog__btn b-gray">
								<span class="btn-blick"></span>
								<span class="tsm13 fw5">Подробнее</span>
							</a>
							<a href="/popup/calculate-price?product_name=<?=urlencode(get_the_title())?>" data-popup-link class="btn catalog__btn one-js-2">
								<span class="btn-blick"></span>
								<span class="tsm13 black fw5">Рассчитать цену</span>
							</a>
						</div>
					</div>
					<!-- <?php the_content(''); ?> -->
					<?php endwhile;?> <?php endif;?>
				</div>
			</div>
		
		</div>
	<!-- </div> -->


<?php if (have_posts()) : while (have_posts()) : the_post(); ?><?php endwhile;?><?php else: ?>					
	<div class=" section rezs">
		<div class="container-big tac">
			<div class="text mb">
				Результаты поиска:
			</div>

			<h3 class="t-ss mb tgc2">
				Мы ничего не нашли по запросу "<?php echo $_GET['s'];?>"
			</h3>
			<div class="text">
				Пожалуйста, сформулируйте запрос по-другому
			</div>

		</div>
	</div>
	

	<div class=" section psr ">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big">
			<div class="title-wrapper msm">
				<div class="t-min rel fw4  tal"> <span class="fwb">Чаще всего ищут</span>  
					<div class="fl-dot"></div>
				</div>
			</div>

			<div class="catalog__block psr page-block">

					<?php 



//         $temp = $wp_query;  // re-sets query
//         $wp_query = null;   // re-sets query

        $numberId =  get_field('id_str', 40);
        $numberIdArr = explode(", ", $numberId);
//        	echo implode(", ", $numberIdArr);
			$args = array('post_type' => 'page', 'post__in'  => $numberIdArr, );  
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
								<?php if( get_field('lb_1') ): ?>
								<div class="catalog__opt-item mbs col-center red tac" title="Хит">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico1.png" alt="">
								</div>
								<?php endif; ?>
								<?php if( get_field('lb_3') ): ?>
								<div class="catalog__opt-item mbs col-center green tac" title="Новинка">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico2.png" alt="">
								</div>
								<?php endif; ?>
								<?php if( get_field('lb_3') ): ?>
								<div class="catalog__opt-item mbs col-center blue tac" title="Лучшая цена">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico3.png" alt="">
								</div>
								<?php endif; ?>

							</div>
							<?php if( get_field('vid_lb') ): ?>
							<a href="https://www.youtube.com/watch?v=EfTOZAsmUL4" class="catalog__video fancy-class video row-vcenter ">
								<div class="catalog__vid-img rel col-center mrm"></div>
								<div class="text catalog__video-text black fw4">Видеообзор</div>
							</a>
							<?php endif; ?>
						</div>
						<div class="catalog-text">
							<?php if( get_field('nalik') ): ?>
							<div class="catalog__have mbm row-vcenter">
								<div class="cat-pok ok col-center mrm tac">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/check.svg" alt="">
								</div>
								<div class="text fw5">В наличии</div>
							</div>
							<?php else: ?>
							<div class="catalog__have mbm row-vcenter">
								<div class="cat-pok no col-center mrm tac">
									
								</div>
								<div class="text fw5">Под заказ</div>
							</div>
							<?php endif; ?>
							<div class="catalog-text__center">
								<a href="<?php the_permalink() ?>" class="catalog-text__header link-hover black mr">
									<div class="gray2 mbs small-text"><?php the_field('types'); ?></div>
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
							<?php 
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
							<?php endif; ?>
							<div class="tsm13"><?php the_field('tovar'); ?></div>
						</div>
						<div class="catalog__btns">
							<a href="<?php the_permalink() ?>" class="btn catalog__btn b-gray">
								<span class="btn-blick"></span>
								<span class="tsm13 fw5">Подробнее</span>
							</a>
							<a href="/popup/calculate-price?product_name=<?=urlencode(get_the_title())?>" data-popup-link class="btn catalog__btn one-js-2">
								<span class="btn-blick"></span>
								<span class="tsm13 black fw5">Рассчитать цену</span>
							</a>
						</div>
					</div>
					<!-- /div> -->
			<?php endwhile; ?>		
				</div>
		</div>
	</div>
<?php endif;?>

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