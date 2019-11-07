/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $, window ) {

	// Site title and description.
	if ( ! $( '.site-logo--image' ).length ) {
		wp.customize('blogname', function (value) {
			value.bind( function( text ) {
				$( '.site-title a, .site-title text' ).text( text );
			} );
		});
	}
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

} )( jQuery, window );
