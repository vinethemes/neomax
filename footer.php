<?php
/**
 * Template for displaying the footer.
 *
 * @package neomax
 * @since neomax 1.0
 */
?>

			<div id="footer" class="clearfix">

                <div id="footer-top">
                    <div class="containers">
                    <?php	/* Widget Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Top') ) ?>
                    </div>
                </div>



                <div id="insta_widget_footer">

                    <?php	/* Widget Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Instagram Footer') ) ?>

                </div>
                <div id='credits'>
                        <div class='to_top' title='Scroll To Top'><i class="fas fa-chevron-up"></i></div>
                    </div>
				<div class="footer-inside clearfix">
                    <div class="containers">



                    <div class="footer-area-wrap">
                    <?php	/* Widget */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Left') ) ?>
                    </div>
                    <div class="footer-area-wrap">
                    <?php	/* Widget */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Center') ) ?>
                    </div>
                    <div class="footer-area-wrap">
                    <?php	/* Widget */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Right') ) ?>
                    </div>


                    </div>
				</div><!-- footer-inside -->

			</div><!--footer-->
<div class="footer-copy clearfix">

    <p class="copyright"> <?php if(get_theme_mod('footer_copyright')): echo wp_kses_post(get_theme_mod('footer_copyright', 'Copyright &copy; 2025. All Rights Reserved.')); else: ?> <?php _e( 'Copyright &copy; 2025. All Rights Reserved.', 'neomax' ); ?> <?php endif; ?>  </p>

    <div class="theme-author">
        <?php if(get_theme_mod('footer_designed')): echo wp_kses_post(get_theme_mod('footer_designed')); else:

            ?> <?php _e( 'Designed by', 'neomax' ); ?> <a href="<?php echo esc_url( 'https://www.vinethemes.com/' ); ?>">
            <?php esc_html_e( 'VineThemes', 'neomax' ); ?>
        </a> <?php
        endif; ?>



    </div>
</div>
		</div><!-- main -->
	</div><!-- wrapper -->

	<?php wp_footer(); ?>

</body>
</html>
