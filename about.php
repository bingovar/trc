<?php
/*
Template Name: О компании
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
	
	<div class="main-pages-wrap rel about">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big main-pages">
			
			<div class="main-pages-left">
				<?php
				/* breadcrumb Yoast */
				if ( function_exists( 'yoast_breadcrumb' ) ) :
				   yoast_breadcrumb( '<div id="breadcrumbs" class="bread small-text fw4 msm">', '</div>' );
				endif;
				?>
		
				<div class="title rel fw4 mb tal"><?php the_field('ab_header_351', 351); ?>
					<div class="fl-dot"></div>
				</div>
				<p class="tsm13 lhm ab-text mb">
					<?php the_field('ab_descr_351', 351); ?>
				</p>
			</div>
		
			<div class="main-pages-right">
				<img src="<?php the_field('ab_img_351', 351); ?>" alt="">
			</div>
		
		
		</div>
	</div>


	<div class="section pages-cont">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big psr">
			<div class="about-advas">
				<div class="about-advas-left">
					<div class="container-big about-advas-left__header">
						<div class="title rel fw4 mlg tal"><?php the_field('advantages_header_351', 351); ?>
							<div class="fl-dot"></div>
						</div>
					</div>

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/px.png" alt="" class="about-a-img">

					<div class="about-advas-left__block">
						<?php 
							if( have_rows('advantages_bl_351', 351) ):  while( have_rows('advantages_bl_351', 351) ): the_row(); 

								// vars
								$img = get_sub_field('img');
								$header = get_sub_field('header');
								$text = get_sub_field('text');

							?>
							<div class="about-advas-left__item msm">
								<div class="about-advas-left__item-img mr">
									<img src="<?php echo $img; ?>" alt="">
								</div>
								<div class="about-advas-left__item-text">
									<h4 class="text mbs">
										<?php echo $header; ?>
									</h4>
									<div class="tsm12 lhm">
										<?php echo $text; ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>
						

						
					</div>
				</div>
        
        <!-- <div class="about-slider">
					<div class="about-slider-one ">
						<?php 
							if( have_rows('advant_slider_351', 351) ):  while( have_rows('advant_slider_351', 351) ): the_row(); 

								// vars
								$img = get_sub_field('img');
								$text = get_sub_field('text');

							?>
							<div class="about-slider-one-item-block">
								<a href="<?php echo $img; ?>" class="fancy-class about-slider-one-item mbm" data-fancybox="es1"><img src="<?php echo $img; ?>" alt=""></a>

								<div class="about-slider-text-item tsm13 tac">
									<?php echo $text; ?>
								</div>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>
						
					</div>

					 <div class="about-slider-text tac">
						<div class="about-slider-text-item text">
							Название документа <br>
							под фотографией
						</div>
						<div class="about-slider-text-item text">
							Название документа <br>
							под фотографией
						</div>
					</div>
				</div>  -->
			</div>
		</div>
	</div>



	<!-- techno -->
	<div class="section techno">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big psr2">
			<div class="t-min2 mb">
				<?php the_field('tech_header_351', 351); ?>
			</div>
			<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/map2.png" alt="" class="maphd"> -->
			<div class="techno-block">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/map.png" alt="">

				<div class="techno-block-item techno-block-item-1">
					<div class="techno-block-item-num mr fw7">
						<?php the_field('tech_num1_351', 351); ?>
					</div>
					<div class="text fwb">
						<?php the_field('tech_text1_351', 351); ?>
					</div>
				</div>

				<div class="techno-block-item techno-block-item-2">
					<div class="techno-block-item-num mr fw7">
						<?php the_field('tech_num2_351', 351); ?>
					</div>
					<div class="text fwb">
						<?php the_field('tech_text2_351', 351); ?>
					</div>
				</div>

				<div class="techno-block-item techno-block-item-3">
					<div class="techno-block-item-num mr fw7">
						<?php the_field('tech_num3_351', 351); ?>
					</div>
					<div class="text fwb">
						<?php the_field('tech_text3_351', 351); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="psr">
		<div class="container-big techno-advas">
			<div class="lines">
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
			</div>
			<?php $num = 1;
			if( have_rows('tech_slider_351', 351) ):  while( have_rows('tech_slider_351', 351) ): the_row(); 

				// vars
				$img = get_sub_field('img');
				$text = get_sub_field('text');
				$header = get_sub_field('header');

				?>
				<div class="techno-advas__item psr">
					<div class="techno-advas__item-head mbm">
						<div class="text gray">
							0<?php echo $num; ?>
						</div>
						<div class="techno-advas__item-img">
							<img src="<?php echo $img; ?>" alt="">
						</div>
					</div>

					<div class="techno-advas__item-text	">
						<div class="small-text rel fw4 mbs  tal"> <?php echo $header; ?>
							<div class="fl-dot"></div>
						</div>
						<div class="tsm12 lhm">
							<?php echo $text; ?>
						</div>
					</div>

				</div>

			<?php ++$num; endwhile; ?>
			<?php endif; ?>
			
		
			
		</div>
	</div>
	
	<!-- opt -->
	<div class="section opt">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big opt-cont psr">

			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/opt.svg" alt="" class="opt-img">
			
			<div class="techno-block-item-num mndb">ОПТ</div>
			<div class="opt-left">
				<div class="t-min2 rel fw4 mbm  tal"> 
				<?php the_field('subheader_357_pph', 351); ?>
					<div class="fl-dot"></div>
				</div>
				
				<div class="t-min ttu mb fwb">
					<?php the_field('header_357_pph', 351); ?>
				</div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/moc.png" alt="" class="opt-mock paradima-hmo">
				<p class="tsm13 opt-left__small-text lhm mb">
					<?php the_field('text_357_pph', 351); ?>
				</p>
				<a href="/popup/optovikam/" data-popup-link class="btn btn-modal-end2-js">
					<span class="btn-blick"></span>
					<span class="tsm13 white fw4">Получить КП</span>
				</a>
			</div>
		</div>
	</div>




	<div class="catalog no-catalog">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="catalog-header container-big psr">
			<div class="title rel fw4 tal"><span class="fwb">Последние </span> новости
				<div class="fl-dot"></div>
			</div>
			<div class="catalog-header__line"></div>
			<a href="<?php the_permalink(170); ?>" class="catalog-header__more row-center">
				<div class="text fw5 dotted dotted_l black mr">Смотреть все</div>
				<div class="catalog-header__plus tac col-center text fwb black"></div>
			</a>
		</div>
		<div class="catalog__block container-big psr">

			<?php 
                    //Fix homepage pagination
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
        // $wp_query = null;   // re-sets query

        $temp = $wp_query;  // re-sets query
        $wp_query = null;   // re-sets query

        // echo $pg;
        
        $args = array( 'cat' => 2, 'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 4,
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
				<a href="<?php the_permalink(); ?>" class="fwb text title-link mb">
					<?php the_title(); ?>
				</a>
				<a href="<?php the_permalink(); ?>" class="link-a small-text">Подробнее <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/prd.svg" alt=""></a>
			</div>
		<?php endwhile; ?>
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
		$('.about-slider-one').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  fade: false,
		  dots: false,
		  nextArrow: '<button class="arrows t3 slideNext"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/next-arrow1.svg" alt=""></button>',
		  prevArrow: '<button class="arrows t3 slidePrev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/prev-arrow1.svg" alt=""></button>',
		    responsive: [
		    {
		      breakpoint: 900,
		      settings: {
		        slidesToShow: 1,
		        autoplay: false,
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 1,
		        autoplay: false,
		      }
		    },
		    {
		      breakpoint: 567,
		      settings: {
		        slidesToShow: 1,
		        autoplay: false,
		      }
		    },

		  ]
		});
	</script>

</body>
</html>