
<nav id="site-navigation" class="main-navigation top-bar-right" role="navigation">
                        
        <!-- Right Nav Section -->
        <div class="top-bar-menu menu">
            <button class="menu-toggle navicon" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i><span><?php esc_html_e( 'Menu', 'jin' ); ?></span></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu group' ) ); /*, 'depth' => 2*/ ?> 
            
        </div> 

</nav><!-- #site-navigation -->
