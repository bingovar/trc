<?php
  /*
  Template Name: Навеска
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

<!--<div class="main-pages-wrap rel about>">-->




<div class="container-big main-pages item-page">

  <div class="main-pages-left">


    <?php
      /* breadcrumb Yoast */
      if ( function_exists( 'yoast_breadcrumb' ) ) :
        yoast_breadcrumb( '<div id="breadcrumbs" class="bread small-text fw4 msm itempage">', '</div>' );
      endif;
    ?>
</div>

</div>



<div class="it psr tovarnaya">
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
					<div class="dline mb"></div>

					<ul class="it-list small-text mb">
						<?php 
			            if( have_rows('hara') ):  while( have_rows('hara') ): the_row(); 

			                // vars
			                $neme = get_sub_field('neme');
			                $text = get_sub_field('text');

			            ?>
						<li class="it-list-item mbs">
							<div class="it-list-item-left fw4">
								<?php echo $neme; ?>
							</div>
							<div class="it-list-item-right fw7">
								<?php echo $text; ?>
							</div>
						</li>

						<?php endwhile; ?>
						<?php endif; ?>
					</ul>

					<div class="it-show">
						<a href="#" class="catalog-header__more row-center scroll-js">
							<div class="tsm13 fw7 dotted dotted_l white-space black mr">Все характеристики</div>
							<div class="catalog-header__plus tac col-center text fwb black"></div>
						</a>
						<div class="catalog-header__line"></div>
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
<!-- 						<button class="btn catalog__btn one-js">
							<span class="btn-blick"></span>
							<span class="tsm13 white fw5">Заказать в 1 клик</span>
						</button> -->
						<?php if( get_field('price_global', $top_cat_id) ): ?>
							<?php if( get_field('prc') ): ?>
							<button data-popup-link="/popup/fast-buy?product_name=<?=urlencode(get_the_title())?>" class="btn catalog__btn one2-js">
								<span class="btn-blick"></span>
								<span class="tsm13 black fw5">Заказать в 1 клик</span>
							</button>
						<?php else: ?>
							<button data-popup-link="/popup/calculate-price?product_name=<?=urlencode(get_the_title())?>"  class="btn catalog__btn one-js">
								<span class="btn-blick"></span>
								<span class="tsm13 black fw5">Рассчитать цену</span>
							</button>
						<?php endif; ?>
							<?php endif; ?>
					</div>
<!-- 					<div class="dline mb"></div>
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
					<div class="dline msm"></div> -->

					<div class="link-row">
						<a href="/popup/found-cheaper?product_name=<?=urlencode(get_the_title())?>" data-popup-link class="link-a tsm13 fw7 dprice-js">Нашли дешевле? </a>
						<a href="/popup/price-drop?product_name=<?=urlencode(get_the_title())?>" data-popup-link class="link-a dsh tsm13 fw7 down-js">Сообщить о снижении цены</a>
					</div>
				</div>
				<?php if( get_field('act_1') ): ?>
				<div class="it-right-right rh1">

					<div class="it-right-right-text">
						<h4 class="t-min tgc2 mbs">
							<?php the_field('atrxt_1'); ?>
						</h4>

						<div class="text24">
							<?php the_field('atrxt_2'); ?>
						</div>
						<h4 class="title fwb">
							<?php the_field('atrxt_3'); ?>
						</h4>
					</div>
					
					<img src="<?php the_field('img_act'); ?>" alt="" class="act-img-1">

					<div class="it-right-right-text tac">
						<div class="text tac mbm title-act-js">
							<?php the_field('atrxt_4'); ?>
						</div>
