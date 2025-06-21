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
$thumbnail_url = neomax_get_embed_thumbnail(get_the_ID());
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
                        <?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax')); ?>
                    </span>
                    <div class="video-action-buttons">
                        <button class="share-toggle-btn"><i class="fas fa-share-alt"></i> Share</button>
                    </div>
                </div>
                <div class="share-icons">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share on Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <!-- Twitter (X) -->
                    <a href="https://x.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Share on X (Twitter)">
                        <i class="fab fa-x-twitter"></i>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/?text=<?php the_permalink(); ?>" target="_blank" title="Share on WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                    <!-- Telegram -->
                    <a href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Share on Telegram">
                        <i class="fab fa-telegram-plane"></i>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="Share on LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <!-- Pinterest -->
                    <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>" target="_blank" title="Share on Pinterest">
                        <i class="fab fa-pinterest-p"></i>
                    </a>

                    <!-- Reddit -->
                    <a href="https://www.reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="Share on Reddit">
                        <i class="fab fa-reddit-alien"></i>
                    </a>

                    <!-- Tumblr -->
                    <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="Share on Tumblr">
                        <i class="fab fa-tumblr"></i>
                    </a>

                    <!-- Email -->
                    <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" title="Share via Email">
                        <i class="fas fa-envelope"></i>
                    </a>

                    <!-- Copy Link -->
                    <a class="copy-link-btn" title="Copy Link">
                        <i class="fas fa-link"></i>
                    </a>
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
                                            <?php comments_popup_link(__('0', 'neomax'), __('1', 'neomax'), __('%', 'neomax')); ?>
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

