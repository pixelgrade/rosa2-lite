import $ from 'jquery';
import App from './components/app';

function initialize() {
	new App();
	console.log('init');
}

$(function () {
	initialize();
});
