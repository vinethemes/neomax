<?php
/**
 * Template for displaying the footer.
 *
 * @package neomax
 * @since neomax 1.0
 */
?>

</div><!-- #main -->
</div><!-- #wrapper -->

<div id="footer" class="clearfix">

    <?php get_template_part('inc/sections/footer-slider'); ?>

    <div id="footer-top">
        <div class="containers">
            <?php if ( is_active_sidebar('Footer Top') ) dynamic_sidebar('Footer Top'); ?>
        </div>
    </div>

    <div id="insta_widget_footer">
        <?php if ( is_active_sidebar('Instagram Footer') ) dynamic_sidebar('Instagram Footer'); ?>
    </div>

    <div id="credits">
        <div class="to_top" title="Scroll To Top"><i class="fas fa-chevron-up"></i></div>
    </div>

    <div class="footer-inside clearfix">
        <div class="containers">
            <div class="footer-area-wrap">
                <?php if ( is_active_sidebar('Footer Left') ) dynamic_sidebar('Footer Left'); ?>
            </div>
            <div class="footer-area-wrap">
                <?php if ( is_active_sidebar('Footer Center') ) dynamic_sidebar('Footer Center'); ?>
            </div>
            <div class="footer-area-wrap">
                <?php if ( is_active_sidebar('Footer Right') ) dynamic_sidebar('Footer Right'); ?>
            </div>
        </div>
    </div><!-- .footer-inside -->

</div><!-- #footer -->

<div class="footer-copy clearfix">
    <p class="copyright">
        <?php echo wp_kses_post( get_theme_mod('footer_copyright', __('Copyright © 2025. All Rights Reserved.', 'neomax')) ); ?>
    </p>

    <div class="theme-author">
        <?php if(get_theme_mod('footer_designed')): ?>
            <?php echo wp_kses_post(get_theme_mod('footer_designed')); ?>
        <?php else: ?>
            Designed by <a href="<?php echo esc_url('https://www.vinethemes.com/'); ?>">
                <?php esc_html_e('VineThemes', 'neomax'); ?>
            </a>
        <?php endif; ?>
    </div>
</div>

<?php wp_footer(); ?>
<style>
    .slider-wrapper23 {
        visibility: visible;
        opacity: 1;
    }
</style>
</body>
</html>
