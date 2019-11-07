<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'customify_filter_fields', 'rosa2_lite_add_customify_connected_fields', 12, 1 );

function rosa2_lite_add_customify_connected_fields( $options ) {

	// If the theme hasn't declared support for style manager, bail.
	if ( ! current_theme_supports( 'customizer_style_manager' ) ) {
		return $options;
	}

	if ( ! isset( $options['sections']['style_manager_section'] ) ) {
		$options['sections']['style_manager_section'] = array();
	}

	// The section might be already defined, thus we merge, not replace the entire section config.
	$options['sections']['style_manager_section'] = array_replace_recursive( $options['sections']['style_manager_section'],
		array(
			'options' => array(
				// Font Palettes Assignment.
				'sm_font_palette'    => array(
					'default' => 'exquisite',
				),
				'sm_font_primary'    => array(
					'connected_fields' => array(
						'display_font',
						'heading_1_font',
						'heading_2_font',
						'heading_3_font',
						'heading_4_font',
					),
				),
				'sm_font_secondary'  => array(
					'connected_fields' => array(
						'heading_5_font',
						'heading_6_font',
						'navigation_font',
						'buttons_font',
						'meta_font',
					),
				),
				'sm_font_body'       => array(
					'connected_fields' => array(
						'body_font',
						'content_font',
						'lead_font',
					),
				),
				'sm_font_accent'     => array(
					'connected_fields' => array(
						'accent_font',
					),
				),
				'sm_color_primary'   => array(
					'default'          => ROSA2_LITE_THEME_COLOR_PRIMARY,
					'connected_fields' => array(
						'color_1'
					),
				),
				'sm_color_secondary' => array(
					'default'          => ROSA2_LITE_THEME_COLOR_SECONDARY,
					'connected_fields' => array(
						'color_2'
					),
				),
				'sm_color_tertiary'  => array(
					'default'          => ROSA2_LITE_THEME_COLOR_TERTIARY,
					'connected_fields' => array(
						'color_3'
					),
				),
				'sm_dark_primary'    => array(
					'default'          => ROSA2_LITE_THEME_DARK_PRIMARY,
					'connected_fields' => array(
						'color_dark_1'
					),
				),
				'sm_dark_secondary'  => array(
					'default'          => ROSA2_LITE_THEME_DARK_SECONDARY,
					'connected_fields' => array(
						'color_dark_2'
					),
				),
				'sm_dark_tertiary'   => array(
					'default'          => ROSA2_LITE_THEME_DARK_TERTIARY,
					'connected_fields' => array(
						'color_dark_3'
					),
				),
				'sm_light_primary'   => array(
					'default'          => ROSA2_LITE_THEME_LIGHT_PRIMARY,
					'connected_fields' => array(
						'color_light_1'
					),
				),
				'sm_light_secondary' => array(
					'default'          => ROSA2_LITE_THEME_LIGHT_SECONDARY,
					'connected_fields' => array(
						'color_light_2'
					),
				),
				'sm_light_tertiary'  => array(
					'default'          => ROSA2_LITE_THEME_LIGHT_TERTIARY,
					'connected_fields' => array(
						'color_light_3'
					),
				),
			),
		)
	);

	return $options;
}
