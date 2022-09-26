<div class="garant">
		<div class="container-min garant__block psr">
			<div class="garant__left">
				<div class="t-min fwb mlg">
					<div class="fl-dot"></div>
					<?php the_field('gar_header', 2); ?>
				</div>	
				<div class="garant__left-bot">
					<div class="garant__sm-text tsm12 msm lh fw4">
						<?php the_field('gar_text', 2); ?>
					</div>
					<div class="garant-ans rel">
						<div class="garant-ans__wrap">
							<div class="fw4 tsm13 mbm">На вопросы отвечает </div>
							<div class="fwb mbm text23">
								<?php the_field('gar_name', 2); ?>	
							</div>
							<div class="tsm12 gray mbm fw4"><?php the_field('gar_pl', 2); ?></div>
							<button class="btn garant-ans__btn btn-call-js" data-popup-link="/popup/back-call/">
								<span class="btn-blick"></span>
								<span class="tsm13 fw4 black">Задать свой вопрос</span>
							</button>
							<div class="garant-ans__man col-center">
								<img src="<?php the_field('gar_ava', 2); ?>	" alt="">
							</div>
							
						</div>
					<!--	<div class="garant-ans__word">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/garant/word.png" alt="">
						</div>-->
					</div>
				</div>			
			</div>
			<div class="garant__right gtab">
				<div class="gtab__tab-cont">
					<?php $num = 1; $label; $label2; $label3;
						if( have_rows('gar__block_2', 2) ):  while( have_rows('gar__block_2', 2) ): the_row(); 

							// vars
							$title = get_sub_field('title');
							$text = get_sub_field('text');
						if($num == 1){
							$label = 'show';
							$label2 = 'active';
							$label3 = '';
						} else {
							$label = '';
							$label2 = '';
							$label3 = 'display: none';
							
						}
						?>
						<div class="gtab__item">
							<div class="gtab__top <?php echo $label; ?> <?php echo $label2; ?>">
								<div class="small-text fwb"><?php echo $title; ?></div>
								<div class="gtab__plus col-center"></div>
							</div>
							<div class="gtab__hover gray tsm12" style="<?php echo $label3; ?>">
								<?php echo $text; ?>
							</div>
							<div class="gtab__line"></div>
						</div>
					<?php ++$num; endwhile; ?>
					<?php endif; ?>
					
					
				</div>
				<div class="gtab__tab-cont" >
					<?php $num = 1; $label; $label2; $label3;
						if( have_rows('gar__block', 2) ):  while( have_rows('gar__block', 2) ): the_row(); 

							// vars
							$title = get_sub_field('title');
							$text = get_sub_field('text');
							if($num == 5){
								$label = 'show';
								$label2 = '';
								$label3 = '';
							} else {
								$label = '';
								$label2 = '';
								$label3 = 'display: none';
							}
						?>
						<div class="gtab__item">
							<div class="gtab__top <?php echo $label; ?> <?php echo $label2; ?>">
								<div class="small-text fwb"><?php echo $title; ?></div>
								<div class="gtab__plus col-center"></div>
							</div>
							<div class="gtab__hover gray tsm12" style="<?php echo $label3; ?> ">
								<?php echo $text; ?>
							</div>
							<div class="gtab__line"></div>
						</div>
					<?php ++$num; endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>