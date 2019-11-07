<?php
/**
 * Require files that deal with various plugins integrations.
 *
 * @package Rosa2 Lite
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load NovaBlocks integration for this theme
 */
require_once trailingslashit( get_template_directory() ) . 'inc/integrations/novablocks.php';

/**
 * Load Customify integration for this theme.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/integrations/customify/customify.php';

/**
 * Load Jetpack integration for this theme.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/integrations/jetpack.php';
