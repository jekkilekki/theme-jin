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
         * Menu Background Color 
         */
        // Menu Color Setting
        $wp_customize->add_setting( 'menu_color', array(
            'default'           => '#ffffff',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        ) );
        
        // Menu Color Control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control(
                        $wp_customize,
                        'menu_color', array(
                            'label'         => __( 'Menu Background Color', 'jin' ),
                            'description'   => __( 'Change the background color of the menu.', 'jin' ),
                            'section'       => 'colors',
                        )
        ) );
        
        /* 
         * Menu Text Color 
         */
        // Menu Text Color Setting
        $wp_customize->add_setting( 'menu_text_color', array(
            'default'           => '#777777',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        ) );
        
        // Menu Text Color Control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control(
                        $wp_customize,
                        'menu_text_color', array(
                            'label'         => __( 'Menu Text Color', 'jin' ),
                            'description'   => __( 'Change the text color of the menu.', 'jin' ),
                            'section'       => 'colors',
                        )
        ) );
        
        /*
         * Highlight Color
         */
        // Highlight Color Setting
        $wp_customize->add_setting( 'highlight_color', array(
            'default'           => '#00acdf', // steelblue
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
	wp_enqueue_script( 'jin_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
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
    $menu_color = get_theme_mod( 'menu_color' );
    $menu_text_color = get_theme_mod( 'menu_text_color' );
    $highlight_color = get_theme_mod( 'highlight_color' );
    
    ?>
    <style>
        .split-navigation-menu {
            background: <?php echo $menu_color; ?>;
        }
        #main-nav-left li a,
        #main-nav-right li a {
            color: <?php echo $menu_text_color; ?>;
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