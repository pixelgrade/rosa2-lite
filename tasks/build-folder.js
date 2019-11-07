var gulp = require( 'gulp' ),
	plugins = require( 'gulp-load-plugins')(),
	fs = require( 'fs' ),
	del = require( 'del' ),
	theme = 'rosa2-lite';

// -----------------------------------------------------------------------------
// Copy plugin folder outside in a build folder
// -----------------------------------------------------------------------------
function copyFolder() {
	var dir = process.cwd();
	return gulp.src( './*' )
	           .pipe( plugins.exec( 'rm -Rf ./../build; mkdir -p ./../build/' + theme + ';', {
		           silent: true,
		           continueOnError: true // default: false
	           } ) )
	           .pipe(plugins.rsync({
		           root: dir,
		           destination: '../build/' + theme + '/',
		           // archive: true,
		           progress: false,
		           silent: true,
		           compress: false,
		           recursive: true,
		           emptyDirectories: true,
		           clean: true,
		           exclude: ['node_modules']
	           }));
}
copyFolder.description = 'Copy plugin production files to a build folder';
gulp.task( 'build:copy-folder', copyFolder );

// -----------------------------------------------------------------------------
// Remove unneeded files and folders from the build folder
// -----------------------------------------------------------------------------
async function removeUnneededFiles() {
	const files_to_remove = new Array();
	const contents = fs.readFileSync( '.zipignore', 'utf8' );

	// Files that should not be present in build
	contents.split(/[\r\n]/).forEach(function(path) {
		path = path.trim();

		if ( path ) {
			files_to_remove.push('../build/' + theme + '/' + path);
		}
	});

	return del( files_to_remove, {force: true} );
}
removeUnneededFiles.description = 'Remove unneeded files and folders from the build folder';
gulp.task( 'build:remove-unneeded-files', removeUnneededFiles );

gulp.task( 'build:folder', gulp.series(
	'build:copy-folder',
	'build:remove-unneeded-files'
) );
