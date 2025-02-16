<?php
/**
 * Search form template
 *
 * @package neomax
 * @since neomax 1.0
 */
?>
	
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'neomax' ); ?></label>
		<input type="text" class="field" placeholder="<?php esc_attr_e( 'Search','neomax' ); ?>"  name="s" value="<?php echo get_search_query(); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'neomax' ); ?>" />
	</form>