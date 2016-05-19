
<nav id="site-navigation" class="main-navigation top-bar-right" role="navigation">
                        
        <!-- Right Nav Section -->
        <div class="menu">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'jin' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); /*, 'depth' => 2*/ ?> 
            
        </div> 

</nav><!-- #site-navigation -->
