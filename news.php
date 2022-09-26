<?php
/*
Template Name: Новости
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
		
				<div class="title rel fw4 msm tal"> <?php the_field('title_n',170); ?>
					<div class="fl-dot"></div>
				</div>
			</div>
		
			<div class="main-pages-right">
				<img src="<?php the_field('img_n',170); ?>" alt="">
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
					<b>Выберите</b>  <br>
					категорию
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


			<div class="pages-cont-block">
				 <?php 
                    //Fix homepage pagination
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
        // $wp_query = null;   // re-sets query

        $temp = $wp_query;  // re-sets query
        $wp_query = null;   // re-sets query

        // echo $pg;
        
        $args = array( 'cat' => 2, 'orderby'=>'date', 'order'=>'DESC', 'paged' => $paged, 'posts_per_page' => 8,
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
				<div class="news-item msm">
					<a href="<?php the_permalink(); ?>" class="news-item__img mbm">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="">
					</a>
					<div class="tsm13 gray mbm">
						<?php echo the_time( 'j F Y' ); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="fwb text-md title-link mb">
						<?php the_title(); ?>
					</a>
					<a href="<?php the_permalink(); ?>" class="link-a small-text">Подробнее <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/prd.svg" alt=""></a>
				</div>

			<?php endwhile; ?>
			</div>

			<div class="show-block">
				<!-- <a href="#" class="show-link show-link_fw">
					<span class="text fwb link mr">
						Показать еще
					</span>

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/sh.svg" alt="" class="show-img">
				</a> -->
				<?php $args = array(
						
						'prev_text'    => __('	&lt;'),
						'next_text'    => __('&gt;')
					);


					the_posts_pagination($args); ?>
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