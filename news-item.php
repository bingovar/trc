<?php
/*
Template Name: Шаблон новости
Template Post Type: post
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
		<div class="container-big main-pages">
			<div class="lines">
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
				<div class="lines__item"></div>
			</div>
			<div class="main-pages-left psr" style="width: 100%;">
<!-- 				<div class="bread msm">
					<div class="small-text fw4">
						Главная
					</div>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rassrochka/arr.svg" alt="" class="bread-arr">

					<div class="small-text fw4">
						Новости и акции
					</div>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rassrochka/arr.svg" alt="" class="bread-arr">

					<div class="small-text fwb">
						Распродаж тракторов по прошлогодним ценам
					</div>

				</div> -->
				<?php
/* breadcrumb Yoast */
		if ( function_exists( 'yoast_breadcrumb' ) ) :
		   yoast_breadcrumb( '<div id="breadcrumbs" class="bread small-text fw4 msm">', '</div>' );
		endif;
		?>
		
				<div class="title-wrapper msm">
					<div class="t-min rel fw4  tal"> <span class="fwb"><?php the_title(); ?></span>  
						<div class="fl-dot"></div>
					</div>

					<div class="pg-item text" title="Дизельный">
						<?php echo the_time( 'j F Y' ); ?>
					</div>
				</div>
			</div>
		
		</div>
	<!-- </div> -->


	 <?php 
		include 'blocks/seo_style.php';
	 ?>
	<div class="pages-cont psr pmb">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big psr">
			
			<div class="pi-row msm">
				<div class="pi-row-left edt">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                                        <?php the_content(); ?>
			                                    <?php endwhile; ?>
			                                    <?php endif; ?>
				</div>
				<div class="show-block show-mod-med" style="display: none;">
					<a href="<?php the_permalink(170) ?>" class="show-link show-link_fw">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/arrl.svg" alt="" class="show-img2 mr">
						<span class="text link mr">
							Вернуться назад
						</span>

						<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/sh.svg" alt="" class="show-img"> -->
					</a>
				</div>
				<div class="pi-row-right">
					<form data-download-catalog-form action="#" class="form form-dark tac msm download-catalog-form">
						<div class="text mbm"><?php the_field('text_f1_1',170); ?></div>
						<h3 class="text23 mbm">
							<?php the_field('text_f2_1',170); ?>
						</h3>
						<div class="text mb fw3">
							<?php the_field('text_f2_3',170); ?>
						</div>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pdf.png" alt="" class="mbm">
						<div class="text mb fw3">
							<?php the_field('text_f2_4',170); ?>
						</div>
						<input type="hidden" name="title" value='Каталог'>
            <input type="hidden" name="formname" value='catalog'>
            <div class="form__row">
              <label class="input form__input form__input_full-width">
                <span class="input__title input__title_center download-catalog-form__input-header">Введите номер Вашего телефона:*</span>
                <input type="tel" class="input__input" name="phone">
              </label>
            </div>
            <div class="form__row">
              <button class="button button_accent button_font-size-vw button_mobile-big form__input form__input_full-width">Скачать</button>
            </div>
						<a href="/popup/policy" data-popup-link class="tsm10 tac download-catalog-form__white-link" style="color: #fff">
							Мы не передаём Ваш номер третьим лицам <br>
							и не используем его для рассылки рекламы
						</a>
					</form>

					<form action="#" class="form-gray tac">
						<div class="text mbm"><?php the_field('text_ft2_1',170); ?></div>
						<h3 class="text23 mbm">
							<?php the_field('text_ft2_2',170); ?>
						</h3>
						<img src="<?php the_field('img_ft2_2',170); ?>" alt="" class="mbm">
						<div class="text mb fw3">
							<?php the_field('text_ft3_2',170); ?>
						</div>
						
						<button class="btn max mb test1-js" data-technics-select-link>
							<span class="btn-blick"></span>
							<span class="tsm13 black fw4">Пройти тест</span>
						</button>
					</form>
				</div>
			</div>


			

			<div class="show-block show-mod-med-no">
				<a href="<?php the_permalink(170) ?>" class="show-link show-link_fw">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/arrl.svg" alt="" class="show-img2 mr">
					<span class="text link mr">
						Вернуться назад
					</span>

					<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/sh.svg" alt="" class="show-img"> -->
				</a>
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




</body>
</html>