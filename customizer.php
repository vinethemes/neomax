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
    public $message = ''; // New property

    public function render_content() {
        if ( ! empty( $this->message ) && ! empty( $this->description ) ) {
            echo '<p class="neomax-pro-upgrade-message">';
            echo esc_html( $this->message ) . ' ';
            echo '<a href="' . esc_url( $this->description ) . '" target="_blank">';
            echo '<strong>' . esc_html__( 'Neomax Premium', 'neomax' ) . '</strong>';
            echo '</a>';
            echo '</p>';
        }
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


      



        



        //Main Slider
        $wp_customize->add_section( 'neomax_customizer_mainslider', array(
            'title'       => esc_html__( 'Main Featured Slider', 'neomax' ),
            'description' => esc_html__( 'Configure your Main Featured Slider here.', 'neomax' ),
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
            'label'    => esc_html__( 'Homepage Main Featured Slider', 'neomax' ),
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
                    'label'    => esc_html__( 'Category for Main Featured Slider', 'neomax' ),
                    'section'  => 'neomax_customizer_mainslider',
                    'settings' => 'neomax_mainslider_category',
                    'priority'	 => 6
                )
            )
        );


        $wp_customize->add_setting( 'neomax_mainslider_slides', array(
            'default' => '12',
            'sanitize_callback'	=> 'absint',
            'section'  => 'neomax_customizer_mainslider',
        ) );

        $wp_customize->add_control(new neomax_Customize_Number_Control($wp_customize, 'neomax_mainslider_slides', array(
                    'label'      => esc_html__('Number of Posts for Main Featured Slider','neomax'),
                    'section'    => 'neomax_customizer_mainslider',
                    'settings'   => 'neomax_mainslider_slides',
                    'type'		 => 'number',
                    'priority'	 => 8
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
                    'message'     => esc_html__( 'Upgrade to Neomax Premium for more options - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


// Social Media Links
$wp_customize->add_section('neomax_social_section', array(
    'title'    => esc_html__('Social Links', 'neomax'),
    'priority' => 5,
));

$social_platforms = array(
    'facebook'  => 'Facebook',
    'twitter'   => 'Twitter (X)',
    'instagram' => 'Instagram',
    'youtube'   => 'YouTube',
    'telegram'  => 'Telegram',
    'tiktok'    => 'Tiktok',
    'linkedin'  => 'Linkedin',
    'pinterest' => 'Pinterest',
    'snapchat'  => 'Snapchat',
    'whatsapp'  => 'Whatsapp',
    'reddit'    => 'Reddit',
    'tumblr'    => 'Tumblr',
    'discord'   => 'Discord',
    'spotify'   => 'Spotify',
    'dribbble'  => 'Dribbble',
    'behance'   => 'Behance',
    'github'    => 'Github',
    'medium'    => 'Medium',
    'slack'     => 'Slack',
    'vk'        => 'Vk',
    'flickr'    => 'Flickr',
    'vimeo'     => 'Vimeo',
    'wechat'    => 'WeChat',
    'line'      => 'LINE',
);

foreach ($social_platforms as $slug => $label) {
    $wp_customize->add_setting("neomax_social_{$slug}", array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control("neomax_social_{$slug}", array(
        'label'   => sprintf( esc_html__( '%s URL', 'neomax' ), $label ),
        'section' => 'neomax_social_section',
        'type'    => 'url',
    ));
}


        // Submit Video Button
    $wp_customize->add_section('neomax_submit_video_section', array(
        'title' => __('Submit Video Button', 'neomax'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('neomax_submit_video_url', array(
        'default' => '/submit-video',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('neomax_submit_video_url_control', array(
        'label' => __('Submit Video URL', 'neomax'),
        'section' => 'neomax_submit_video_section',
        'settings' => 'neomax_submit_video_url',
        'type' => 'url',
    ));

    // Pro Version
        $wp_customize->add_setting( 'pro_version_submit_video', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_submit_video', array(
                    'section'	  => 'neomax_submit_video_section',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );



// Below Slider Grid (2-Row) Section
$wp_customize->add_section('neomax_below_slider_grid', array(
    'title'    => esc_html__('Below Slider - Grid 2-Row', 'neomax'),
    'priority' => 5,
));

// Enable/Disable
$wp_customize->add_setting('neomax_below_slider_enable', array(
    'default'           => 'enable',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('neomax_below_slider_enable', array(
    'label'   => esc_html__('Enable Section', 'neomax'),
    'section' => 'neomax_below_slider_grid',
    'type'    => 'select',
    'choices' => array(
        'enable'  => esc_html__('Enable', 'neomax'),
        'disable' => esc_html__('Disable', 'neomax'),
    ),
));
// === BELOW SLIDER SECTION TITLE ===
$wp_customize->add_setting('neomax_below_slider_title', array(
    'default'           => esc_html__('New Releases', 'neomax'),
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('neomax_below_slider_title', array(
    'label'       => esc_html__('Section Title', 'neomax'),
    'section'     => 'neomax_below_slider_grid',
    'type'        => 'text',
));
// Category
$wp_customize->add_setting('neomax_below_slider_category', array(
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control(new neomax_Customize_Category_Control($wp_customize, 'neomax_below_slider_category', array(
    'label'    => esc_html__('Select Category', 'neomax'),
    'section'  => 'neomax_below_slider_grid',
    'settings' => 'neomax_below_slider_category',
)));

// Number of Posts
$wp_customize->add_setting('neomax_below_slider_posts', array(
    'default'           => 10,
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control('neomax_below_slider_posts', array(
    'label'    => esc_html__('Number of Posts', 'neomax'),
    'section'  => 'neomax_below_slider_grid',
    'type'     => 'number',
    'input_attrs' => array('min' => 1, 'max' => 20),
));

        // Pro Version
        $wp_customize->add_setting( 'pro_version_slider_grid', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_slider_grid', array(
                    'section'	  => 'neomax_below_slider_grid',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );



// Large Poster Section
$wp_customize->add_section('neomax_large_poster_section', array(
    'title'    => esc_html__('Large Poster Section', 'neomax'),
    'priority' => 6,
));

// Enable/Disable
$wp_customize->add_setting('neomax_large_poster_enable', array(
    'default'           => 'enable',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('neomax_large_poster_enable', array(
    'label'   => esc_html__('Enable Section', 'neomax'),
    'section' => 'neomax_large_poster_section',
    'type'    => 'select',
    'choices' => array(
        'enable'  => esc_html__('Enable', 'neomax'),
        'disable' => esc_html__('Disable', 'neomax'),
    ),
));

// Category
$wp_customize->add_setting('neomax_large_poster_category', array(
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control(new neomax_Customize_Category_Control($wp_customize, 'neomax_large_poster_category', array(
    'label'    => esc_html__('Select Category', 'neomax'),
    'section'  => 'neomax_large_poster_section',
    'settings' => 'neomax_large_poster_category',
)));

// Number of Posts
$wp_customize->add_setting('neomax_large_poster_posts', array(
    'default'           => 1,
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control('neomax_large_poster_posts', array(
    'label'    => esc_html__('Number of Posts', 'neomax'),
    'section'  => 'neomax_large_poster_section',
    'type'     => 'number',
    'input_attrs' => array('min' => 1, 'max' => 5),
));
   // Pro Version
        $wp_customize->add_setting( 'pro_version_large_poster', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_large_poster', array(
                    'section'	  => 'neomax_large_poster_section',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );




// Highlight Slider Section
$wp_customize->add_section('neomax_highlight_slider', array(
    'title'    => esc_html__('Highlight Slider', 'neomax'),
    'priority' => 7,
));

// Enable/Disable
$wp_customize->add_setting('neomax_highlight_slider_enable', array(
    'default'           => 'enable',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('neomax_highlight_slider_enable', array(
    'label'   => esc_html__('Enable Section', 'neomax'),
    'section' => 'neomax_highlight_slider',
    'type'    => 'select',
    'choices' => array(
        'enable'  => esc_html__('Enable', 'neomax'),
        'disable' => esc_html__('Disable', 'neomax'),
    ),
));
$wp_customize->add_setting('neomax_highlight_slider_title', array(
    'default' => esc_html__('Action Sequences', 'neomax'),
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('neomax_highlight_slider_title', array(
    'label'   => esc_html__('Highlight Slider Section Title', 'neomax'),
    'section' => 'neomax_highlight_slider',
    'type'    => 'text',
));

// Category
$wp_customize->add_setting('neomax_highlight_slider_category', array(
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control(new neomax_Customize_Category_Control($wp_customize, 'neomax_highlight_slider_category', array(
    'label'    => esc_html__('Select Category', 'neomax'),
    'section'  => 'neomax_highlight_slider',
    'settings' => 'neomax_highlight_slider_category',
)));

// Number of Posts
$wp_customize->add_setting('neomax_highlight_slider_posts', array(
    'default'           => 6,
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control('neomax_highlight_slider_posts', array(
    'label'    => esc_html__('Number of Posts', 'neomax'),
    'section'  => 'neomax_highlight_slider',
    'type'     => 'number',
    'input_attrs' => array('min' => 1, 'max' => 12),
));
// Pro Version
        $wp_customize->add_setting( 'pro_version_highlight_slider', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_highlight_slider', array(
                    'section'	  => 'neomax_highlight_slider',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );



// Trending Grid Section
$wp_customize->add_section('neomax_trending_grid', array(
    'title'    => esc_html__('Trending Grid', 'neomax'),
    'priority' => 8,
));

// Enable/Disable
$wp_customize->add_setting('neomax_trending_grid_enable', array(
    'default'           => 'enable',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('neomax_trending_grid_enable', array(
    'label'   => esc_html__('Enable Section', 'neomax'),
    'section' => 'neomax_trending_grid',
    'type'    => 'select',
    'choices' => array(
        'enable'  => esc_html__('Enable', 'neomax'),
        'disable' => esc_html__('Disable', 'neomax'),
    ),
));
$wp_customize->add_setting('neomax_trending_grid_title', array(
    'default' => esc_html__('Trending Now', 'neomax'),
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('neomax_trending_grid_title', array(
    'label'   => esc_html__('Trending Grid Section Title', 'neomax'),
    'section' => 'neomax_trending_grid',
    'type'    => 'text',
));

// Category
$wp_customize->add_setting('neomax_trending_grid_category', array(
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control(new neomax_Customize_Category_Control($wp_customize, 'neomax_trending_grid_category', array(
    'label'    => esc_html__('Select Category', 'neomax'),
    'section'  => 'neomax_trending_grid',
    'settings' => 'neomax_trending_grid_category',
)));

// Number of Posts
$wp_customize->add_setting('neomax_trending_grid_posts', array(
    'default'           => 10,
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control('neomax_trending_grid_posts', array(
    'label'    => esc_html__('Number of Posts', 'neomax'),
    'section'  => 'neomax_trending_grid',
    'type'     => 'number',
    'input_attrs' => array('min' => 1, 'max' => 20),
));
// Pro Version
        $wp_customize->add_setting( 'pro_version_trending_grid', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_trending_grid', array(
                    'section'	  => 'neomax_trending_grid',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


// Footer Related Posts Slider
$wp_customize->add_section('neomax_footer_related_slider', array(
    'title'    => esc_html__('Footer Related Posts Slider', 'neomax'),
    'priority' => 9,
));

// Enable/Disable
$wp_customize->add_setting('neomax_footer_related_enable', array(
    'default'           => 'enable',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('neomax_footer_related_enable', array(
    'label'   => esc_html__('Enable Slider', 'neomax'),
    'section' => 'neomax_footer_related_slider',
    'type'    => 'select',
    'choices' => array(
        'enable'  => esc_html__('Enable', 'neomax'),
        'disable' => esc_html__('Disable', 'neomax'),
    ),
));
$wp_customize->add_setting('neomax_footer_related_title', array(
    'default' => esc_html__('You May Also Like', 'neomax'),
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('neomax_footer_related_title', array(
    'label'   => esc_html__('Footer Related Slider Title', 'neomax'),
    'section' => 'neomax_footer_related_slider',
    'type'    => 'text',
));

// Category
$wp_customize->add_setting('neomax_footer_related_category', array(
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control(new neomax_Customize_Category_Control($wp_customize, 'neomax_footer_related_category', array(
    'label'    => esc_html__('Select Category', 'neomax'),
    'section'  => 'neomax_footer_related_slider',
    'settings' => 'neomax_footer_related_category',
)));

// Number of Posts
$wp_customize->add_setting('neomax_footer_related_posts', array(
    'default'           => 10,
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control('neomax_footer_related_posts', array(
    'label'    => esc_html__('Number of Posts', 'neomax'),
    'section'  => 'neomax_footer_related_slider',
    'type'     => 'number',
    'input_attrs' => array('min' => 1, 'max' => 20),
));
// Pro Version
        $wp_customize->add_setting( 'pro_version_related_slider', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_related_slider', array(
                    'section'	  => 'neomax_footer_related_slider',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium - ', 'neomax' ),
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
                    'message'     => esc_html__( 'Upgrade to Neomax Premium for Load More Posts feature - ', 'neomax' ),
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
                    'message'     => esc_html__( 'Upgrade to Neomax Premium for changing Footer Links - ', 'neomax' ),
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
                'default' => '#e12b5f', // Give it a default
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
                'default' => '#e12b5f', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
         // Pro Version
        $wp_customize->add_setting( 'pro_version_colors23', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors23', array(
                    'section'	  => 'colors',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium for more Color options - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );



    // Typography Settings
        $wp_customize->add_section( 'neomax_typography_settings', array(
            'title'       => esc_html__( 'Typography Settings', 'neomax' ),
             'priority'    => 20
        ) );

       
         // Pro Version
        $wp_customize->add_setting( 'pro_version_colors243', array(
            'sanitize_callback' => 'neomax_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Neomax_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors243', array(
                    'section'	  => 'neomax_typography_settings',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'neomax' ),
                    'message'     => esc_html__( 'Upgrade to Neomax Premium for Typography options - ', 'neomax' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/neomax-movie-video-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


    }


function neomax_sanitize_image( $file, $setting ) {

    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'png'          => 'image/png',
        'gif'          => 'image/gif',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon',
        'webp'         => 'image/webp',
        'avif'         => 'image/avif',
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
