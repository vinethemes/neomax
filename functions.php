<?php
/**
 * neomax functions, scripts and styles.
 *
 * @package neomax
 * @since neomax 1.0
 */


if ( ! function_exists( 'neomax_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 * @since neomax 1.0
 */
function neomax_setup() {


	/* Add Customizer settings */
	require( get_template_directory() . '/customizer.php' );

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );
    //add_theme_support( 'custom-header' );



	/* Add editor styles */
	add_editor_style();

	/* Enable support for Post Thumbnails */
	add_theme_support( 'post-thumbnails' );

    add_image_size( 'neomax-full-thumb', 1080, 0, true );
    add_image_size( 'neomax-random-thumb', 550, 550, true );
    add_image_size( 'neomax-after-thumb', 250, 250, true );
    add_image_size('neomax-thumb', 200, 120, true);

    set_post_thumbnail_size( 150, 150, true ); // Default Thumb

    add_theme_support( "title-tag" );
    add_image_size( 'neomax-large-image', 9999, 9999, false  );// Large Post Image
    add_image_size( 'neomax-medium-image', 600, 600, true  );// Large Post Image
    add_image_size( 'neomax-slider-image', 900, 600, true  );// Large Post Image
    add_image_size( 'neomax-featured-image', 150, 150, false  );// Large Post Image
    add_image_size( 'neomax-small-image', 715, 500, false  );// Large Post Image
    add_image_size( 'neomax-widget-small-thumb', 100, 100, true  );// Large Post Image
	/* Custom Background Support */
	add_theme_support( 'custom-background' );

        $args = array(
            'width'         => 2000,
            'height'        => 300,

        );
        add_theme_support( 'custom-header', $args );


       add_theme_support('custom-logo', array(
           'size' => 'neomax-thumb'
       ));


    add_action('after_setup_theme', 'neomax_setup');



	/* Register Menu */
	register_nav_menus( array(
		'main' 		=> __( 'Main Menu', 'neomax' )
	) );

	/* Make theme available for translation */
	load_theme_textdomain( 'neomax', get_template_directory() . '/languages' );

	/* Add gallery format and custom gallery support */
	add_theme_support( 'post-formats', array( 'gallery' ) );
	add_theme_support( 'array_themes_gallery_support' );

	// Add support for legacy widgets
	add_theme_support( 'array_toolkit_legacy_widgets' );

	// Theme Activation Notice
    global $pagenow;

    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
        add_action( 'admin_notices', 'neomax_activation_notice' );
    }
}
endif; // neomax_setup
add_action( 'after_setup_theme', 'neomax_setup' );


