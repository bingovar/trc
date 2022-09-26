<div class="actions">
    <div class="lines">
        <div class="lines__item"></div>
        <div class="lines__item"></div>
        <div class="lines__item"></div>
        <div class="lines__item"></div>
        <div class="lines__item"></div>
    </div>
    <div class="catalog-header container-big psr">
        <div class="catalog-header__left row-vcenter">
            <div class="title rel white-space fw4 tal">
                <?php the_field('actions-header', 2); ?>
                <div class="fl-dot"></div>
            </div>

        </div>
        <div class="catalog-header__line"></div>
        <!-- 			<a href="<?php the_field('actions-link', 2); ?>" class="catalog-header__more row-center"> -->
        <a href="<?php the_permalink(170); ?>" class="catalog-header__more row-center">
            <div class="tsm13 fw7 dotted dotted_l white-space black mr">Смотреть все</div>
            <div class="catalog-header__plus tac col-center text fwb black"></div>
        </a>

    </div>


    <div class="actions__block container-big psr">
        <?php
        //Fix homepage pagination
       // if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
        // $wp_query = null;   // re-sets query

        $temp = $wp_query;  // re-sets query
        $wp_query = null;   // re-sets query

        // echo $pg;

        $args = array( 'cat' => 2, 'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 1,
        );
        $wp_query = new WP_Query();
        $wp_query->query( $args );
        while ($wp_query->have_posts()) : $wp_query->the_post();

        ?>

        <div class="container-big psr">
            <div class="vid__block">
                <div class="vid__actions">
                    <div class="vid-actions" id="vid-slider1">
                        <?php
                        if( have_rows('vid_actions', 2) ):  while( have_rows('vid_actions', 2) ): the_row();

                            // vars
                            $img = get_sub_field('img');
                            $text = get_sub_field('text');
                            $link = get_sub_field('link');

                            ?>
                            <div class="vid-slider__item video">
                                <a href="<?php echo $link; ?>" style="color: #282828;"> <div class="vid-actions__img mb">
                                        <img src="<?php echo $img; ?>" alt="">
                                    </div>
                                  <div class="vid-slider__text fwb tac small-text">
                                    <?php echo $text; ?>
                                  </div>
                                </a>

                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </div>

                <?php endwhile; ?>
    </div>
    </div>
            </div>
        </div>
    </div>
