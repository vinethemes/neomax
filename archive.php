<?php
/**
 * The archive template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package neomax
 * @since neomax 1.0
 */

get_header(); ?>


<div id="content-wrap" class="clearfix">
    <!--  slider -->


    <div id="content" tabindex="-1" class="post-list <?php if(get_theme_mod('neomax_general_sidebar_home') == true) : ?>fullwidth<?php endif; ?> ">
        <div class="theiaStickySidebar">

            <!-- layoutboxes code -->
            <?php get_template_part( 'layoutboxes' ); ?>
            <!-- layoutboxes code end -->


            <!-- post navigation -->
            <?php get_template_part( 'template-title' ); ?>

            <div class="post-wrap clearfix list">
                <?php if( is_home() ) { ?>
                    <?php if(get_theme_mod('neomax_latest_posts','Latest Posts')){ ?>
                        <h2><?php echo wp_kses_post(get_theme_mod('neomax_latest_posts','Latest Posts')) ?></h2>
                    <?php } } ?>

                <!-- load the posts -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div <?php post_class('post'); ?>>
                        <div class="box">

                            <?php if ( has_post_format( 'gallery' , $post->ID ) ) { ?>
                                <?php if ( function_exists( 'array_gallery' ) ) { array_gallery(); } ?>
                            <?php } ?>

                            <!-- load the video -->
                            <?php if ( get_post_meta( $post->ID, 'arrayvideo', true ) ) { ?>
                                <div class="arrayvideo">
                                    <?php echo esc_html(get_post_meta( $post->ID, 'arrayvideo', true )) ?>
                                </div>

                            <?php } else { ?>

                                <!-- load the featured image -->
                                <?php if ( has_post_thumbnail() ) { ?>


                                    <div class="featured-image-wrap"><a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'neomax-random-thumb' , array('loading' => 'lazy')); ?></a></div>


                                <?php } ?>

                            <?php } ?>


                            <div class="title-wrap <?php if(get_theme_mod('neomax_general_post_summary') == 'full') : ?>alignleft <?php endif; ?>">


                                <div class="post-metawrap">
                                    <?php neomax_getCategory(); ?>
                                    <div class="postcomment"><?php comments_popup_link( __( '0', 'neomax' ), __( '1', 'neomax' ), __( '%', 'neomax' ),'','' ); ?></div>
                                </div>

                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>


                                <?php

                                the_excerpt();

                                ?>



                            </div><!-- title wrap -->




                        </div><!-- box -->
                    </div><!-- post-->

                <?php endwhile; ?>
                <!-- post navigation -->
                <?php get_template_part( 'template-nav' ); ?>

            </div><!-- post wrap -->


            <?php else: ?>
        </div>
    </div><!-- content -->

    <?php endif; ?>
    <!-- end posts -->

    <!-- comments -->
    <?php if( is_single() && comments_open() ) {
        comments_template();
    } ?>
</div>
</div><!--content-->

<!-- load the sidebar -->
<?php if(!get_theme_mod('neomax_general_sidebar_home')) {
    get_sidebar();
} ?>
</div><!-- content wrap -->

<!-- load footer -->
<?php get_footer(); ?>
