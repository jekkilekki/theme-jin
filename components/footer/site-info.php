<div class="site-info">
    
    <div class="row">
        
        <div class="site-links footer-menu small-12 <?php echo has_nav_menu( 'social' ) ? 'medium-8' : ''; ?> columns">
            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'depth' => 1 ) ); ?>
        </div>
        <?php if( has_nav_menu( 'social' ) ) { ?>
        <div class="social-links-menu footer-menu small-12 medium-4 columns">
            <?php jin_social_menu(); ?>
        </div>
        <?php } ?>

        <div class="theme-info small-12 columns text-center">
            <div class="theme-links">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'jin' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'jin' ), '<i class="fa fa-wordpress"></i> WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'jin' ), 'jin', '<a href="http://www.aaronsnowberger.com" rel="designer">Aaron Snowberger</a>' ); ?>
            </div>
            <div class="copyright small-12 columns text-center">
                <?php echo jin_copyright(); ?>
            </div>
        </div>

    </div><!-- End Foundation row -->
        
</div><!-- .site-info -->