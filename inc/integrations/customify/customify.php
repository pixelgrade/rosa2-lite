<?php
/**
 * Handle the Customify integration logic.
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ROSA2_LITE_THEME_COLOR_PRIMARY',    '#DDAB5D' );    // gold
define( 'ROSA2_LITE_THEME_COLOR_SECONDARY',  '#39497C' );    // blue
define( 'ROSA2_LITE_THEME_COLOR_TERTIARY',   '#B12C4A' );    // red
define( 'ROSA2_LITE_THEME_DARK_PRIMARY',     '#212B49' );    // dark blue
define( 'ROSA2_LITE_THEME_DARK_SECONDARY',   '#34394B' );    // dark light blue
define( 'ROSA2_LITE_THEME_DARK_TERTIARY',    '#141928' );    // darker blue
define( 'ROSA2_LITE_THEME_LIGHT_PRIMARY',    '#FFFFFF' );    // white
define( 'ROSA2_LITE_THEME_LIGHT_SECONDARY',  '#CCCCCC' );    // gray
define( 'ROSA2_LITE_THEME_LIGHT_TERTIARY',   '#EEEFF2' );    // light gray

require_once __DIR__ . '/colors.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once __DIR__ . '/fonts.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once __DIR__ . '/connected-fields.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

// Add new options to the Customify config
add_filter( 'customify_filter_fields', 'rosa2_lite_add_customify_options', 11, 1 );

function rosa2_lite_add_customify_options( $config ) {
	$config['opt-name'] = 'rosa2_options';

	//start with a clean slate - no Customify default sections
	$config['sections'] = array();

	return $config;
}
