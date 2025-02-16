<?php
    /**
     * Template for the post excerpt slider on the homepage.
     *
     * @package neomax
     * @since neomax 1.0
     */
    ?>

    <!--  scroller -->
    <?php if( is_home() && get_theme_mod( 'neomax_customizer_mainslider_disable' ) != 'disable' ) {
    ?>
    <div class="slider-wrapper23 main">

        <div class="neomax_slides container ">
            <?php
            $neomax_image_size = "neomax-slider-image";
            $neomax_number23 = get_theme_mod('neomax_slider_slides');
            $neomax_category2 = get_theme_mod('neomax_mainslider_category');

            $neomax_featured_list_args2  = array(
                'posts_per_page' => $neomax_number23,
                'cat' => $neomax_category2
            );
            $neomax_featured_list_posts = new WP_Query($neomax_featured_list_args2);
            ?>

            <?php while ($neomax_featured_list_posts->have_posts()) : $neomax_featured_list_posts->the_post() ?>
                <div class="item-slide">


                    <div class="slide-wrap">

                        <?php if (has_post_thumbnail()) {

                            $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); // Retrieve existing alt text
                            $image_alt = !empty($image_alt) ? $image_alt : get_the_title(get_post_thumbnail_id($post->ID)); // Use title if alt text is empty
                            $neomax_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $neomax_image_size); ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <img src="<?php echo $neomax_image[0]; ?>" alt="<?php echo esc_attr($image_alt); ?>" width="<?php echo $neomax_image[1]; ?>" height="<?php echo $neomax_image[2]; ?>" />
                                </a>
                            </div>
                        <?php }
                        else { ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>" alt="<?php esc_attr_e('No Image', 'neomax'); ?>" width="300" height="200" />
                                </a>
                            </div>
                        <?php } ?>
                        <div class="feat-item-wrapper">
                            <div class="feat-overlay">
                                <div class="feat-inner">
                                    <div class="scroll-post">
                                        <?php echo neomax_getCategory(); ?>
                                    </div>
                                    <h2 class="feat-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="slider-meta">
                                        <div class="post-date">
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                        </div>
                                        <div class="postcomment"><?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax'), '', ''); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="neomax_afterslides container">
            <?php
            $neomax_image_size = "neomax-after-thumb";
            $neomax_category3 = get_theme_mod('neomax_afterslider_category');

            $neomax_featured_list_args3  = array(
                'posts_per_page' => 3,
                'cat' => $neomax_category3
            );
            $neomax_featured_list_posts = new WP_Query($neomax_featured_list_args3);
            ?>

            <?php while ($neomax_featured_list_posts->have_posts()) : $neomax_featured_list_posts->the_post() ?>
                <div class="item-slide">


                    <div class="slide-wrap">


                        <?php if (has_post_thumbnail()) {
                            $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); // Retrieve existing alt text
                            $image_alt = !empty($image_alt) ? $image_alt : get_the_title(get_post_thumbnail_id($post->ID)); // Use title if alt text is empty
                            $neomax_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $neomax_image_size); ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <img src="<?php echo $neomax_image[0]; ?>" alt="<?php echo esc_attr($image_alt); ?>" width="<?php echo $neomax_image[1]; ?>" height="<?php echo $neomax_image[2]; ?>" />
                                </a>
                            </div>
                        <?php }
                        else { ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>" alt="<?php esc_attr_e('No Image', 'neomax'); ?>" width="300" height="200" />
                                </a>
                            </div>
                        <?php } ?>
                        <div class="feat-item-wrapper">
                            <div class="feat-overlay">
                                <div class="feat-inner">
                                    <div class="scroll-post">
                                        <?php echo neomax_getCategory(); ?>
                                    </div>
                                    <h2 class="feat-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="slider-meta">
                                        <div class="post-date">
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                        </div>
                                        <div class="postcomment"><?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax'), '', ''); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>

    </div>




<?php } ?>