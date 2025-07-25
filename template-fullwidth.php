<?php
/**
 * Template Name: Neomax Fullwidth Page
 * Description: A fullwidth layout without sidebar.
 *
 * @package neomax
 * @since neomax 1.0
 */

get_header(); ?>

<div id="content-wrap" class="clearfix fullwidth-page">
    <div id="content" class="fullwidth" tabindex="-1">

        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class('fullwidth-article'); ?>>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail( 'neomax-large-image' ); ?>
                    </div>
                <?php endif; ?>

                <h1 class="page-title"><?php the_title(); ?></h1>

                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </article>

            <?php if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif; ?>

        <?php endwhile; ?>

    </div>
</div>

<?php get_footer(); ?>
