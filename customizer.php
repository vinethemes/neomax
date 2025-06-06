<?php
    /**
     * Theme options via the Customizer.
     *
     * @package neomax
     * @since neomax 1.0
     */

    // ------------- Theme Customizer  ------------- //

    add_action( 'customize_register', 'neomax_customizer_register' );

    function neomax_customizer_register( $wp_customize ) {



// Pro Version
        class Neomax_Customize_Pro_Version extends WP_Customize_Control {
            public $type = 'pro_options';

            public function render_content() {
                echo '<span>Upgrade to <strong></strong></span>';
                echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<strong> '. esc_html__( 'Neomax Premium', 'neomax' ) .'<strong></a>';
                echo '</a>';
            }
        }

        // Pro Version Links
        class Neomax_Customize_Pro_Version_Links extends WP_Customize_Control {
            public $type = 'pro_links';

            public function render_content() {
                ?>
                <ul>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Upgrade', 'neomax' ); ?> <span>*</span></h3>
                        <p><?php esc_html_e( 'There are lots of reasons to upgrade to Pro version. Unlimited custom Colors, rich Typography options, multiple variation of Blog Feed layout and way much more. Also Premium Support included.', 'neomax' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Get Neomax Premium', 'neomax' ); ?></a>
                    </li>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Documentation', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'Read how to customize the theme, set up widgets, and learn all the possible options available to you.', 'neomax' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/documentation/neomax-theme-documentation/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Documentation', 'neomax' ); ?></a>
                    </li>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Support', 'neomax' ); ?></h3>
                        <p><?php esc_html_e( 'For Neomax theme related questions feel free to post on our support forums.', 'neomax' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/forums'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Support', 'neomax' ); ?></a>
                    </li>

                </ul>
                <?php
            }
        }


        /*
        ** Pro Version =====
        */

        // add Colors section
        $wp_customize->add_section( 'neomax_pro' , array(
            'title'		 => esc_html__( 'About Neomax', 'neomax' ),
            'priority'	 => 1,
            'capability' => 'edit_theme_options'
        ) );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version_Links ( $wp_customize,
                'pro_version_', array(
                    'section'	=> 'neomax_pro',
                    'type'		=> 'pro_links',
                    'label' 	=> '',
                    'priority'	=> 1
                )
            )
        );

        // Light and Dark Logo
        $wp_customize->remove_control('custom_logo');
        $wp_customize->add_setting( 'neomax_light_logo', array(
            // Image setting don't have anything in it, otherwise it will not get saved.
            'sanitize_callback' => 'neomax_sanitize_image'
        ) );

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'neomax_light_logo1', array(
                    'label'    => esc_html__( 'Light Logo', 'neomax' ),
                    'section'  => 'title_tagline',
                    'settings' => 'neomax_light_logo'
                )
            )
        );

        $wp_customize->add_setting( 'neomax_dark_logo', array(
            // Image setting don't have anything in it, otherwise it will not get saved.
            'sanitize_callback' => 'neomax_sanitize_image'
        ) );
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'neomax_dark_logo1', array(
                    'label'    => esc_html__( 'Dark Logo', 'neomax' ),
                    'section'  => 'title_tagline',
                    'settings' => 'neomax_dark_logo'
                )
            )
        );



        //Top Information Bar
        $wp_customize->add_section( 'neomax_information_bar', array(
            'title'       => esc_html__( 'Top Information Bar', 'neomax' ),
            'description' => esc_html__( 'To change Background Colors Upgrade to Premium version', 'neomax' ),
            'priority'    => 2
        ) );


        $wp_customize->add_setting( 'neomax_information_bar_disable', array(
            'default'    => 'disable',
            'section'  => 'neomax_information_bar',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_radio',
        ) );

        $wp_customize->add_control( 'neomax_information_bar_select_box', array(
            'settings' => 'neomax_information_bar_disable',
            'label'    => esc_html__( 'Top Information Bar', 'neomax' ),
            'section'  => 'neomax_information_bar',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'neomax' ),
                'disable' => esc_html__( 'Disable', 'neomax' ),
            ),
            'priority' => 1
        ) );

        $wp_customize->add_setting(
            'neomax_information_text',
            array(
                'default'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control('neomax_information_text', array(
                'label'      => esc_html__('Information Bar Text','neomax'),
                'section'    => 'neomax_information_bar',
                'settings'   => 'neomax_information_text',
                'type'		 => 'text',
                'priority'	 => 2
            )
        );


        $wp_customize->add_setting(
            'neomax_information_link',
            array(
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control('neomax_information_link', array(
                'label'      => esc_html__('Information Bar Link URL','neomax'),
                'section'    => 'neomax_information_bar',
                'settings'   => 'neomax_information_link',
                'type'		 => 'url',
                'priority'	 => 3
            )
        );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors8', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors8', array(
                    'section'	  => 'neomax_information_bar',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );



        //Top Information Bar


        // Header Design
        $wp_customize->add_section( 'neomax_header_designs', array(
            'title'       => esc_html__( 'Header Designs', 'neomax' ),
            'description' => esc_html__( 'Select Header Designs from here.', 'neomax' ),
            'priority'    => 3
        ) );

        $wp_customize->add_setting( 'neomax_header_design_layout', array(
            'default' => 'header1',
            'section'  => 'neomax_header_designs',
            'sanitize_callback'	=> 'neomax_sanitize_radio',
        ) );
        $wp_customize->add_control( 'neomax_header_design_layout', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Header Design Layout', 'neomax' ),
            'section'  => 'neomax_header_designs',
            'choices'  => array(
                'header1'  => esc_html__( 'Header 1', 'neomax' ),
                'header2' => esc_html__( 'Header 2', 'neomax' ),
            ),
            'priority' => 10
        ) );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors7', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors7', array(
                    'section'	  => 'neomax_header_designs',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );

        //Header Design



        //Slick Slider
        $wp_customize->add_section( 'neomax_customizer_mainslider', array(
            'title'       => esc_html__( 'Main Slider Options', 'neomax' ),
            'description' => esc_html__( 'Configure your Main Slider here.', 'neomax' ),
            'priority'    => 4
        ) );
        $wp_customize->add_setting( 'neomax_customizer_mainslider_disable', array(
            'default'    => 'enable',
            'section'  => 'neomax_customizer_mainslider',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_radio',
        ) );

        $wp_customize->add_control( 'neomax_mainslider_select_box', array(
            'settings' => 'neomax_customizer_mainslider_disable',
            'label'    => esc_html__( 'Homepage Main Slider', 'neomax' ),
            'section'  => 'neomax_customizer_mainslider',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'neomax' ),
                'disable' => esc_html__( 'Disable', 'neomax' ),
            ),
            'priority' => 5
        ) );
        $wp_customize->add_setting( 'neomax_mainslider_category', array(
            'default' => '0',
            'sanitize_callback'	=> 'absint',
            'section'  => 'neomax_customizer_mainslider',

        ) );
        $wp_customize->add_control(new neomax_Customize_Category_Control( $wp_customize, 'neomax_mainslider_category', array(
                    'label'    => esc_html__( 'Category for Main Slider', 'neomax' ),
                    'section'  => 'neomax_customizer_mainslider',
                    'settings' => 'neomax_mainslider_category',
                    'priority'	 => 6
                )
            )
        );


        $wp_customize->add_setting( 'neomax_mainslider_slides', array(
            'default' => '3',
            'sanitize_callback'	=> 'absint',
            'section'  => 'neomax_customizer_mainslider',
        ) );

        $wp_customize->add_control( 'neomax_mainslider_slides', array(
                'label'      => esc_html__('Number of Posts for Main Slider','neomax'),
                'section'    => 'neomax_customizer_mainslider',
                'settings'   => 'neomax_mainslider_slides',
                'type'		 => 'number',
                'priority'	 => 8
            )
        );

        $wp_customize->add_setting( 'neomax_slider_designs', array(
            'default'    => 'Slider1',
            'section'  => 'neomax_customizer_mainslider',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_radio',
        ) );

        $wp_customize->add_control( 'neomax_slider_designs', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Slider Designs', 'neomax' ),
            'section'  => 'neomax_customizer_mainslider',
            'choices'  => array(
                'Slider1'  => esc_html__( 'Modern Slider', 'neomax' ),
                'Slider2' => esc_html__( 'Grid View (Only in Premium Version)', 'neomax' ),
                'Slider3' => esc_html__( 'Carousel (Only in Premium Version)', 'neomax' ),
            ),
            'priority' => 9
        ) );

        $wp_customize->add_setting( 'neomax_afterslider_category', array(
            'default' => '0',
            'sanitize_callback'	=> 'absint',
            'section'  => 'neomax_customizer_mainslider',

        ) );
        $wp_customize->add_control(new neomax_Customize_Category_Control( $wp_customize, 'neomax_afterslider_category', array(
                    'label'    => esc_html__( 'Category for After Slider Posts', 'neomax' ),
                    'section'  => 'neomax_customizer_mainslider',
                    'settings' => 'neomax_afterslider_category',
                    'priority'	 => 10
                )
            )
        );



        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors6', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors6', array(
                    'section'	  => 'neomax_customizer_mainslider',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


        //Small Slider
        $wp_customize->add_section( 'neomax_customizer_slider', array(
            'title'       => esc_html__( 'Small Slider Options', 'neomax' ),
            'description' => esc_html__( 'Configure your Small Slider here.', 'neomax' ),
            'priority'    => 5
        ) );
        $wp_customize->add_setting( 'neomax_customizer_slider_disable', array(
            'default'    => 'enable',
            'section'  => 'neomax_customizer_slider',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_radio',
        ) );

        $wp_customize->add_control( 'neomax_slider_select_box', array(
            'settings' => 'neomax_customizer_slider_disable',
            'label'    => esc_html__( 'Small Slider (Only in Premium Version)', 'neomax' ),
            'section'  => 'neomax_customizer_slider',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'neomax' ),
                'disable' => esc_html__( 'Disable', 'neomax' ),
            ),
            'priority' => 5
        ) );
        $wp_customize->add_setting( 'neomax_slider_category', array(
            'default' => '0',
            'sanitize_callback'	=> 'absint',
            'section'  => 'neomax_customizer_slider',

        ) );
        $wp_customize->add_control(new neomax_Customize_Category_Control( $wp_customize, 'neomax_slider_category', array(
                    'label'    => esc_html__( 'Category for Small Slider', 'neomax' ),
                    'section'  => 'neomax_customizer_slider',
                    'settings' => 'neomax_slider_category',
                    'priority'	 => 6
                )
            )
        );


        $wp_customize->add_setting( 'neomax_slider_category', array(
            'default' => '0',
            'sanitize_callback'	=> 'absint',
            'section'  => 'neomax_customizer_slider',

        ) );
        $wp_customize->add_control(new neomax_Customize_Category_Control( $wp_customize, 'neomax_slider_category', array(
                    'label'    => esc_html__( 'Category for Slider', 'neomax' ),
                    'section'  => 'neomax_customizer_slider',
                    'settings' => 'neomax_slider_category',
                    'priority'	 => 7
                )
            )
        );

        $wp_customize->add_setting( 'neomax_slider_slides', array(
            'default' => '4',
            'sanitize_callback'	=> 'absint',
            'section'  => 'neomax_customizer_slider',
        ) );

        $wp_customize->add_control( 'neomax_slider_slides', array(
                'label'      => esc_html__('Number of Posts for Small Slider','neomax'),
                'section'    => 'neomax_customizer_slider',
                'settings'   => 'neomax_slider_slides',
                'type'		 => 'number',
                'priority'	 => 8
            )
        );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors66', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors66', array(
                    'section'	  => 'neomax_customizer_slider',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );



        //General Options

        $wp_customize->add_section( 'neomax_general_options', array(
            'title'       => esc_html__( 'General Options', 'neomax' ),
            'description' => esc_html__( '(Load More Posts feature is only available in Premium Version. Upgrade to Premium version.)', 'neomax' ),
            'priority'    => 11
        ) );


        $wp_customize->add_setting('neomax_latest_posts', array(
            'default'     => 'Latest Posts',
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'latestposts_title', array(
                    'label'      => esc_html__('Latest Posts Title','neomax'),
                    'section'    => 'neomax_general_options',
                    'settings'   => 'neomax_latest_posts',
                    'type'		 => 'text',
                    'priority'	 => 5
                )
            )
        );



        $wp_customize->add_setting( 'neomax_general_search_icon', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_general_search_icon', array(
            'settings' => 'neomax_general_search_icon',
            'label'    => esc_html__( 'Hide Top Search Icon', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'neomax_general_responsive', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_general_responsive', array(
            'settings' => 'neomax_general_responsive',
            'label'    => esc_html__( 'Disable Responsive', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'neomax_border_radius', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_border_radius', array(
            'settings' => 'neomax_border_radius',
            'label'    => esc_html__( 'Disable Round Borders (Only in Premium Version)', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 7
        ) );
        $wp_customize->add_setting( 'neomax_loadmore', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_loadmore', array(
            'settings' => 'neomax_loadmore',
            'label'    => esc_html__( 'Load More Posts (Only in Premium Version)', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 7
        ) );
        $wp_customize->add_setting( 'neomax_general_sidebar_home', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_general_sidebar_home', array(
            'settings' => 'neomax_general_sidebar_home',
            'label'    => esc_html__( 'Disable Sidebar on Homepage and Archive Pages', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'neomax_general_sidebar_post', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_general_sidebar_post', array(
            'settings' => 'neomax_general_sidebar_post',
            'label'    => esc_html__( 'Disable Sidebar on Posts', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'neomax_general_sidebar_page', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_general_sidebar_page', array(
            'settings' => 'neomax_general_sidebar_page',
            'label'    => esc_html__( 'Disable Sidebar on Pages', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );

        $wp_customize->add_setting( 'neomax_general_author_post', array(
            'section'  => 'neomax_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'neomax_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'neomax_general_author_post', array(
            'settings' => 'neomax_general_author_post',
            'label'    => esc_html__( 'Disable Author Box on Posts', 'neomax' ),
            'section'  => 'neomax_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );


        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors2', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors2', array(
                    'section'	  => 'neomax_general_options',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


        // Footer Settings
        $wp_customize->add_section( 'neomax_footer_settings', array(
            'title'       => esc_html__( 'Footer Settings', 'neomax' ),
            'description' => esc_html__( 'Configure Your Footer Here. You can\'t change our footer links in the free version of this theme.', 'neomax' ),
             'priority'    => 12
        ) );

        $wp_customize->add_setting(
            'footer_copyright',
            array(
                'default'     => 'Copyright 2025.',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control('footer_copyright', array(
                    'label'      => esc_html__('Footer Copyright Text','neomax'),
                    'section'    => 'neomax_footer_settings',
                    'settings'   => 'footer_copyright',
                    'type'		 => 'text',
                    'priority'	 => 1
                )
        );


        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors3', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors3', array(
                    'section'	  => 'neomax_footer_settings',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


    }


// Adding controls to default customizer panel
    add_action('customize_register','neomax_customizer_options');
    /*
     * Add in our custom Main Color setting and control to be used in the Customizer in the Colors section
     *
     */
    function neomax_customizer_options( $wp_customize ) {




        $wp_customize->add_setting(
            'neomax_information_bar_bgcolor1', //give it an ID
            array(
                'default' => '#f16262', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neomax_information_bar_bgcolor1', //give it an ID
                array(
                    'label'      => esc_html__( 'Color1 (Only in Premium Version)', 'neomax' ), //set the label to appear in the Customizer
                    'section'    => 'neomax_information_bar', //select the section for it to appear under
                    'settings'   => 'neomax_information_bar_bgcolor1' //pick the setting it applies to
                )
            )
        );


        $wp_customize->add_setting(
            'neomax_information_bar_bgcolor2', //give it an ID
            array(
                'default' => '#3200ff', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neomax_information_bar_bgcolor2', //give it an ID
                array(
                    'label'      => esc_html__( 'Color2 (Only in Premium Version)', 'neomax' ), //set the label to appear in the Customizer
                    'section'    => 'neomax_information_bar', //select the section for it to appear under
                    'settings'   => 'neomax_information_bar_bgcolor2' //pick the setting it applies to
                )
            )
        );





        $wp_customize->add_setting(
            'neomax_main_color', //give it an ID
            array(
                'default' => '#3d55ef', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neomax_custom_main_color', //give it an ID
                array(
                    'label'      => esc_html__( 'Main Color', 'neomax' ), //set the label to appear in the Customizer
                    'section'    => 'colors', //select the section for it to appear under
                    'settings'   => 'neomax_main_color' //pick the setting it applies to
                )
            )
        );
        $wp_customize->add_setting(
            'neomax_main_text', //give it an ID
            array(
                'default' => '#3d55ef', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new Neomax_Customize_Pro_Version(
                $wp_customize,
                'neomax_custom_text', //give it an ID
                array(
                    'label'      => esc_html__( 'Upgrade', 'neomax' ), //set the label to appear in the Customizer
                    'section'    => 'colors', //select the section for it to appear under
                    'settings'   => 'neomax_main_text', //pick the setting it applies to
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                )
            )
        );



    }


function neomax_sanitize_image( $file, $setting ) {

    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );

    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );

    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}



    function neomax_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }


    //checkbox sanitization function
    function neomax_sanitize_checkbox( $input ){

        //returns true if checkbox is checked
        return (( isset( $input ) && true === $input ) ? true : false );
    }

    //radio box sanitization function
    function neomax_sanitize_radio( $input, $setting ){
    $valid = array(
        'Slider1' => 'Slider1',
        'Slider2' => 'Slider2',
        'Slider3' => 'Slider3',
        'excerpt' => 'excerpt',
        'full' => 'full',
        'standard' => 'standard',
        'grid' => 'grid',
        'enable' => 'enable',
        'disable' => 'disable',
        'header1' => 'header1',
        'header2' => 'header2',
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
    }

    function neomax_panels_js() {
        wp_enqueue_style( 'neomax-customizer-ui-css', get_theme_file_uri( '/customizer-ui.css' ) );
    }
    add_action( 'customize_controls_enqueue_scripts', 'neomax_panels_js' );
