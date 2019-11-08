var gulp = require( 'gulp' ),
	cp = require( 'child_process' ),
	plugins = require( 'gulp-load-plugins')(),
	theme = 'rosa-2-lite';

function maybeFixBuildDirPermissions(done) {
	cp.execSync('find ./../build -type d -exec chmod 755 {} \\;');
	return done();
}
maybeFixBuildDirPermissions.description = 'Make sure that all directories in the build directory have 755 permissions.';
gulp.task( 'build:fix:dir-permissions', maybeFixBuildDirPermissions );

function maybeFixBuildFilePermissions(done) {
	cp.execSync('find ./../build -type f -exec chmod 644 {} \\;');
	return done();
}
maybeFixBuildFilePermissions.description = 'Make sure that all files in the build directory have 644 permissions.';
gulp.task( 'build:fix:file-permissions', maybeFixBuildFilePermissions );

function maybeFixIncorrectLineEndings(done) {
	cp.execSync('find ./../build -type f -print0 | xargs -0 -n 1 -P 4 dos2unix');
	return done();
}
maybeFixIncorrectLineEndings.description = 'Make sure that all line endings in the files in the build directory are UNIX line endings.';
gulp.task( 'build:fix:line-endings', maybeFixIncorrectLineEndings );

// -----------------------------------------------------------------------------
// Replace the themes' text domain with the actual text domain (think variations)
// -----------------------------------------------------------------------------
function pluginTextdomainReplace() {
	return gulp.src( ['../build/' + theme + '/**/*.php', '../build/' + theme + '/**/*.js', '../build/' + theme + '/**/*.css', '../build/' + theme + '/**/*.pot'] )
	           .pipe( plugins.replace( /__theme_txtd/g, theme ) )
	           .pipe( gulp.dest( '../build/' + theme ) );
}
gulp.task( 'build:fix:txtdomain', pluginTextdomainReplace );

gulp.task( 'build:fix', gulp.series(
	'build:fix:dir-permissions',
	'build:fix:file-permissions',
	'build:fix:line-endings',
	'build:fix:txtdomain'
) );
