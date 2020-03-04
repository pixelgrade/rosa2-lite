<?php
/**
 * Rosa2 Lite admin logic.
 *
 * @package Rosa2 Lite
 */

/**
 * Load Recommended plugins notification logic.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/admin/required-plugins.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

function rosa2_lite_admin_setup() {

	/**
	 * Load and initialize Pixelgrade Assistant notice logic.
	 * @link https://wordpress.org/plugins/pixelgrade-assistant/
	 */
	require_once trailingslashit( get_template_directory() ) . 'inc/admin/pixelgrade-assistant-notice/class-notice.php';
	PixelgradeAssistant_Install_Notice::init();
}
add_action('after_setup_theme', 'rosa2_lite_admin_setup' );
