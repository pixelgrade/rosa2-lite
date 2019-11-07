var gulp = require( 'gulp' ),
	sass = require( 'gulp-sass' ),
	sassUnicode = require('gulp-sass-unicode'),
	rtlcss = require( 'gulp-rtlcss' ),
	rename = require( 'gulp-rename' ),
	replace = require( 'gulp-replace' );

sass.compiler = require( 'node-sass' );

function styles( cb ) {
	return gulp.src( './assets/scss/*.scss' )
	           .pipe( sass().on( 'error', sass.logError ) )
	           .pipe( sassUnicode() )
	           .pipe( replace( /^@charset "UTF-8";\n/gm, '' ) )
	           .pipe( gulp.dest( './' ) );
}

function stylesRTL( cb ) {
	return gulp.src( [ 'style.css' ] )
	           .pipe( rtlcss() )
	           .pipe( rename( function( path ) { path.basename += "-rtl"; } ) )
	           .pipe( gulp.dest( '.' ) );
}
stylesRTL.description = 'Generate style-rtl.css file based on style.css';

function watch( cb ) {
	gulp.watch( [ './assets/scss/**/*.scss' ], compile );
}

const compile = gulp.series( styles, stylesRTL );

gulp.task( 'compile:styles', compile );
gulp.task( 'watch:styles', gulp.series( compile, watch ) );
