var gulp = require( 'gulp' );
var fs = require( 'fs' );
var browserSync = require( 'browser-sync' ).create();
var gulpconfig;
var defaults = { open: 'external' };

if ( fs.existsSync( './tasks/gulpconfig.json' ) ) {
	gulpconfig = require( './gulpconfig.json' );
} else {
	gulpconfig = require( './gulpconfig.example.json' );
	console.warn( "Don't forget to create your own gulpconfig.json from gulpconfig.json.example" );
}

var config = Object.assign( {}, defaults, gulpconfig.server );

function reload( done ) {
	browserSync.reload();
	done();
};

gulp.task( 'server', function() {
	console.log( gulpconfig, config );
	// Serve files from the root of this project
	browserSync.init( {
		proxy: 'rosa2.work',
		open: 'external',
	} );

	// add browserSync.reload to the tasks array to make
	// all browsers reload after tasks are complete.
	gulp.watch( [ 'dist/**/*.js', '*.css' ], reload );

} );
