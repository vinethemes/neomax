<?php
/**
 * Template for the post navigation and archive pagination.
 *
 * @package neomax
 * @since neomax 1.0
 */
?>



<?php if (is_single()) { ?>
    <div class="next-prev">
        <?php if ($prev_post = get_previous_post()) : ?>
            <div class="prev-post">
                <strong class="next-prev-title"><?php echo esc_html__('Previous Post', 'neomax'); ?></strong>

                <?php
                $prev_video_thumb = neomax_get_embed_thumbnail($prev_post->ID);
                if ($prev_video_thumb) {
                    $prev_thumbnail = '<img src="' . esc_url($prev_video_thumb) . '" class="pagination-previous" alt="' . esc_attr($prev_post->post_title) . '" />';
                } else {
                    $prev_thumbnail = get_the_post_thumbnail($prev_post->ID, 'medium', array('class' => 'pagination-previous'));
                }

                $prev_title = $prev_post->post_title;

                previous_post_link(
                    '<span class="thumbnail">%link</span>',
                    $prev_thumbnail . '<span class="title">' . esc_html($prev_title) . '</span>',
                    true
                );
                ?>
            </div>
        <?php endif; ?>


        <?php if ($next_post = get_next_post()) : ?>
            <div class="next-post">
                <strong class="next-prev-title"><?php echo esc_html__('Next Post', 'neomax'); ?></strong>

                <?php
                $next_video_thumb = neomax_get_embed_thumbnail($next_post->ID);
                if ($next_video_thumb) {
                    $next_thumbnail = '<img src="' . esc_url($next_video_thumb) . '" class="pagination-next" alt="' . esc_attr($next_post->post_title) . '" />';
                } else {
                    $next_thumbnail = get_the_post_thumbnail($next_post->ID, 'medium', array('class' => 'pagination-next'));
                }

                $next_title = $next_post->post_title;

                next_post_link(
                    '<span class="thumbnail">%link</span>',
                    $next_thumbnail . '<span class="title">' . esc_html($next_title) . '</span>',
                    true
                );
                ?>
            </div>
        <?php endif; ?>
    </div><!-- next prev -->
<?php } ?>
