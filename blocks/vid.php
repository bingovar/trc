<div class="vid">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="catalog-header container-big">
			<div class="catalog-header__left row-vcenter">
				<div class="t-min rel white-space fw4 tal">
					<?php the_field('vid_header', 2); ?>
					<div class="fl-dot"></div>
				</div>
				
			</div>
			<div class="catalog-header__line"></div>
			<a href="<?php the_field('vid_link', 2); ?>" class="catalog-header__more row-center">
				<div class="tsm13 fw7 dotted dotted_l white-space black mr">Все наши видео на YouTube</div>
				<div class="catalog-header__plus tac col-center text fwb black"></div>
			</a>
		</div>
		<div class="container-big psr">
			<div class="vid__block">



                <div class="vid__left">
                    <div class="vid-slider" id="vid-slider1">
                        <?php
                        if( have_rows('vid_block', 2) ):  while( have_rows('vid_block', 2) ): the_row();

                            // vars
                            $img = get_sub_field('img');
                            $text = get_sub_field('text');
                            $link = get_sub_field('link');

                            ?>
                            <div href="<?php echo $link; ?>" class="vid-slider__item video fancy-class">
                                <div class="vid-slider__img mb">
                                    <img src="<?php echo $img; ?>" alt="">
                                    <div class="vid-cir"></div>
                                </div>
                                <div class="vid-slider__text fwb tac small-text">
                                    <?php echo $text; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>



			</div>
		</div>
	</div>