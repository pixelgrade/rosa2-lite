<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add colors section and options to the Customify config
add_filter( 'customify_filter_fields', 'rosa2_lite_add_colors_section_to_customify_config', 50, 1 );

// Prepend theme color palette to the default color palettes list
add_filter( 'customify_get_color_palettes', 'rosa2_lite_filter_color_palettes' );

function rosa2_lite_add_colors_section_to_customify_config( $config ) {

	$colors_section = array(
		'colors_section' => array(
			'title'   => esc_html__( 'Colors', '__theme_txtd' ),
			'options' => array(
				'color_1'       => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Primary Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_COLOR_PRIMARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-color-primary',
						),
					),
				),
				'color_2'       => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Secondary Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_COLOR_SECONDARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-color-secondary',
						),
					),
				),
				'color_3'       => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Tertiary Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_COLOR_TERTIARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-color-tertiary',
						),
					),
				),
				'color_dark_1'  => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Primary Dark Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_DARK_PRIMARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-dark-primary',
						),
					),
				),
				'color_dark_2'  => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Secondary Dark Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_DARK_SECONDARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-dark-secondary',
						),
					),
				),
				'color_dark_3'  => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Tertiary Dark Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_DARK_TERTIARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-dark-tertiary',
						),
					),
				),
				'color_light_1' => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Primary Light Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_LIGHT_PRIMARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-light-primary',
						),
					),
				),
				'color_light_2' => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Secondary Light Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_LIGHT_SECONDARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-light-secondary',
						),
					),
				),
				'color_light_3' => array(
					'type'    => 'color',
					'live'    => true,
					'label'   => esc_html__( 'Rosa Tertiary Light Color', '__theme_txtd' ),
					'default' => ROSA2_LITE_THEME_LIGHT_TERTIARY,
					'css'     => array(
						array(
							'selector' => ':root',
							'property' => '--theme-light-tertiary',
						),
					),
				),
			),
		),
	);

	if ( empty( $config['sections'] ) ) {
		$config['sections'] = array();
	}

	$config['sections'] = $config['sections'] + $colors_section;

	return $config;
}

function rosa2_lite_filter_color_palettes( $color_palettes ) {

	$color_palettes = array_merge( array(
		'default' => array(
			'label'   => esc_html__( 'Theme Default', '__theme_txtd' ),
			'preview' => array(
				'background_image_url' => '//cloud.pixelgrade.com/wp-content/uploads/2018/07/rosa-palette.jpg',
			),
			'options' => array(
				'sm_color_primary'   => ROSA2_LITE_THEME_COLOR_PRIMARY,
				'sm_color_secondary' => ROSA2_LITE_THEME_COLOR_SECONDARY,
				'sm_color_tertiary'  => ROSA2_LITE_THEME_COLOR_TERTIARY,
				'sm_dark_primary'    => ROSA2_LITE_THEME_DARK_PRIMARY,
				'sm_dark_secondary'  => ROSA2_LITE_THEME_DARK_SECONDARY,
				'sm_dark_tertiary'   => ROSA2_LITE_THEME_DARK_TERTIARY,
				'sm_light_primary'   => ROSA2_LITE_THEME_LIGHT_PRIMARY,
				'sm_light_secondary' => ROSA2_LITE_THEME_LIGHT_SECONDARY,
				'sm_light_tertiary'  => ROSA2_LITE_THEME_LIGHT_TERTIARY,
			),
		),
	), $color_palettes );

	return $color_palettes;
}
