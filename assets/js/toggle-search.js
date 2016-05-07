/* 
 * Toggles header search on and off
 */
jQuery( document ).ready( function( $ ) {
    $( ".search-toggle" ).click( function() {
        $( "#search-container" ).animate( { width: 'toggle', left: 0 }, function() {
            $( ".search-toggle" ).toggleClass( 'active' );
        });
    });
    
    /* Add Foundation classes to Comment Awaiting Moderation box */
    $("*").find("p.comment-awaiting-moderation").each(function() {
        $(this).addClass("alert-box success radius");
    });        //add additional code here if needed    })}); 
    
    $( ".show-hide-author" ).click( function() {
        $( ".author-box" ).toggle( 600, 'swing' );
        if ( $( this ).html() == "Hide" ) {
            $( this ).html( "Show" );
        } else {
            $( this ).html( "Hide" );
        }
    });
});