<!-- 						act-js -->
						<a href="/popup/gift" data-popup-link class="link-a text fw7 call2-js">Узнать условия</a>
					</div>
				</div>
				<?php endif; ?>
				<?php if( get_field('act_2') ): ?>
				<div class="it-right-right t2">
          
          
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/items/b2.png" alt="" class="it-rfg">
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
          <div class="block-for-gifts">
					<div class="itr-block mbm">
						<div class="catalog-header__plus tac col-center text fwb black mr"></div>
						<div class="itr-block-left">
							<img src="<?php echo $img; ?>" alt="">
						</div>
					</div>
          </div>
					<h4 class="text tac mb"><?php echo $text; ?></h4>
     
					<?php endwhile; ?>
                  
                  <?php endif; ?>
         
				</div>
    
				<?php endif; ?>

                <!-- <div class="it-right-center">
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
									0<?php echo $fb; ?>
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
				</div> -->
			</div>
		</div>
	</div>

	<div class="islit-hover islit-hover-nav tsm10">
		
	</div>
	<div class="dscr" id='dscr'>
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big psr">
			<div class="dscr-tab text tac msm">
        
        <?php
        	$tabs = [
        	  "a_1",
            "a_2",
            "a_3",
            "a_4"
          ];
        	
        	$activeTab = -1;
        	foreach ($tabs as $index=>$tab) {
        	  if (get_field($tab)) {
        	    $activeTab = $index;
        	    break;
            }
          }
        ?>
    
				<?php if( get_field('a_1') ): ?>
				<div class="dscr-tab-item <?=$activeTab === 0 ? "active" : ""?>">
					Описание
				</div>
				<?php endif; ?>
				<?php if( get_field('a_2') ): ?>
				<div class="dscr-tab-item <?=$activeTab === 1 ? "active" : ""?>" id="hrd-tab">
					Характеристики
				</div>
				<?php endif; ?>
				<?php if( get_field('a_3') ): ?>
				<div class="dscr-tab-item <?=$activeTab === 2 ? "active" : ""?>">
					Комплектация
				</div>
				<?php endif; ?>
				<?php if( get_field('a_4') ): ?>
				<div class="dscr-tab-item <?=$activeTab === 3 ? "active" : ""?>">
					Скачать <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/items/dw.svg" alt="">
				</div>
				<?php endif; ?>
			</div>

	<?php 
		include 'blocks/seo_style.php';
	 ?>
			<div class="dscr-cont">
				<?php if( get_field('a_1') ): ?>
				<div class="dscr-item edt text">
<!-- 					<?php //the_field('tab_1'); ?> -->
					<?php wp_reset_query(); if (have_posts()) : ?> <?php while (have_posts()) : the_post(); ?> 
						<?php the_content(); ?> 
					 <?php endwhile; ?> 
					 <?php endif; ?>
				</div>
				<?php endif; ?>
				<?php if( get_field('a_2') ): ?>
				<div class="dscr-item text" id="hrd" <?=$activeTab === 1 ? "" : 'style="display: none;"'?>>
					<div class="dscr-item-flex">
						<?php 
						if( have_rows('tab_2') ):  while( have_rows('tab_2') ): the_row(); 

						    // vars
						    $title = get_sub_field('title');

						?>
						<div class="msm di-item">
							<h4 class="fw7 mb tdu text24">
								<?php echo $title; ?>
							</h4>
							<ul class="it-list small-text">
								<?php 
								if( have_rows('punkt') ):  while( have_rows('punkt') ): the_row(); 

								    // vars
								    $param = get_sub_field('param');
								    $values = get_sub_field('values');

								?>
								<li class="it-list-item mbs">
									<div class="it-list-item-left fw5">
										<?php echo $param; ?>
									</div>
									<div class="it-list-item-right fw3">
										<?php echo $values; ?>
									</div>
								</li>
									<?php endwhile; ?>
								<?php endif; ?>
								
							</ul>
						</div>
							<?php endwhile; ?>
						<?php endif; ?>
					
					</div>
					
				</div>
				<?php endif; ?>
				<?php if( get_field('a_3') ): ?>
				<div class="dscr-item" <?=$activeTab === 2 ? "" : 'style="display: none;"'?>>
					<div class="dscr-item-flex v2 text">
						<ul class="dark-list small-text dscr-item-flex-left">
							<?php 
							if( have_rows('tab_3') ):  while( have_rows('tab_3') ): the_row(); 

							    // vars
							    $text = get_sub_field('text');

							?>
							<li><?php echo $text; ?></li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
						<div class="dscr-item-flex-right">
							<img src="<?php the_field('tab_3_img'); ?>" alt="">
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php if( get_field('a_4') ): ?>
				<div class="dscr-item" <?=$activeTab === 3 ? "" : 'style="display: none;"'?>>
					<div class="dscr-item-flex v3 text">
						<div class="dscr-item-flex-first">
              
              <a href="<?php the_field('down'); ?>" download="" class="catalog-header__more row-flex msm">
                <span class="text21 fw7 dotted dotted_l white-space black mr">
                  <?php the_field('text_download_file'); ?>
                </span>
