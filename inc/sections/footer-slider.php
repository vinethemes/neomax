<?php
/**
 * Template for the Footer Related Posts Section on the homepage.
 *
 * @package neomax
 * @since neomax 1.0
 */ 
?>

<?php if ( get_theme_mod('neomax_footer_related_enable', 'enable') !== 'disable' ) : ?>

    <div class="slider-wrapper23 footer-slider-section container">
        
        <div class="section-title">
            <?php echo esc_html(get_theme_mod('neomax_footer_related_title', esc_html__('You may also like', 'neomax'))); ?>
        </div>

        <div class="neomax_slides footer-slider-grid">
            <?php
            $neomax_image_size = "neomax-slider-image";
            $neomax_number     = get_theme_mod('neomax_footer_related_posts', 10);
            $neomax_category   = get_theme_mod('neomax_footer_related_category');

            $args = array(
                'posts_per_page' => $neomax_number,
                'cat'            => $neomax_category,
            );

            $query = new WP_Query($args);
            ?>

            <div class="main-wrap">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="small-items">
                    <div class="item-slide">
                        <div class="slide-wrap">

                            <?php
                            $video_thumb = function_exists('neomax_get_embed_thumbnail') ? neomax_get_embed_thumbnail(get_the_ID()) : '';
                            if (!empty($video_thumb)) {
                                ?>
                                <div class="image-slide" style="position: relative;">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($video_thumb); ?>" alt="<?php the_title_attribute(); ?>" width="300" height="200" />
                                    </a>
                                    <div class="poster-play-icon">
                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>              

                                <?php
                            } elseif ( has_post_thumbnail() ) {
                                $image_alt  = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                                $image_alt  = !empty($image_alt) ? $image_alt : get_the_title(get_post_thumbnail_id($post->ID));
                                $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $neomax_image_size);
                                ?>
                                <div class="image-slide" style="position: relative;">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($image_data[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="<?php echo esc_attr($image_data[1]); ?>" height="<?php echo esc_attr($image_data[2]); ?>" />
                                    </a>
                                </div>

                                <?php
                            } else {
                                ?>
                                <div class="image-slide" style="position: relative;">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>" alt="<?php esc_attr_e('No Image', 'neomax'); ?>" width="300" height="200" />
                                    </a>
                                    <div class="poster-play-icon">
                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <h2 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="slider-meta">
                                            <div class="scroll-post">
                                                <?php echo neomax_getCategory(); ?>
                                            </div>
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo time_ago_custom(get_the_date('c')); ?>
                                                </a>
                                            </div>
                                            <div class="postcomment">
                                                <?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax')); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div> <!-- .main-wrap -->
            <?php wp_reset_postdata(); ?>
        </div><!-- .neomax_slides -->

    </div>

<?php endif; ?>
