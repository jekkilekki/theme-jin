/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-title:after, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-title:after, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
        
        // Custom Customizer Functions
        // Header Gradient color
//        wp.customize( 'grad1_color', function( value ) {
//		value.bind( function( to ) {
//			$( '.split-navigation-menu' ).css( {
//                            'background-color': to 
//                        } );
//		} );
//	} );
//        wp.customize( 'grad2_color', function( value ) {
//		value.bind( function( to ) {
//			$( '#main-nav-left li a, #main-nav-right li a' ).css( {
//                            'color': to 
//                        } );
//		} );
//	} );
//        
//        // Highlight colors
//        wp.customize( 'highlight_color', function( value ) {
//		value.bind( function( to ) {
//			$( 'a:visited, a:hover, a:focus, a:active, .entry-content a, .entry-summary a' ).css( {
//                            'color': to 
//                        } );
//                        $( '.search-toggle, .search-box-wrapper' ).css( {
//                            'background-color': to
//                        } );
//		} );
//	} );
        
        
        // Custome Layout (Sidebar) Options
        wp.customize( 'layout_setting', function( value ) {
		value.bind( function( to ) {
			$( '#page' ).removeClass( 'no-sidebar sidebar-right sidebar-left' ); 
                        $( '#page' ).addClass( to );
		} );
	} );
           
        $( '#primary' ).removeClass( 'small-12 medium-8 medium-push-4 medium-10 medium-push-1 large-8 large-push-2 columns' );
        $( '#secondary' ).removeClass( 'small-12 medium-4 medium-pull-8 medium-12 columns' );
    
        if ( $( '#page' ).hasClass( 'sidebar-right' ) ) {
            $( '#primary' ).addClass( 'small-12 medium-8 columns' );
            $( '#secondary' ).addClass( 'small-12 medium-4 columns' );
        } else if ( $( '#page' ).hasClass( 'sidebar-left' ) ) {
            $( '#primary' ).addClass( 'small-12 medium-8 medium-push-4 columns' );
            $( '#secondary' ).addClass( 'small-12 medium-4 medium-pull-8 columns' );
        } else {
            $( '#primary' ).addClass( 'small-12 medium-10 medium-push-1 large-8 large-push-2 columns' );
            $( '#secondary' ).addClass( 'medium-12 columns' );
        }
} )( jQuery );