<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jin
 */

?>

	</div><!-- #content -->

        <a href="#" class="topbutton"></a> <!-- Back to top button -->
        
	<footer id="colophon" class="site-footer" role="contentinfo">
            
            <div class="row"> <!-- Start Foundation row -->
                
                <?php get_sidebar( 'footer' ); ?>
            
            </div> <!-- End Foundation row -->
                
            <div class="site-info">
                <div class="row">
                    
                    <div class="site-links small-12 columns">
                        <?php echo jin_copyright(); ?>
                        
                        <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'depth' => 1 ) ); ?>
                    </div>
                    
                    <div class="theme-info small-12 columns text-center">
                    
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'jin' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'jin' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'jin' ), 'jin', '<a href="http://www.aaronsnowberger.com" rel="designer">Aaron Snowberger</a>' ); ?>
                    
                    </div>
                    
                </div><!-- End Foundation row -->
            </div><!-- .site-info -->
                
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
