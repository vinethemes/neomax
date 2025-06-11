<?php
/**
 * Template for the Large Poster Section on the homepage.
 *
 * @package neomax
 * @since neomax 1.0
 */
?>

<?php if (  get_theme_mod('neomax_large_poster_enable', 'enable') !== 'disable' ) : ?>

    <div class="slider-wrapper23 large-poster-section">
        <div class="neomax_slides">
            <?php
            $neomax_image_size = "full";
            $neomax_number = get_theme_mod('neomax_large_poster_posts', 1);
            $neomax_category = get_theme_mod('neomax_large_poster_category');

            $args = array(
                'posts_per_page' => $neomax_number,
                'cat' => $neomax_category,
            );
            $query = new WP_Query($args);
            ?>

            <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="item-slide">
        <div class="slide-wrap">

            <?php
            // Check if the post has an embedded video thumbnail
            $video_thumb = function_exists('neomax_get_embed_thumbnail') ? neomax_get_embed_thumbnail(get_the_ID(), 'maxresdefault') : '';

            if (!empty($video_thumb)) : ?>
                <div class="image-slide" style="background-image: url('<?php echo esc_url($video_thumb); ?>');">
                    <div class="poster-overlay-dark">
                        <div class="poster-inner">
                            <h2 class="poster-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="poster-desc">
                                <?php echo wp_trim_words(get_the_content(), 35); ?>
                            </div>
                            <div class="poster-meta">
                                <span><i class="fa fa-clock"></i> <?php echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp'))) . ' ago'; ?></span>
                                <span><i class="fa fa-comments"></i> <?php echo get_comments_number(); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="poster-play-button">Play Now <i class="fa fa-angle-right"></i></a>
                        </div>

                        <!-- Play icon only for video posts -->
                        <div class="poster-play-icon">
                            <a href="<?php the_permalink(); ?>"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>

            <?php elseif (has_post_thumbnail()) :
                $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                $image_alt = !empty($image_alt) ? $image_alt : get_the_title(get_post_thumbnail_id($post->ID));
                $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $neomax_image_size);
            ?>
                <div class="image-slide" style="background-image: url('<?php echo esc_url($image_data[0]); ?>');">
                    <div class="poster-overlay-dark">
                        <div class="poster-inner">
                            <h2 class="poster-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="poster-desc">
                                <?php echo wp_trim_words(get_the_content(), 35); ?>
                            </div>
                            <div class="poster-meta">
                                <span><i class="fa fa-clock"></i> <?php echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp'))) . ' ago'; ?></span>
                                <span><i class="fa fa-comments"></i> <?php echo get_comments_number(); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="poster-play-button">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            <?php else : ?>
                <div class="image-slide">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>" alt="<?php esc_attr_e('No Image', 'neomax'); ?>" />
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>

<?php endif; ?>
