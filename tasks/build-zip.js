var gulp = require( 'gulp' ),
	fs = require( 'fs' ),
	plugins = require( 'gulp-load-plugins')(),
	theme = 'rosa2-lite';

// -----------------------------------------------------------------------------
// Create the theme installer archive and delete the build folder
// -----------------------------------------------------------------------------
function makeZip() {
	var versionString = '';
	// get theme version from the stylesheet
	var contents = fs.readFileSync("./style.css", "utf8");

	// split it by lines
	var lines = contents.split(/[\r\n]/);

	function checkIfVersionLine(value, index, ar) {
		var myRegEx = /^[\s\*]*[Vv]ersion:/;
		if (myRegEx.test(value)) {
			return true;
		}
		return false;
	}

	// apply the filter
	var versionLine = lines.filter(checkIfVersionLine);

	versionString = versionLine[0].replace(/^[\s\*]*[Vv]ersion:/, '').trim();
	versionString = '-' + versionString.replace(/\./g, '-');

	return gulp.src('./')
	           .pipe( plugins.exec('cd ./../; rm -rf ' + theme + '*.zip; cd ./build/; zip -r -X ./../' + theme + versionString + '.zip ./; cd ./../; rm -rf build'));
}
makeZip.description = 'Create the theme installer archive and delete the build folder';
gulp.task( 'build:zip', makeZip );