<!--                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/img/page/down.svg" alt="" class="down-img">-->
              </a>
              <a href="<?php the_field('down_1'); ?>" download="" class="catalog-header__more row-flex msm">
                <span class="text21 fw7 dotted dotted_l white-space black mr">
                  <?php the_field('text_download_file_1'); ?>
                </span>
<!--                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/img/page/down.svg" alt="" class="down-img">-->
              </a>
              
							<p class="small-text">
								<?php the_field('text_dow'); ?>
								
							</p>
						</div>

						<div class="dscr-item-flex-end">
							<a href="<?php the_field('down'); ?>" class="sert-a fancy-class mbm">
								<img src="<?php the_field('img_1'); ?>" alt="" class="mbm">
								<h5 class="tsm13 fw5 tdu tac">
									<?php the_field('titlea_1'); ?>
								</h5>
							</a>
							<a href="<?php the_field('down_1'); ?>" class="sert-a fancy-class mbm">
								<img src="<?php the_field('img_2'); ?>" alt="" class="mbm">
								<h5 class="tsm13 fw5 tdu tac">
									<?php the_field('titlea_2'); ?>
								</h5>
							</a>
						</div>
					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<?php if( get_field('nalch') ): ?>
	<div class="section centavr">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big">
			<div class="centavr__cont">
				<div class="text-md lh5">
					<?php the_field('text_aaa'); ?>
				</div>
				<div class="centavr__imgs">
					 <img src="<?php the_field('img_aaa'); ?>" alt="">

<!-- 					<div class="centavr__img"></div> -->
<!-- 					<div class="centavr__img"></div>
					<div class="centavr__img"></div>
					<div class="centavr__img"></div> -->
				</div>

			</div>
			
		</div>
	</div>
	<?php endif; ?>
	

	<!-- 2 -->
	<div class="catalog">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="catalog-header container-big psr">
			<div class="catalog-header__left row-vcenter">
				<!-- <div class="t-min2 fw5 gray mr">02</div> -->
				<div class="fw5 t-min2 whce"> <?php the_field('title_p'); ?></div>
			</div>
			<div class="catalog-header__line"></div>
			
		</div>
		<div class="catalog__block container-big psr">
			<?php 



//         $temp = $wp_query;  // re-sets query
//         $wp_query = null;   // re-sets query

        $numberId =  get_field('id_price');
        $numberIdArr = explode(", ", $numberId);
//        	echo implode(", ", $numberIdArr);
			$args = array('post_type' => 'page', 'post__in'  => $numberIdArr,'posts_per_page' => 60 );
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
							<a href="https://www.youtube.com/watch?v=EfTOZAsmUL4" class="catalog__video fancy-class video row-vcenter poe">
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


	 <script>
	 	$('.dscr-tab-item').on('click', function(event) {
	 		event.preventDefault();
	 		if(!$(this).hasClass('active')){
	 			$('.dscr-item').hide().eq($(this).index()).fadeIn();
	 			$('.dscr-tab-item').removeClass('active');
	 			$(this).addClass('active');
	 		}
	 	});
	 	$('.scroll-js').on('click', function(event) {
	 		event.preventDefault();
	 		var id2 = $('#dscr').offset().top;
	 		$('body,html').animate({scrollTop: id2}, 500);
	 		$('.dscr-item').hide();
	 		$('.dscr-tab-item').removeClass('active');
	 		$('#hrd').fadeIn();
	 		$('#hrd-tab').addClass('active');
	 	});
	 </script>

</body>
</html>