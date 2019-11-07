import $ from 'jquery';
import App from './components/app';

function initialize() {
	new App();
}

$(function () {
	const $window = $( window );
	const $html = $( 'html' );

	if ( $html.is( '.wf-active' ) ) {
		initialize();
	} else {
		$window.on( 'wf-active', initialize );
	}
});
