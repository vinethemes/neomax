<?php
/**
 * Page not found template.
 *
 * @package neomax
 * @since neomax 1.0
 */

get_header(); ?>

		<div id="content-wrap" class="clearfix">
			<div id="content">
				<div class="post-wrap">
					<!-- load the posts -->
					<div class="post">
						<div class="box">
							<div class="frame">
								<div class="title-wrap">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e( '404 - Page Not Found', 'neomax' ); ?></a></h2>
								</div><!-- title wrap -->

								<div class="post-content">
									<p><?php esc_html_e( 'Sorry, but the page you are looking for has moved or no longer exists. Please use the search below, or the menu to locate the missing page.', 'neomax' ); ?></p>

									<?php get_search_form(); ?>
								</div><!-- post content -->
							</div><!-- frame -->
						</div><!-- box -->
					</div><!-- post-->
				</div><!-- post wrap -->
			</div><!-- content -->

			<!-- load the sidebar -->
			<?php get_sidebar(); ?>
		</div><!-- content wrap -->

		<!-- load footer -->
		<?php get_footer(); ?>
