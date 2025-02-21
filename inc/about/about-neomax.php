<?php // About Neomax

// Add About Neomax Page
function neomax_about_page() {
    add_theme_page( esc_html__( 'About Neomax', 'neomax' ), esc_html__( 'About Neomax', 'neomax' ), 'edit_theme_options', 'about-neomax', 'neomax_about_page_output' );
}
add_action( 'admin_menu', 'neomax_about_page' );

// Render About neomax HTML
function neomax_about_page_output() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Welcome to Neomax!', 'neomax' ); ?></h1>
        <p class="welcome-text">
            <?php esc_html_e( 'Neomax is free Movie & Video Wordpress Theme. It\'s perfect for any kind of blog: movie, video, news, lifestyle, etc... Is fully Responsive and Retina Display ready, clean, modern and minimal. Coded with latest WordPress\' standards.', 'neomax' ); ?>
        </p>

        <!-- Tabs -->
        <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'neomax_tab_1'; ?>

        <div class="nav-tab-wrapper">
            <a href="<?php echo esc_url('?page=about-neomax&tab=neomax_tab_1')?>" class="nav-tab <?php echo $active_tab == 'neomax_tab_1' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Getting Started', 'neomax' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-neomax&tab=neomax_tab_2')?>" class="nav-tab <?php echo $active_tab == 'neomax_tab_2' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Recommended Plugins', 'neomax' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-neomax&tab=neomax_tab_3')?>" class="nav-tab <?php echo $active_tab == 'neomax_tab_3' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Support', 'neomax' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-neomax&tab=neomax_tab_4')?>" class="nav-tab <?php echo $active_tab == 'neomax_tab_4' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Free vs Premium', 'neomax' ); ?>
            </a>
        </div>

        <!-- Tab Content -->
        <?php if ( $active_tab == 'neomax_tab_1' ) : ?>

            <div class="three-columns-wrap">

                <br>

                <div class="column-wdith-3">
                    <h3><?php esc_html_e( 'Theme Documentation', 'neomax' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Neomax. It is worth to spend 10 minutes and know almost everything about the theme.', 'neomax' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/documentation/neomax-theme-documentation/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'neomax' ); ?></a>
                </div>


                <div class="column-wdith-3">
                    <h3><?php esc_html_e( 'Theme Customizer', 'neomax' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'neomax' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'neomax' ); ?></a>
                </div>

            </div>

            <div class="four-columns-wrap">

                <h2><?php esc_html_e( 'Neomax Premium - Predefined Styles', 'neomax' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Neomax Premium\'s powerful setup allows you to easily create unique looking sites. Here are a few included examples that can be installed with one click in the ', 'neomax' ); ?>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/'); ?>"><?php esc_html_e( 'Neomax Premium Theme.', 'neomax' ); ?></a>
                    <?php esc_html_e( 'More details in the theme Documentation.', 'neomax' ); ?>
                </p>

                <div class="column-wdith-4">
                    <div class="active-style"><?php esc_html_e( 'Active', 'neomax' ); ?></div>

                    <div>
                        <h2><?php esc_html_e( 'Version 1', 'neomax' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/neomax/'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'neomax' ); ?></a>
                    </div>
                </div>
                <div class="column-wdith-4">

                    <div>
                        <h2><?php esc_html_e( 'Version 2', 'neomax' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/neomax/?home=2'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'neomax' ); ?></a>
                    </div>
                </div>
                <div class="column-wdith-4">

                    <div>
                        <h2><?php esc_html_e( 'Version 3', 'neomax' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/neomax/?home=3'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'neomax' ); ?></a>
                    </div>
                </div>


            </div>

        <?php elseif ( $active_tab == 'neomax_tab_2' ) : ?>

            <div class="three-columns-wrap">

                <br>
                <p><?php esc_html_e( 'Recommended Plugins are fully supported by Neomax theme. They well build the theme by giving more and more features. These are highly recommended to install.', 'neomax' ); ?></p>
                <br>

                <?php


                // MailChimp
                neomax_recommended_plugin( 'mailchimp-for-wp', 'mailchimp-for-wp', esc_html__( 'Mailchimp', 'neomax' ), esc_html__( 'Mail newsletters. Simple but flexible.', 'neomax' ) );

                // Instagram Widget
                neomax_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', esc_html__( 'WP Instagram Widget', 'neomax' ), esc_html__( 'A WordPress widget for showing your latest Instagram photos.', 'neomax' ) );



                ?>


            </div>

        <?php elseif ( $active_tab == 'neomax_tab_3' ) : ?>

            <div class="three-columns-wrap">

                <br>

                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-sos"></span>
                        <?php esc_html_e( 'Forums', 'neomax' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'neomax' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/forums/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'neomax' ); ?></a>
                    </p>
                </div>

                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-book"></span>
                        <?php esc_html_e( 'Documentation', 'neomax' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Need more details? Please check out neomax Theme Documentation for detailed information.', 'neomax' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/documentation/neomax-theme-documentation/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'neomax' ); ?></a>
                    </p>
                </div>


                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-smiley"></span>
                        <?php esc_html_e( 'Donation', 'neomax' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Even a small sum can help us a lot with theme development. If the neomax theme is useful and our support is helpful, please don\'t hesitate to donate a little bit, at least buy us a Coffee or a Beer :)', 'neomax' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.paypal.me/oddthemes'); ?>"><?php esc_html_e( 'Donate with PayPal', 'neomax' ); ?></a>
                    </p>
                </div>

            </div>

        <?php elseif ( $active_tab == 'neomax_tab_4' ) : ?>

            <br><br>

            <table class="free-vs-pro form-table">
                <thead>
                <tr>
                    <th>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/'); ?>" target="_blank" class="button button-primary button-hero">
                            <?php esc_html_e( 'Get Neomax Premium', 'neomax' ); ?>
                        </a>

                    </th>
                    <th><?php esc_html_e( 'Neomax', 'neomax' ); ?></th>
                    <th><?php esc_html_e( 'Neomax Premium', 'neomax' ); ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <h3><?php esc_html_e( '100% Responsive and Retina Ready', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Translation Ready', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "neomax.pot" file included.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'MailChimp Support', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'The most popular email client plugin. Very simple but super flexible.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Image &amp; Text Logos', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Featured Posts Slider', 'neomax' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Showcase unlimited number of Blog Posts in header area. There are three Slider designs.', 'neomax' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Background Image/Color', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Set the custom body Background image or Color.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Header Background Image/Color', 'neomax' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Set the custom header Background image or Color.', 'neomax' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Instagram Widget Area', 'neomax' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Set your Instagram Images in the footer.', 'neomax' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>

                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Post Layouts', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Standard, List and Grid Blog Feed layout.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Right Sidebar', 'neomax' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Right Widgetised area.', 'neomax' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <!-- Only Pro -->
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Unlimited Colors', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( '800+ Google Fonts', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Grid Layout', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'List Layout', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Advanced Footer Options', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Theme and Author credit links in the footer are automatically removed.', 'neomax' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>


                <tr>
                    <td></td>
                    <td colspan="2">
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/'); ?>" target="_blank" class="button button-primary button-hero">
                            <?php esc_html_e( 'Get Neomax Premium', 'neomax' ); ?>
                        </a>
                        <br>

                    </td>
                </tr>
                </tbody>
            </table>

        <?php endif; ?>

    </div><!-- /.wrap -->
    <?php
} // end neomax_about_page_output

// Check if plugin is installed
function neomax_check_installed_plugin( $slug, $filename ) {
    return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function neomax_recommended_plugin( $slug, $filename, $name, $description) {

    if ( $slug === 'facebook-pagelike-widget' ) {
        $size = '128x128';
    } else {
        $size = '256x256';
    }

    ?>

    <div class="plugin-card">
        <div class="name column-name">
            <h3>
                <?php echo esc_html( $name ); ?>
                <img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
            </h3>
        </div>
        <div class="action-links">
            <?php if ( neomax_check_installed_plugin( $slug, $filename ) ) : ?>
                <button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'neomax' ); ?></button>
            <?php else : ?>
                <a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
                    <?php esc_html_e( 'Install Now', 'neomax' ); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="desc column-description">
            <p><?php echo esc_html( $description ); ?></p>
        </div>
    </div>

    <?php
}

// enqueue ui CSS/JS
function neomax_enqueue_about_page_scripts($hook) {

    if ( 'appearance_page_about-neomax' != $hook ) {
        return;
    }

    // enqueue CSS
    wp_enqueue_style( 'neomax-about-page-css', get_theme_file_uri( '/inc/about/css/about-neomax-page.css' ) );

}
add_action( 'admin_enqueue_scripts', 'neomax_enqueue_about_page_scripts' );