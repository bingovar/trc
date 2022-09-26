<?php
/*
Template Name: Каталог оборудования
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

	</div>

	<div class="main-pages-wrap psr">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big main-pages psr mrg12">
			<div class="main-pages-left">
				<?php
/* breadcrumb Yoast */
		if ( function_exists( 'yoast_breadcrumb' ) ) :
		   yoast_breadcrumb( '<div id="breadcrumbs" class="bread small-text fw4 msm">', '</div>' );
		endif;
		?>

        <div class="title rel fw4 mb tal banner-t">Каталог<span class="fwb"> с ценами</span>
          <div class="fl-dot"></div>
        </div>
        <div class="small-text mb3">
          <b class="fw7">Скачайте бесплатный каталог</b><br>
          с ценами на весь ассортимент				</div>
				<a href="/popup/download-catalog-rozn" data-download-catalog-popup class="btn mbm page-btn page-btn-100 end-js">
					<img src="<?php the_field('ctg_btn'); ?>" alt="" class="page-btn-img">
					<span class="btn-blick"></span>
					<span class="tsm13 black fw4">Скачать каталог</span>
				</a>
        <div class="tsm13 gray msm time-katalog"> PDF 2.4 Мб • Обновлен <span class="">15.09.2022</span>
        </div>
			</div>

			<div class="main-pages-right">
				<img src="<?php the_field('img_1'); ?>" alt="">
			</div>


		</div>
	</div>


	<div class="pages-cont psr pmb" id="price">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big psr">
			<div class="pages-cont-row">
				<div class="pages-cont-text text23 mr">
					Выберите  <br>
					<b class="fw7">категорию</b>
				</div>
				<div class="pages-cont-tabs small-text tac">
					<?php $one = 1;

					if(isset($_GET['filter'])) {$filter = $_GET['filter'];}else{$filter = 'Все';}
	                if(isset($_GET['pg'])) {$pg = $_GET['pg'];}else{$pg = get_the_id();}

					if( have_rows('cat_filter') ):  while( have_rows('cat_filter') ): the_row();

					    // vars
					    $cat_one = get_sub_field('cat_one');
						if($filter == $cat_one){
							$acti = 'active';
						}else{
							$acti = '';
						}
					?>
					<a href="<?php the_permalink(get_the_id()); ?>?filter=<?php echo $cat_one; ?>&pg=<?php the_ID(); ?>#price" class="pg-item <?php  echo $acti; ?>" title="<?php echo $cat_one; ?>">
						<?php echo $cat_one; ?>
					</a>
					<?php ++$one; endwhile; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="catalog-js">
				<div class="catalog__block psr page-block">


	                <?php

// 	                if(isset($_GET['filter'])) {$filter = $_GET['filter'];}else{$filter = 'Все';}
// 	                if(isset($_GET['pg'])) {$pg = $_GET['pg'];}else{$pg = get_the_id();}
	                // if ( $a < 0 ) echo "число отрицательное" :  echo "число положительное";
	                // $filter = $_GET['filter']; $pg = $_GET['pg'];

// echo $filter;
// echo $pg;
                    //Fix homepage pagination
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
        // $wp_query = null;   // re-sets query

        $temp = $wp_query;  // re-sets query
        $wp_query = null;   // re-sets query


        $args = array( 'post_parent' => $pg, 'post_type' => 'page', 'orderby'=>'date', 'order'=>'DESC', 'paged' => $paged, 'posts_per_page' => 9,
           'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => 'metki',
                    'value' => $filter,
                    'compare' => 'REGEXP',
                ],
            ]
    );
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


								<?php if( get_field('act_pr') ): ?>
								<div class="price-mod-rigt text21 gray tdt">
									<?php echo $moneyOld; ?> руб.
								</div>
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php endif; ?>

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

				<div class="show-block">
					<!-- <a href="#" class="show-link show-link_fw">
						<span class="text fwb link mr">
							Показать еще
						</span>

						<img src="assets/img/news/sh.svg" alt="" class="show-img">
					</a> -->

					<!-- <nav class="navigation pagination" role="navigation">

					<div class="nav-links">
						<span aria-current="page" class="page-numbers current">1</span>
						<a class="page-numbers" href="https://www.condra.ru/news/page/2/">2</a>
						 <span class="page-numbers dots">…</span>
						 <a class="page-numbers" href="https://www.condra.ru/news/page/6/">6</a>
						 <a class="next page-numbers" href="https://www.condra.ru/news/page/2/"> &gt; </a>
					</div>
					</nav> -->
					<?php


					$args = array(

						'prev_text'    => __('	&lt;'),
						'next_text'    => __('&gt;')
					);


					the_posts_pagination($args); ?>
				</div>
			</div>
		</div>
	</div>

	<!-- pc -->
<?php
		include 'blocks/seo_style.php';
	 ?>

  <!--БЛОК ДЛЯ SEO -->
<!--	<div class="section pc">-->
<!--		<div class="lines">-->
<!--			<div class="lines__item"></div>-->
<!--			<div class="lines__item"></div>-->
<!--			<div class="lines__item"></div>-->
<!--			<div class="lines__item"></div>-->
<!--			<div class="lines__item"></div>-->
<!--		</div>-->
<!--		<div class="container-big psr edt">-->
<!--			--><?php //wp_reset_query(); if (have_posts()) : ?><!-- --><?php //while (have_posts()) : the_post(); ?><!-- -->
<!--				 	--><?php //the_content(); ?><!-- -->
<!--				 --><?php //endwhile; ?><!-- -->
<!--				  --><?php //endif; ?>
<!--		</div>-->
<!--	</div>-->

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



	 <input type="hidden" class="ajax-get" value="<?php echo admin_url('admin-ajax.php?action=ajaxGet'); ?>">


	<?php
		include 'blocks/scripts.php';
	 ?>



	 <script>
	 	$('.pg-item').on('click', function(event) {


	 		if($(this).hasClass('active')){
	 			event.preventDefault();
	 		}

	 	});
	 	// var page = "<?php  the_ID() ; ?>";
	 	// $('.pg-item').on('click', function(event) {
	 	// 	event.preventDefault();

	 	// 	if(!$(this).hasClass('active')){
	 	// 		$('.pg-item').removeClass('active');
	 	// 		$(this).addClass('active');
	 	// 		var tlt = $(this).text().trim();
	 	// 		var msg = 'filter='+ tlt+'&pg='+page;

	 	// 	    var action = $('.ajax-get').val();

	 	// 	    $.ajax({
	 	// 	        type: "GET",
	 	// 	        url: action,
	 	// 	        data: msg,
	 	// 	        success: function(data) {
	 	// 	          $('.catalog-js').html(data);
	 	// 	        },
	 	// 	    });
	 	// 	}

	 	// });
	 </script>

</body>
</html>