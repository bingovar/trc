<?php
/*
Template Name: Каталог запчастей первая страница
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
		<div class="container-big main-pages psr">
			<div class="main-pages-left">
				<?php
/* breadcrumb Yoast */
		if ( function_exists( 'yoast_breadcrumb' ) ) :
		   yoast_breadcrumb( '<div id="breadcrumbs" class="bread small-text fw4 msm">', '</div>' );
		endif;
		?>
		
				<div class="title rel fw4 mb tal"><?php the_field('title_1'); ?>
					<div class="fl-dot"></div>
				</div>
				<div class="small-text mb">
					<?php the_field('stitle_1'); ?>
				</div>
				<a href="/popup/download-catalog" data-download-catalog-popup class="btn mbm page-btn page-btn-100 end-js">
					<img src="<?php the_field('ctg_btn'); ?>" alt="" class="page-btn-img">
					<span class="btn-blick"></span>
					<span class="tsm13 black fw4">Скачать каталог</span>
				</a>
				<div class="tsm13 gray msm">
					(PDF 2.5 Mb)
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

        $arr = array();
	    $args2 = array( 'post_parent' => $pg, 'post_type' => 'page'); 
	    $wp_query = new WP_Query();
        $wp_query->query( $args2 );
        while ($wp_query->have_posts()) : $wp_query->the_post();

        	array_push($arr, get_the_id());

       endwhile; 
        
        $args = array( 'post_parent__in' => $arr, 'post_type' => 'page', 'orderby'=>'date', 'order'=>'DESC', 'paged' => $paged, 'posts_per_page' => 8,
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
            		<a href="<?php the_permalink() ?>" class="catalog__top v2 rel">
<!-- 						<a href="<?php the_permalink() ?>" class="perm-l ">
						        <img class="cat-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
						    </a> -->
            			<img class="cat-img2" src="<?php the_post_thumbnail_url(); ?>" alt="">
            			<!-- <div class="catalog__opt col-center">
            				<div class="catalog__opt-item mbs col-center red tac">
            					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico1.png" alt="">
            				</div>
            				<div class="catalog__opt-item mbs col-center green tac">
            					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico2.png" alt="">
            				</div>
            				<div class="catalog__opt-item mbs col-center blue tac">
            					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/catalog/ico3.png" alt="">
            				</div>
            			</div> -->	
            			<div class="ctg-advas">
            				<?php 
			            if( have_rows('advas_z') ):  while( have_rows('advas_z') ): the_row(); 

			                // vars
			                $img = get_sub_field('img');
			                $text = get_sub_field('text');

			            ?>

							<div class="ctg-advas-item">
            					<!-- <div class="ctg-advas-img mbm"> -->
            						<img src="<?php echo $img; ?>" alt="" class="ctg-advas-img mbs">
            					<!-- </div> -->
            					<div class="tsm8 fw6 gray">
            						<?php echo $text; ?>
            					</div>
            				</div>

						<?php endwhile; ?>
						<?php endif; ?>
            				

            			</div>
            		</a>
            		<div class="catalog-text">

            			<div class="catalog-text__center mbm">
            				<a href="<?php the_permalink() ?>" class="catalog-text__header link-hover black">
<!--            					<div class="gray2 mbs small-text">--><?php //the_field('types'); ?><!--</div>-->
            					<div class="text24 fw7"><?php the_title(); ?></div>
            				</a>
            				
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
							<a href="#" class="btn catalog__btn catalog__btn one2-js-2">
								<span class="btn-blick"></span>
								<span class="tsm13 black fw5">Заказать сейчас</span>
							</a>
						</div>
            	</div>
					<!-- /div> -->
					
					<?php endwhile; ?>

					
					
				</div>

				<div class="show-block">

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
	<div class="section pc">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big psr ">
			<div class="techno-advas page6 mlg">
				<div class="page6-item-one">
					<div class="title rel fw4 tal"> <span class="fwb"> 
						<?php wp_reset_query(); the_field('title_3'); ?>
					 </span>
						<div class="fl-dot"></div>
					</div>
				</div>
				<?php  $fb = 1;
	            if( have_rows('advas') ):  while( have_rows('advas') ): the_row(); 

	                // vars
	                $img = get_sub_field('img');
	                $text = get_sub_field('text');

	            ?>

				<div class="techno-advas__item page6-item psr">
					<div class="techno-advas__item-head mbm">
						<div class="text gray">
							0<?php echo $fb; ?>
						</div>
						<div class="techno-advas__item-img">
							<img src="<?php echo $img; ?>" alt="">
						</div>
					</div>
			
					<div class="techno-advas__item-text	">
						<div class="tsm13 rel fw4 mbs  tal"> <span class="fw4">
							<?php echo $text; ?>
						 </span> 
							<div class="fl-dot"></div>
						</div>
					</div>
			
				</div>
				<?php ++$fb; endwhile; ?>
				<?php endif; ?>
				
			
		
			</div>

			<div class="pc-row edt">
				 <?php wp_reset_query(); if (have_posts()) : ?> <?php while (have_posts()) : the_post(); ?> 
				 	<?php the_content(); ?> 
				 <?php endwhile; ?> 
				 <?php endif; ?>
			</div>
		</div>
	</div>

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

	 </script>

</body>
</html>