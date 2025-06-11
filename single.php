<?php
/**
 * Single Post Template
 * @package neomax
 * @since neomax 1.0
 */
get_header();
?>

<div id="content-wrap" class="clearfix">

    <?php
    // Try to get the first embedded video
    $video_embed = get_first_video_embed();

    if ($video_embed) : ?>
        <div class="fullwidth-video-wrap">
            <?php echo $video_embed; ?>
        </div>
    <?php endif; ?>

    <div id="content" tabindex="-1" class="<?php if(get_theme_mod('neomax_general_sidebar_post') == true) : ?>fullwidth<?php endif; ?>">

        <?php get_template_part('template-title'); ?>

        <div class="post-wrap">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div <?php post_class('post'); ?>>
                    <div class="box">
                        <div class="frame">
                            <div class="top-part-wrap">

                                <?php if (!$video_embed && has_post_thumbnail()) : ?>
                                    <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('neomax-large-image'); ?>
                                    </a>
                                <?php endif; ?>

                                <div class="title-meta-wrap">
                                    <div class="bar-categories">
                                        <div class="post-date">
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                        </div>
                                        <?php if (has_category()) : ?>
                                            <div class="categories">
                                                <?php neomax_getCategory(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="title-wrap">
                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                        <div class="title-meta">
                                            <?php
                                            echo get_avatar(get_the_author_meta('ID'), 100, '', '', ['extra_attr' => 'itemprop="image"']);
                                            the_author_posts_link();
                                            ?>
                                            <i class="fa fa-comments"></i><?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.top-part-wrap -->

                            <div class="post-content">
                                <?php echo wp_kses_post(remove_first_video_block(get_the_content())); ?>

                                <div class="pagelink">
                                    <?php wp_link_pages(); ?>
                                </div>
                                <?php get_template_part('template-meta'); ?>
                            </div><!-- /.post-content -->
                        </div><!-- /.frame -->
                    </div><!-- /.box -->
                </div><!-- /.post -->

            <?php endwhile; endif; ?>
        </div><!-- /.post-wrap -->

        <?php get_template_part('template-nav'); ?>

        <?php if (get_theme_mod('neomax_general_author_post') != true) {
            do_action('neomax_authorbox');
        } ?>

        <?php if (comments_open() || get_comments_number()) {
            comments_template();
        } ?>
    </div><!-- /#content -->

    

</div><!-- /#content-wrap -->
<?php if (!get_theme_mod('neomax_general_sidebar_post')) {
        get_sidebar();
    } ?>
<?php get_footer(); ?>