/* Enqueue scripts and styles */
function neomax_scripts() {

	$version = wp_get_theme()->Version;

	//Main Stylesheet
	wp_enqueue_style( 'neomax-style', get_stylesheet_uri() );

	//Font Awesome
    wp_enqueue_style( 'neomax-font-awesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css', array(), '5.15.4', 'screen' );
    //grid css

	//Fitvids
	wp_enqueue_script( 'neomax-jquery-fitvids', get_template_directory_uri() . '/includes/js/fitvid/jquery.fitvids.js', array( 'jquery' ), '1.0.3', true );

	//matchheight
    wp_enqueue_script( 'neomax-jquery-matchheight', get_template_directory_uri() . '/includes/js/matchheight/matchheight.js', array( 'jquery' ), $version, true );

    //micromodal
    wp_enqueue_script( 'neomax-jquery-micromodal', get_template_directory_uri() . '/includes/js/micromodal/micromodal.js', array( 'jquery' ), $version, true );

    //outline.js
    wp_enqueue_script( 'neomax-jquery-outline', get_template_directory_uri() . '/includes/js/outline/outline.js', array( 'jquery' ), $version, true );

    //Custom Scripts
	wp_enqueue_script( 'neomax-custom-js', get_template_directory_uri() . '/includes/js/custom/custom.js', array( 'jquery' ), $version, true );

    //Load More Scripts
    wp_enqueue_script( 'neomax-load-more-js', get_template_directory_uri() . '/includes/js/custom/load-more-script.js', array( 'jquery' ), $version, true );


    //Slickslider
    wp_enqueue_script( 'neomax-slickslider-js', get_template_directory_uri() . '/includes/js/slickslider/slick.min.js', array( 'jquery' ), '1.8.0', true );

    //Theiastickysidebar
    wp_enqueue_script( 'neomax-resizesensor-js', get_template_directory_uri() . '/includes/js/theiastickysidebar/ResizeSensor.min.js', array( 'jquery' ), '1.5.0', true );

    wp_enqueue_script( 'neomax-theiastickysidebar-js', get_template_directory_uri() . '/includes/js/theiastickysidebar/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.5.0', true );


    wp_enqueue_script( 'neomax-jquery-slicknav', get_template_directory_uri() . '/includes/js/slicknav/jquery.slicknav.min.js', array( 'jquery' ), $version, true );


    wp_register_style('neomax-responsive', get_template_directory_uri() . '/css/responsive.css');

    if(!get_theme_mod('neomax_general_responsive')) {
        wp_enqueue_style('neomax-responsive');
    }

	//HTML5 IE Shiv
	wp_enqueue_script( 'neomax-jquery-htmlshiv', get_template_directory_uri() . '/includes/js/html5/html5shiv.js', array(), '3.7.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'neomax_scripts' );

function neomax_darkmode_script() {
    wp_enqueue_script('neomax-darkmode-script', get_template_directory_uri() . '/includes/js/darkmode/darkmode.js', array('jquery'), '1.0', true);

    // Pass the ajax_url to script.js
    wp_localize_script('neomax-darkmode-script', 'neomax_darkmode_script_vars', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'neomax_darkmode_script');



function neomax_excerpt_more( $more ) {
    if ( !is_admin()) {
        return '...';
    }
}
add_filter('excerpt_more', 'neomax_excerpt_more');



// Widgets
include(get_template_directory() . '/inc/widgets/about_widget.php');
include(get_template_directory() . '/inc/widgets/category_post_widget.php');

/* Set the content width */
if ( ! isset( $content_width ) )
	$content_width = 690; /* pixels */


/* Register sidebars */
function neomax_register_sidebars() {

    register_sidebar( array(
        'name'          => __( 'Below Slider', 'neomax' ),
        'id'            => 'below-slider',
        'description'   => __( 'This widget area is for Newsletter, Ads, Most popular widgets, etc.', 'neomax' ),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="below-slider">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'neomax' ),
        'id'            => 'sidebar',
        'description'   => __( 'Widgets in this area will be shown on the sidebar of all pages.', 'neomax' ),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget'  => '</div>',
    ) );
    register_sidebar(array(
        'name' => __('Footer Top','neomax'),
        'id' => 'footer-top',
        'before_widget' => '<div id="%1$s" class="footer-top %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-top-title">',
        'after_title' => '</h4>',
        'description' => __('Use the "Footer Top" widget here.','neomax')
    ));
    register_sidebar(array(
        'name' => __('Instagram Footer','neomax'),
        'id' => 'sidebar-2',
        'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="instagram-title">',
        'after_title' => '</h4>',
        'description' => __('Use the "Instagram" widget here. IMPORTANT: For best result set number of photos to 8.','neomax')
    ));

    register_sidebar( array(
        'name'          => __( 'Footer Left', 'neomax' ),
        'id'            => 'footer-left',
        'description'   => __( 'This widget area is for Footer Widgets.', 'neomax' ),
        'before_widget' => '<div id="%1$s" class="footerleft widget clearfix %2$s">',
        'after_widget' => '</div>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Center', 'neomax' ),
        'id'            => 'footer-center',
        'description'   => __( 'This widget area is for Footer Widgets.', 'neomax' ),
        'before_widget' => '<div id="%1$s" class="footercenter widget clearfix %2$s">',
        'after_widget' => '</div>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Right', 'neomax' ),
        'id'            => 'footer-right',
        'description'   => __( 'This widget area is for Footer Widgets.', 'neomax' ),
        'before_widget' => '<div id="%1$s" class="footerright widget clearfix %2$s">',
        'after_widget' => '</div>'
    ) );
}
add_action( 'widgets_init', 'neomax_register_sidebars' );


// Notice after Theme Activation
function neomax_activation_notice() {
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p>'. esc_html__( 'Thank you for choosing Neomax! Now, we highly recommend you to visit our welcome page.', 'neomax' ) .'</p>';
    echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=about-neomax' ) ) .'" class="button button-primary">'. esc_html__( 'Get Started with Neomax', 'neomax' ) .'</a></p>';
    echo '</div>';
}


/* Custom Excerpt Length only for List Post on Homepage */


    function neomax_custom_excerpt_length( $length ) {
        if ( !is_admin()) {
            return 40;
        }
    }
    add_filter('excerpt_length', 'neomax_custom_excerpt_length', 999);







/* Custom Comment Output */
function neomax_comments( $comment, $args, $depth ) {
	 ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">

		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">
				<div class="comment-neomax vcard clearfix">
					<?php echo get_avatar( $comment->comment_neomax_email, 75 ); ?>

					<div class="comment-meta commentmetadata">
						<?php /* translators: %s: comment author link */ printf(__('<cite class="fn">%s</cite>', 'neomax'), get_comment_author_link()) ?>
                        <a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php /* translators: %s: comment date */ printf(__('%1$s at %2$s', 'neomax'), get_comment_date(),  get_comment_time()) ?></a>
					</div>


				</div>
			</div><!-- comment info -->

			<div class="comment-text">
				<?php comment_text() ?>

				<div class="comment-bottom">

					<?php edit_comment_link(__('Edit', 'neomax'),' ', '' ) ?>

				</div>
			</div><!-- comment text -->
            <p class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
            </p>
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'neomax') ?></em>
			<?php endif; ?>
		</div>
<?php
}

