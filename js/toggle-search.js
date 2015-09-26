/* 
 * Toggles header search on and off
 */
jQuery( document ).ready( function( $ ) {
    $( ".search-toggle" ).click( function() {
        $( "#search-container" ).animate( { width: 'toggle', left: 0 }, function() {
            $( ".search-toggle" ).toggleClass( 'active' );
        });
    });

});


