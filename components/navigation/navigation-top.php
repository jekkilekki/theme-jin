<div class="fixed contain-to-grid large-12 columns">
<nav id="site-navigation" class="main-navigation top-bar" role="navigation" data-topbar>
    
    <?php // The template part that handles the Logo and branding and header image ?>
    <?php get_template_part( 'components/header/header', 'image' ); ?>
    
	<section class="top-bar-section">
                        
            <!-- Right Nav Section -->
            <ul class="right">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu'/*, 'depth' => 2*/ ) ); ?>
                <div id="search-container">
                    <div class="search-box clear">
                        <?php get_search_form(); ?>

                    </div>
                </div>
                <div class="search-toggle">
                    <i class="fa fa-search"></i>
                    <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'jin' ); ?></a>
                </div>
            </ul>

        </section>
</nav><!-- #site-navigation -->
</div><!-- END large-12 columns -->