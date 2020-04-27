<?php
/**
 * Rosa2 Lite recommended plugins
 *
 * @package Rosa2 Lite
 */

// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once trailingslashit( get_template_directory() ) . 'inc/admin/required-plugins/class-tgm-plugin-activation.php';

function rosa2_lite_register_required_plugins() {

	$plugins = array(
		array(
			'name'               => 'Pixelgrade Assistant',
			'slug'               => 'pixelgrade-assistant',
			'is_callable'        => 'PixelgradeAssistant',
			'required'           => false,
		),
		array(
			'name'     => 'Nova Blocks',
			'slug'     => 'nova-blocks',
			'required' => false,
			'version'  => '1.3.0',
		),
		array(
			'name'     => 'Customify',
			'slug'     => 'customify',
			'required' => false,
		),
	);

	$config = array(
		'domain'           => '__theme_txtd', // Text domain - likely want to be the same as your theme.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'menu'             => 'install-required-plugins', // Menu slug
		'has_notices'      => true, // Show admin notices or not
		'is_automatic'     => false, // Automatically activate plugins after installation or not
		'message'          => '', // Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => esc_html__( 'Install Recommended Plugins', '__theme_txtd' ),
			'menu_title'                      => esc_html__( 'Install Plugins', '__theme_txtd' ),
			/* translators: %s: plugin name. */
			'installing'                      => esc_html__( 'Installing Plugin: %s', '__theme_txtd' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_can_install_required'     => _n_noop( 'Rosa2 Lite requires the following plugin: %1$s.', 'Rosa2 Lite requires the following plugins: %1$s.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_can_install_recommended'  => _n_noop( 'Rosa2 Lite recommends the following plugin: %1$s.', 'Rosa2 Lite recommends the following plugins: %1$s.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_can_activate_required'    => _n_noop( 'The following theme required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_can_activate_recommended' => _n_noop( 'The following theme recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Rosa2 Lite: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with Rosa2 Lite: %1$s.', '__theme_txtd' ),
			/* translators: %1$s = plugin name */
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', '__theme_txtd' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', '__theme_txtd' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', '__theme_txtd' ),
			'return'                          => esc_html__( 'Return to Recommended Plugins Installer', '__theme_txtd' ),
		)
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'rosa2_lite_register_required_plugins', 995 );
