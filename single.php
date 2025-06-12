<?php
/**
 * Single Post Template
 * @package neomax
 * @since neomax 1.0
 */
get_header();
?>


<?php
    $video_embed = get_first_video_embed();
$thumbnail_url = neomax_get_embed_thumbnail(get_the_ID(), 'maxresdefault');
if ($video_embed && $thumbnail_url):
?>

<div class="video-bg-wrapper" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
    <div class="movie-player-header">
        <div class="video-wrapper">
            <?php echo $video_embed; ?>
        </div>
            <div class="video-meta-wrap container">
                <?php if (has_category()) : ?>
                    <div class="video-categories">
                        <?php neomax_getCategory(); ?>
                    </div>
                <?php endif; ?>

                <h1 class="video-title"><?php the_title(); ?></h1>

                <div class="video-meta">
                    
                    <?php
                    $queried_post = get_queried_object();
                    if ($queried_post && isset($queried_post->post_author)) :
                        $author_id = $queried_post->post_author;
                        $author_name = get_the_author_meta('display_name', $author_id);
                        $author_url  = get_author_posts_url($author_id);
                        $author_avatar = get_avatar($author_id, 32, '', $author_name, ['class' => 'author-avatar']);
                    ?>
                        <span class="post-author">
                            <a href="<?php echo esc_url($author_url); ?>" title="<?php echo esc_attr($author_name); ?>">
                                <?php echo $author_avatar; ?>
                                <span class="author-name"><?php echo esc_html($author_name); ?></span>
                            </a>
                        </span>
                    <?php endif; ?>
                    <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>

                    <span class="post-comments">
                        <i class="fa fa-comments"></i> <?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax')); ?>
                    </span>
                    <div class="video-action-buttons">
                        <button class="share-toggle-btn"><i class="fas fa-share-alt"></i> Share</button>
                    </div>
                </div>
                <div class="share-icons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/intent/post?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Post on X"><i class="fab fa-x-twitter"></i></a>
                    <a href="https://wa.me/?text=<?php the_permalink(); ?>" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
                    <button class="copy-link-btn" title="Copy Link"><i class="fas fa-link"></i></button>
                    <span class="copy-confirmation" style="display:none;">Copied!</span>
                </div>
                

            </div>
                    </div>
        </div>
    <?php endif; ?>


<div id="content-wrap" class="clearfix">

    <div id="content" tabindex="-1" class="<?php echo (get_theme_mod('neomax_general_sidebar_post') == true) ? 'fullwidth' : ''; ?>">

        <?php if (!$video_embed) get_template_part('template-title'); ?>

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

                                <?php if (!$video_embed){ ?>
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
                                <?php } ?>
                            </div><!-- /.top-part-wrap -->

                            <div class="post-content">
                                <?php echo wp_kses_post(remove_first_video_block(get_the_content())); ?>

                                <div class="pagelink">
                                    <?php wp_link_pages(); ?>
                                </div>

                                <?php get_template_part('template-meta'); ?>
                            </div>

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

