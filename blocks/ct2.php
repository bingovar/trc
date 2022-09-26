<div class="section ct2">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="catalog-header container-big psr">
			<div class="catalog-header__left row-vcenter mr">
				<div class="title rel white-space fw4 tal">
					<?php the_field('ct2-header', 2); ?>
					<div class="fl-dot"></div>
				</div>

			</div>
			<p class="small-text">
				<?php the_field('ct2-text', 2); ?>
			</p>
		</div>
		<div class="mlg"></div>
		<div class="container-big ct2-cont psr">

			<?php  $dd = 1;
			if( have_rows('elem_ctg', 2) ):  while( have_rows('elem_ctg', 2) ): the_row();

			    // vars
			    $title = get_sub_field('title');
			    $img = get_sub_field('img');
			    $id = get_sub_field('id');
          $linktekst = get_sub_field('linktekst');

			?>
			<div class="ct2-item mlg">
				<a href="<?php the_permalink ($id); ?>" class="ct2-item__img ">
					<img src="<?php echo $img; ?>" alt="">
				</a>
				<div class="ct2-item__text">
					<a href="<?php the_permalink ($id); ?>" class="text21  black fw7 link-hover mb">
						<?php echo $title; ?>
					</a>
					<?php $id2 = $id;?>
					<ul class="ct2-list tsm13 mb">
						<?php

						    $temp = $wp_query;  // re-sets query
						    $wp_query = null;   // re-sets query


						    $args = array( 'post_parent' => $id, 'post_type' => 'page', 'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 6,

						    );
						    $wp_query = new WP_Query();
						    $wp_query->query( $args );
						    while ($wp_query->have_posts()) : $wp_query->the_post();
						?>
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
					</ul>

					<a href="<?php the_permalink ($id2); ?>" class="link-a small-text fw7"> <?php echo $linktekst; ?> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news/prd.svg" alt=""></a>
				</div>
			</div>
				<?php ++$dd; endwhile; ?>
			<?php endif; ?>

		</div>
	</div>