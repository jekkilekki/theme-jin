<?php
/**
 * Jin Theme Customizer.
 *
 * @package Jin
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jin_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        
        /*
         * Custom Customizer Customizations
         * #1: Settings, #2: Controls
         */
        
        /*
         * Highlight Color
         */
        // Highlight Color Setting
        $wp_customize->add_setting( 'highlight_color', array(
            'default'           => '#00adcf', // steelblue
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        ) );
        
        // Highligh Color Control
        $wp_customize->add_control(
                new WP_Customize_Color_Control(
                        $wp_customize,
                        'highlight_color', array(
                            'label'         => __( 'Highlight Color', 'jin' ),
                            'description'   => __( 'Change the color of site highlights, inluding links.', 'jin' ),
                            'section'       => 'colors',
                        )
        ) );
        
        /*
         * Show Logo with Sitename Checkbox
         */
        // Show Logo with Sitename Setting
        $wp_customize->add_setting( 'show_logo_sitename', array(
            'default'           => 0,
        ) );
        
        // Show Logo with Sitename Control
        $wp_customize->add_control(
                new WP_Customize_Control(
                        $wp_customize,
                        'show_logo_sitename',
                        array( 
                            'label'         => __( 'Show sitename after the logo?', 'jin' ),
                            'type'          => 'checkbox',
                            'section'       => 'title_tagline',
                        )
        ) );
        
        /* ///////////////// GRADIENT ////////////////// */
        
        /** Add some LINES to separate the Gradient @link http://coreymckrill.com/blog/2014/01/09/adding-arbitrary-html-to-a-wordpress-theme-customizer-section/ */
        
        /*
         * Use Gradient Checkbox
         */
        // Use Gradient Setting
        $wp_customize->add_setting( 'use_gradient', array(
            'default'           => 0,
        ) );
        
        // Use Gradient Control
        $wp_customize->add_control(
                new WP_Customize_Control(
                        $wp_customize,
                        'use_gradient',
                        array( 
                            'label'         => __( 'Use Header Gradient?', 'jin' ),
                            'type'          => 'checkbox',
                            'section'       => 'header_image',
                        )
        ) );
        
        /* 
         * Gradient Color #1 
         */
        // Gradient #1 Color Setting
        $wp_customize->add_setting( 'grad1_color', array(
            'default'           => '#085078',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        ) );
        
        // Gradient #1 Color Control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control(
                        $wp_customize,
                        'grad1_color', array(
                            'label'         => __( 'Header Gradient: Top-Left Color', 'jin' ),
                            'description'   => __( 'Set or change the upper left gradient starting color.', 'jin' ),
                            'section'       => 'header_image',
                        )
        ) );
        
        /* 
         * Gradient Color #2 
         */
        // Gradient #2 Color Setting
        $wp_customize->add_setting( 'grad2_color', array(
            'default'           => '#85D8CE',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        ) );
        
        // Gradient #2 Color Control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control(
                        $wp_customize,
                        'grad2_color', array(
                            'label'         => __( 'Header Gradient: Center Color', 'jin' ),
                            'description'   => __( 'Set or change the center gradient color.', 'jin' ),
                            'section'       => 'header_image',
                        )
        ) );
        
        /* 
         * Gradient Color #3 
         */
        // Gradient #3 Color Setting
        $wp_customize->add_setting( 'grad3_color', array(
            'default'           => '#F8FFF3',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        ) );
        
        // Gradient #2 Color Control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control(
                        $wp_customize,
                        'grad3_color', array(
                            'label'         => __( 'Header Gradient: Bottom-Right Color', 'jin' ),
                            'description'   => __( 'Set or change the lower right gradient ending color.', 'jin' ),
                            'section'       => 'header_image',
                        )
        ) );
 
        
        /* ///////////////// SIDEBAR LAYOUT ////////////////// */
        
        /* 
         * Select Sidebar Layout 
         */
        // Add Sidebar Layout Section
        $wp_customize->add_section( 'jin-options', array(
            'title'         => __( 'Theme Options', 'jin' ),
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change the default display options for the theme.', 'jin' ),
        ) );
        
        // Sidebar Layout setting
        $wp_customize->add_setting( 'layout_setting',
                array(
                    'default'           => 'no-sidebar',
                    'type'              => 'theme_mod',
                    'sanitize_callback' => 'jin_sanitize_layout',
                    'transport'         => 'postMessage'
                ) );
        
        // Sidebar Layout Control
        $wp_customize->add_control( 'layout_control',
                array(
                    'settings'          => 'layout_setting',
                    'type'              => 'radio',
                    'label'             => __( 'Sidebar position', 'jin' ),
                    'choices'           => array(
                            'no-sidebar'    => __( 'No sidebar (default)', 'jin' ),
                            'sidebar-right' => __( 'Sidebar right', 'jin' ),
                            'sidebar-left'  => __( 'Sidebar left', 'jin' ),
                    ),
                    'section'           => 'jin-options'
                ) );
}
add_action( 'customize_register', 'jin_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jin_customize_preview_js() {
	wp_enqueue_script( 'jin_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160507', true );
}
add_action( 'customize_preview_init', 'jin_customize_preview_js' );

/*
 * Sanitize layout options
 */
function jin_sanitize_layout ( $value ) {
    if ( !in_array( $value, array( 'no-sidebar', 'sidebar-right', 'sidebar-left' ) ) ) {
        $value = 'no-sidebar';
    }
    return $value;
}

/*
 * Inject Customizer CSS when appropriate
 */
function jin_customizer_css() {
    $highlight_color = get_theme_mod( 'highlight_color' );
    
    $use_gradient = get_theme_mod( 'use_gradient' );
    
    $gradient_color_1 = get_theme_mod( 'grad1_color', '#085078' );
    $gradient_color_2 = get_theme_mod( 'grad2_color', '#85D8CE' );
    $gradient_color_3 = get_theme_mod( 'grad3_color', '#F8FFF3' );
    
    ?>
    <style>
        .custom-header {
            background: radial-gradient( ellipse farthest-side at 100% 100%,
                <?php echo $gradient_color_3; ?> 10%,
                <?php echo $gradient_color_2; ?> 50%,
                <?php echo $gradient_color_1; ?> 120% );
            <?php echo $use_gradient ? 'height: 600px;' : ''; ?>
        }
        a,
        a:visited,
        a:hover,
        a:focus,
        a:active,
        .entry-content a,
        .entry-summary a {
            color: <?php echo $highlight_color; ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'jin_customizer_css' );