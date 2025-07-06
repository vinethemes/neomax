<?php
/**
 * Template for the post excerpt slider on the homepage.
 *
 * @package neomax
 * @since neomax 1.0
 */
?>

    <!--  scroller -->
<?php if ( get_theme_mod('neomax_customizer_mainslider_disable') != 'disable') { ?>

   

        <div class="slider-wrapper23 main slider">


            <div class="neomax_slides">
                <?php
                $neomax_image_size = "neomax-slider-image";
                $neomax_number23 = get_theme_mod('neomax_mainslider_slides');
                $neomax_category2 = get_theme_mod('neomax_mainslider_category');

                $neomax_featured_list_args2  = array(
                    'posts_per_page' => $neomax_number23,
                    'cat' => $neomax_category2
                );
                $neomax_featured_list_posts = new WP_Query($neomax_featured_list_args2);
                ?>

<?php
$count = 0;
echo '<div class="main-wrap">';

while ($neomax_featured_list_posts->have_posts()) : $neomax_featured_list_posts->the_post();

    // Pattern: 2 small → 1 large → 4 small → 1 large → 4 small → 1 large ...
    if ($count < 2) {
        $type = 'small'; // first two are small
    } elseif ($count === 2) {
        $type = 'large'; // third is large
    } else {
        // Start new pattern from count 3
        $patternIndex = ($count - 3) % 5; // 0-3: small, 4: large
        $type = ($patternIndex < 4) ? 'small' : 'large';
    }

    $wrapper_class = ($type === 'small') ? 'small-items' : 'large-items';
    echo '<div class="' . $wrapper_class . '">';
    ?>
    <div class="item-slide">
        <div class="slide-wrap">
            
            








<?php
$video_thumb = neomax_get_embed_thumbnail(get_the_ID());


if (!empty($video_thumb)) {
    ?>
    <div class="image-slide video-thumb" style="position: relative;">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($video_thumb); ?>" alt="<?php the_title_attribute(); ?>" width="300" height="200" />
        </a>
        <div class="poster-play-icon">
            <a href="<?php the_permalink(); ?>"><i class="fa fa-play"></i></a>
        </div>
    </div>
<?php
} elseif (has_post_thumbnail()) {
    $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
    $image_alt = !empty($image_alt) ? $image_alt : get_the_title(get_post_thumbnail_id($post->ID));
    $neomax_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $neomax_image_size); ?>
    <div class="image-slide">
        <a href="<?php echo esc_url(get_permalink()); ?>">
            <img src="<?php echo esc_url($neomax_image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="<?php echo $neomax_image[1]; ?>" height="<?php echo $neomax_image[2]; ?>" />
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
                            <div class="scroll-post"><?php echo neomax_getCategory(); ?></div>
                            <div class="post-date"><a href="<?php the_permalink(); ?>"><?php echo neomax_time_ago_custom(get_the_date('c')); ?></a></div>
                            <div class="postcomment"><?php if (comments_open()) : ?>
                                                    <?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax')); ?>
                                                <?php endif; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo '</div>'; // close small-items or large-items
    $count++;
endwhile;

echo '</div>'; // close main-wrap
?>



                <?php wp_reset_postdata(); ?>
            </div>

            

        </div>

<?php } ?>