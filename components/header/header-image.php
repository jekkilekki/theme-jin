<?php
		// You can upload a custom header and it'll output in a smaller logo size.
		$header_image = get_header_image();

		if ( ! empty( $header_image ) ) { ?>
			<div id="header-image" class="custom-header">
				<div class="header-wrapper">
					<ul class="site-branding title-area">
                                            <li class="name">
                                                <?php if ( is_front_page() && is_home() ) : ?>
                                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                                <?php else : ?>
                                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                                <?php endif; ?>
                                                <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                                            </li>
                                            
                                            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					</ul><!-- .site-branding -->
				</div><!-- .header-wrapper -->
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
			</div><!-- #header-image .custom-header -->
		<?php } else { ?>
			<ul class="site-branding title-area">
				<li class="name">
                                    <?php if ( is_front_page() && is_home() ) : ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php else : ?>
                                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                    <?php endif; ?>
                                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                                </li>
                                
                                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul><!-- .site-branding -->
		<?php } ?>