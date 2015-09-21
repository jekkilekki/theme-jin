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

	<footer id="colophon" class="site-footer" role="contentinfo">
            
            <div class="row"> <!-- Start Foundation row -->
                
                
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'jin' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'jin' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'jin' ), 'jin', '<a href="http://www.aaronsnowberger.com" rel="designer">Aaron Snowberger</a>' ); ?>
		</div><!-- .site-info -->
                
                
            </div> <!-- End Foundation row -->
            
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
