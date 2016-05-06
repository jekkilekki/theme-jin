<?php
// You can upload a custom header and it'll output in a smaller logo size.
$header_image = get_header_image();
$use_gradient = get_theme_mod( 'use_gradient' );

if ( ! empty( $header_image ) || $use_gradient !== 0 ) { ?>

        <div id="header-image" class="custom-header">
                <div class="header-wrapper">
                        <div class="site-branding-header">

                                <?php if ( is_front_page() || is_home() ) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php endif; ?>
                                <p class="site-description"><?php bloginfo( 'description' ); ?></p>

                        </div><!-- .site-branding -->
                </div><!-- .header-wrapper -->
                
                <?php if ( ! empty( $header_image ) ) { ?>
                    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                <?php } ?>
                    
        </div><!-- #header-image .custom-header -->
        
<?php 
} else { 
        
        // No header? We need nothing. 
        
} ?>