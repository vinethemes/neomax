<?php
    /**
     *
     * Displays all of the <head> section and everything before <div id="content-wrap">
     *
     * @package neomax
     * @since neomax 1.0
     */
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <?php if ( is_singular() && pings_open() ) { ?>
            <link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>" />
        <?php } ?>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <div id="dark-mode-toggle"><i class="fa fa-moon"></i></div>
    <?php
    //wp_body_open hook from WordPress 5.2
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    else { do_action( 'wp_body_open' ); }
    ?>
    <a class="skip-link" href="#content"><?php _e( 'Skip to main content', 'neomax' ); ?></a>
    <?php if(get_theme_mod('neomax_information_bar_disable','disable')!= 'disable'){ ?>

        <div class="information-bar">
            <div class="container">
                <?php if(get_theme_mod('neomax_information_link')){ ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'neomax_information_link' ) ); ?>"><?php
                        if (!get_theme_mod('neomax_information_text')){
                            _e( 'Subscribe to our Newsletter', 'neomax' );
                        }
                        else{
                            echo wp_kses_post(get_theme_mod('neomax_information_text'));
                        } ?></a>
                <?php }
                else {
                    if (!get_theme_mod('neomax_information_text')){
                        _e( 'Subscribe to our Newsletter', 'neomax' );
                    }
                    else{
                        echo wp_kses_post(get_theme_mod('neomax_information_text'));
                    }

                } ?>
                <div class="close"><i class="fa fa-times"></i></div>
            </div>
        </div>
    <?php } ?>


        <div class="neomax-top-bar header1">
            <div class="header1wrap">
                <a class="toggle" href="#"><i class="fa fa-bars"></i></a>
            <div class="header-inside clearfix">



                <div class="hearder-holder">



                    <?php if( is_front_page() && is_home() ) { ?>

                        <div class="logo-default">
                            <div class="logo-text">

                                <?php
                                $light_logo = get_theme_mod('neomax_light_logo');
                                $dark_logo = get_theme_mod('neomax_dark_logo');

                                if ($light_logo || $dark_logo) {
                                    $light_logo_dimensions = $light_logo ? getimagesize($light_logo) : false;
                                    $dark_logo_dimensions = $dark_logo ? getimagesize($dark_logo) : false;
                                    ?>
                                    <a class="lightlogo" href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo $light_logo ? esc_url($light_logo) : ''; ?>" alt="<?php esc_attr_e('Light Header image', 'neomax'); ?>" width="<?php echo $light_logo_dimensions[0]; ?>" height="<?php echo $light_logo_dimensions[1]; ?>" />
                                    </a>
                                    <a class="darklogo" href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo $dark_logo ? esc_url($dark_logo) : ''; ?>" alt="<?php esc_attr_e('Dark Header image', 'neomax'); ?>" width="<?php echo $dark_logo_dimensions[0]; ?>" height="<?php echo $dark_logo_dimensions[1]; ?>" />
                                    </a>
                                    <?php if (display_header_text()) { ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                        <span class="site-description"><?php bloginfo('description'); ?></span>
                                    <?php }
                                }

                                else {

                                if (display_header_text() == true){
                                ?>
                                <span class="only-text">
                                <h1>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                                <span><?php bloginfo('description') ?></span>
                                </span>
                                <?php
                                }
                                }
                                ?><!-- otherwise show the site title and description -->

                            </div>

                        </div>

                    <?php } else { ?>

                        <div class="logo-default">
                            <div class="logo-text">

                                <?php
                                $light_logo = get_theme_mod('neomax_light_logo');
                                $dark_logo = get_theme_mod('neomax_dark_logo');

                                if ($light_logo || $dark_logo) {
                                    $light_logo_dimensions = $light_logo ? getimagesize($light_logo) : false;
                                    $dark_logo_dimensions = $dark_logo ? getimagesize($dark_logo) : false;
                                    ?>
                                    <a class="lightlogo" href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo $light_logo ? esc_url($light_logo) : ''; ?>" alt="<?php esc_attr_e('Light Header image', 'neomax'); ?>" width="<?php echo $light_logo_dimensions[0]; ?>" height="<?php echo $light_logo_dimensions[1]; ?>" />
                                    </a>
                                    <a class="darklogo" href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo $dark_logo ? esc_url($dark_logo) : ''; ?>" alt="<?php esc_attr_e('Dark Header image', 'neomax'); ?>" width="<?php echo $dark_logo_dimensions[0]; ?>" height="<?php echo $dark_logo_dimensions[1]; ?>" />
                                    </a>
                                    <?php if (display_header_text()) { ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                        <span class="site-description"><?php bloginfo('description'); ?></span>
                                    <?php }
                                }

                                else {

                                if (display_header_text() == true){
                                ?>
                                <h2>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a>
                                </h2>
                                <span><?php bloginfo('description') ?></span>
                                <?php
                                }
                                }
                                ?><!-- otherwise show the site title and description -->

                            </div>

                        </div>

                    <?php } ?>



                    <?php if ( has_header_image() ) { ?>
                        <img src="<?php header_image(); ?>" class="header-image" alt="<?php esc_attr_e( 'Header image','neomax' ); ?>" />
                    <?php } ?>

                </div>

            </div><!-- header inside -->
            <div class="menu-wrap">

                <?php if ( has_nav_menu( 'main' ) ) { ?>
                    <div class="top-bar">
                        <div class="menu-wrap-inner">
                            <?php
  wp_nav_menu( array(
    'theme_location' => 'main',
    'menu_class'     => '', // Optional: remove WP-added class
    'container'      => 'nav',
    'container_id'   => 'main-nav',
    'depth'          => 3, // Allows multi-level nesting
    'fallback_cb'    => false,
  ) );
  ?>
                        </div>
                    </div><!-- top bar -->
                <?php } ?>

                <div class="social-links">

                    <div class="socials">
                        <?php if(!get_theme_mod('neomax_general_search_icon')) : ?>
                            <button class="button ct_icon search" id="open-trigger" aria-label="Search">
                                <i class="fa fa-search"></i>
                            </button>

                            <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">

                                        <main class="modal__content" id="modal-1-content">
                                            <div id="modal-1-content">
                                                <?php get_search_form(); ?>
                                            </div>
                                        </main>

                                    </div>
                                    <button class="button" id="close-trigger" aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>


            </div>
            </div>

        </div><!-- top bar -->
        
    <div id="wrapper" class="clearfix">


            <div id="main" class="clearfix">
