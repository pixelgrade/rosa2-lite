<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add fonts section and options to the Customify config
add_filter( 'customify_filter_fields', 'rosa2_lite_add_fonts_section_to_customify_config', 60, 1 );

function rosa2_lite_add_fonts_section_to_customify_config( $config ) {

	$font_size_config = array(
		'min'  => 8,
		'max'  => 120,
		'step' => 1,
		'unit' => '',
	);

	$line_height_config = array(
		'min' => 0.8,
		'max' => 2,
		'step' => 0.05,
		'unit' => 'em',
	);

	$letter_spacing_config = array(
		'min'  => - 0.2,
		'max'  => 0.2,
		'step' => 0.01,
		'unit' => 'em',
	);

	$fields_config = array(
		'font-size'      => $font_size_config,
		'line-height'    => $line_height_config,
		'letter-spacing' => $letter_spacing_config,
		'text-align'     => false,
	);

	$rosa2_lite_fonts_section = array(
		'fonts_section' => array(
			'title'   => '',
			'type'  => 'hidden',
			'options' => array(
				'body_font'       => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-body-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 16,
						'line-height'     => 1.7,
						'font-weight'     => 500,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.03,
					),
					'fields'            => $fields_config,
				),
				'content_font'    => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-content-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 18,
						'line-height'     => 1.6,
						'font-weight'     => 500,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.03,
					),
					'fields'            => $fields_config,
				),
				'lead_font'    => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-lead-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 24,
						'line-height'     => 1.6,
						'font-weight'     => 500,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.02,
					),
					'fields'            => $fields_config,
				),
				'display_font'    => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-display-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 115,
						'line-height'     => 1.03,
						'font-weight'     => 700,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.03,
					),
					'fields'            => $fields_config,
				),
				'heading_1_font'  => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-heading-1-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 66,
						'line-height'     => 1.1,
						'font-weight'     => 700,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.03,
					),
					'fields'            => $fields_config,
				),
				'heading_2_font'  => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-heading-2-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 40,
						'line-height'     => 1.2,
						'font-weight'     => 700,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.02,
					),
					'fields'            => $fields_config,
				),
				'heading_3_font'  => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-heading-3-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 32,
						'line-height'     => 1.2,
						'font-weight'     => 700,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.02,
					),
					'fields'            => $fields_config,
				),
				'heading_4_font'  => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-heading-4-',
					'default'           => array(
						'font-family'     => 'Reforma1969',
						'font-size'       => 24,
						'line-height'     => 1.2,
						'font-weight'     => 700,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => - 0.02,
					),
					'fields'            => $fields_config,
				),
				'heading_5_font'  => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-heading-5-',
					'default'           => array(
						'font-family'     => 'Reforma2018',
						'font-size'       => 17,
						'line-height'     => 1.5,
						'font-weight'     => 500,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => 0.017,
					),
					'fields'            => $fields_config,
				),
				'heading_6_font'  => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-heading-6-',
					'default'           => array(
						'font-family'     => 'Reforma2018',
						'font-size'       => 17,
						'line-height'     => 1.5,
						'font-weight'     => 500,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => 0.017,
					),
					'fields'            => $fields_config,
				),
				'accent_font'     => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-accent-',
					'default'           => array(
						'font-family' => 'Billy Ohio',
					),
					'recommended'       => array(
						'Billy Ohio',
						'Mellony Dry Brush',
						'Jandys Dua',
						'Nermola Script',
					),
				),
				'navigation_font' => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-navigation-',
					'default'           => array(
						'font-family'     => 'Reforma2018',
						'font-size'       => 17,
						'line-height'     => 1.5,
						'font-weight'     => 500,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => 0.017,
					),
					'fields'            => $fields_config,
				),
				'buttons_font' => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-button-',
					'default'           => array(
						'font-family'     => 'Reforma2018',
						'font-size'       => 17,
						'line-height'     => 1.2,
						'font-weight'     => 500,
						'text-transform'  => 'capitalize',
						'text-decoration' => 'none',
						'letter-spacing'  => 0.03,
					),
					'fields'            => $fields_config,
				),
				'meta_font'  => array(
					'type'    => 'hidden_control',
					'selector'          => ':root',
					'properties_prefix' => '--theme-meta-',
					'default'           => array(
						'font-family'     => 'Reforma2018',
						'font-size'       => 17,
						'line-height'     => 1.5,
						'font-weight'     => 500,
						'text-transform'  => 'none',
						'text-decoration' => 'none',
						'letter-spacing'  => 0.017,
					),
					'fields'            => $fields_config,
				),
			),
		)
	);

	if ( empty( $config['sections'] ) ) {
		$config['sections'] = array();
	}

	$config['sections'] = $config['sections'] + $rosa2_lite_fonts_section;

	return $config;
}