function neomax_cancel_comment_reply_button( $html, $link, $text ) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<div id="cancel-comment-reply-link"' . $style . '>';
    return $button . '<i class="fa fa-times"></i> </div>';
}

add_action( 'cancel_comment_reply_link', 'neomax_cancel_comment_reply_button', 10, 3 );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */



/**
 * Sets the neomaxdata global when viewing an author archive.
 *
 * It removes the need to call the_post() and rewind_posts() in an neomax
 * template to print information about the neomax.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function neomax_setup_neomax() {
	global $wp_query;

	if ( $wp_query->is_neomax() && isset( $wp_query->post ) ) {
		$GLOBALS['neomaxdata'] = get_userdata( $wp_query->post->post_neomax );
	}
}
add_action( 'wp', 'neomax_setup_neomax' );


/**
 * Return the Google font stylesheet URL
 */
function neomax_add_google_fonts() {
    wp_enqueue_style( 'neomax-poppins-display-google-webfonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap', false );
    wp_enqueue_style( 'neomax-open-sans-google-webfonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'neomax_add_google_fonts' );

/* Start Category Count in Span */

add_filter('wp_list_categories', 'neomax_cat_count_span');
function neomax_cat_count_span($links) {
    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* End Category Count in Span */


/* Start Archive Count in Span */

add_filter('get_archives_link', 'neomax_archive_count_span');
function neomax_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="archiveCount">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* End Archive Count in Span */

function neomax_wpb_author_info_box( $content ) {

global $post;

// Detect if it is a single post with a post author
if ( is_single() && isset( $post->post_author ) ) {

// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );

// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );

// Get author's biographical information or description
$user_description = get_the_author_meta( 'user_description', $post->post_author );

// Get author's website URL 
$user_website = get_the_author_meta('url', $post->post_author);

// Get link to the neomax archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

    $author_details='';

if ( ! empty( $user_description ) )
// author avatar and bio

    $author_details = '<p class="neomax_details">' . get_avatar( get_the_author_meta('user_email') , 160 ) . '</p>';

if ( ! empty( $display_name ) ) {


    $author_details .= '<div class="neomax_author">' . __('Posted By', 'neomax') . '</div>';

    $author_details .= '<p class="neomax_name">' . '<a href="' . esc_url($user_posts) . '">' . esc_html($display_name) . '</a></p><p>' . nl2br($user_description) . '</p>';
}

// Pass all this info to post content  
$content = $content . '<footer class="neomax_bio_section" >' . $author_details . '</footer>';
}
echo $content;
}

function neomax_getCategory()
{
    $category = get_the_category();
    $useCatLink = true;
    // If post has a category assigned.
    if ($category) {
        $category_display = '';
        $category_link = '';
        if (class_exists('WPSEO_Primary_Term')) {
            $wpseo_primary_term = new WPSEO_Primary_Term('category', get_the_id());
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term($wpseo_primary_term);
            if (is_wp_error($term)) {
                // Default to first category if an error is returned
                $category_display = $category[0]->name;
                $category_link = get_category_link($category[0]->term_id);
            } else {
                // Primary category
                $category_display = $term->name;
                $category_link = get_category_link($term->term_id);
            }
        } else {
            // Default, display the first category in WP's list of assigned categories
            $category_display = $category[0]->name;
            $category_link = get_category_link($category[0]->term_id);

        }

        // Display category
        if (!empty($category_display)) {
            if ($useCatLink == true && !empty($category_link)) {
                echo '<span class="post-category">';
                echo '<a href="' . esc_url($category_link) . '">' . esc_html($category_display) . '</a>';

                echo '</span>';
            } else {
                echo '<span class="post-category">' . esc_html($category_display) . '</span>';
            }
        }

    }
}

//theme options
include(get_template_directory() . '/neomax_custom_controller.php');
include(get_template_directory() . '/customizer_style.php');




if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

// Add our function to the post content filter 
add_action( 'neomax_authorbox', 'neomax_wpb_author_info_box' );

require get_template_directory() . '/tgm-plugin-activation.php';


// About Neomax
require get_parent_theme_file_path( '/inc/about/about-neomax.php' );


add_action( 'wp_footer', function () {   if( !is_admin() ) {  ?>
    <script id="neomax-ajax-pagination-main-js-js-extra">
        if ( document.querySelector("#neomax-ajax-pagination") ) {
            var neomaxSettings = {"1":{"theme_defaults":"Twenty Sixteen","posts_wrapper":posts_wrapper,"post_wrapper":post_wrapper,"pagination_wrapper":pagination_wrapper,"next_page_selector":next_page_selector,"paging_type":"load-more","infinite_scroll_buffer":"20","ajax_loader":"<img src=\"<?php echo esc_url(get_template_directory_uri() . '/images/loading.gif'); ?>\" alt=\"AJAX Loader\" />","load_more_button_text":"Load More","loading_more_posts_text":"Loading...","callback_function":""}}};
    </script>
<?php  } } );





