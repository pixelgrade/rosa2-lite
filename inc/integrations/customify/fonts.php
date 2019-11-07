<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add theme fonts to the font field options list
add_filter( 'customify_theme_fonts', 'rosa2_lite_add_customify_theme_fonts' );

// Add fonts section and options to the Customify config
add_filter( 'customify_filter_fields', 'rosa2_lite_add_fonts_section_to_customify_config', 60, 1 );

function rosa2_lite_add_customify_theme_fonts( $fonts ) {

	$fonts['Reforma1969'] = array(
		'family'   => 'Reforma1969',
		'src'      => '//pxgcdn.com/fonts/reforma1969/stylesheet.css',
		'variants' => array( 300, 500, 700 ),
	);

	$fonts['Reforma2018'] = array(
		'family'   => 'Reforma2018',
		'src'      => '//pxgcdn.com/fonts/reforma2018/stylesheet.css',
		'variants' => array( 300, 500, 700, 900 ),
	);

	$fonts['League Spartan'] = array(
		'family'   => 'League Spartan',
		'src'      => '//pxgcdn.com/fonts/league-spartan/stylesheet.css',
		'variants' => array()
	);

	$fonts['HK Grotesk'] = array(
		'family'   => 'HK Grotesk',
		'src'      => '//pxgcdn.com/fonts/hk-grotesk/stylesheet.css',
		'variants' => array()
	);

	$fonts['YoungSerif'] = array(
		'family'   => 'YoungSerif',
		'src'      => '//pxgcdn.com/fonts/young-serif/stylesheet.css',
		'variants' => array()
	);

	$fonts['Billy Ohio'] = array(
		'family'   => 'Billy Ohio',
		'src'      => '//pxgcdn.com/fonts/billy-ohio/stylesheet.css',
		'variants' => array()
	);

	$fonts['Mellony Dry Brush'] = array(
		'family'   => 'Mellony Dry Brush',
		'src'      => '//pxgcdn.com/fonts/mellony-dry-brush/stylesheet.css',
		'variants' => array()
	);

	$fonts['Jandys Dua'] = array(
		'family'   => 'Jandys Dua',
		'src'      => '//pxgcdn.com/fonts/jandys-dua/stylesheet.css',
		'variants' => array()
	);

	$fonts['Nermola Script'] = array(
		'family'   => 'Nermola Script',
		'src'      => '//pxgcdn.com/fonts/nermola-script/stylesheet.css',
		'variants' => array()
	);

	return $fonts;
}

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
			'title'   => esc_html__( 'Fonts', '__theme_txtd' ),
			'options' => array(
				'main_content_title_body_fonts_section' => array(
					'type' => 'html',
					'html' => '<span class="separator sub-section label">' . esc_html__( 'Body Fonts', '__theme_txtd' ) . '</span>',
				),
				'body_font'       => array(
					'type'              => 'font',
					'label'             => esc_html__( 'Body', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Content', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Lead Paragraphs', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
				'main_content_title_heading_fonts_section' => array(
					'type' => 'html',
					'html' => '<span class="separator sub-section label">' . esc_html__( 'Heading Fonts', '__theme_txtd' ) . '</span>',
				),
				'display_font'    => array(
					'type'              => 'font',
					'label'             => esc_html__( 'Display', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Heading 1', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Heading 2', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Heading 3', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Heading 4', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Heading 5', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Heading 6', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Accent', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
				'headline_lines_spacings'   =>  array(
					'type'        => 'range',
					'label'       => esc_html__( 'Headline Lines Spacing', '__theme_txtd' ),
					'desc'        => esc_html__( 'The vertical distance between primary and secondary titles.', '__theme_txtd' ),
					'live'        => true,
					'default'     => -0.3,
					'input_attrs' => array(
						'min'          => -1,
						'max'          => 0.3,
						'step'         => 0.1,
						'data-preview' => true,
					),
					'css'         => array(
						array(
							'property' => '--theme-headline-spacing-setting',
							'selector' => ':root',
							'unit'     => '',
						),
					),
				),
				'main_content_title_other_fonts_section' => array(
					'type' => 'html',
					'html' => '<span class="separator sub-section label">' . esc_html__( 'Other Fonts', '__theme_txtd' ) . '</span>',
				),
				'navigation_font' => array(
					'type'              => 'font',
					'label'             => esc_html__( 'Navigation', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Buttons', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
					'type'              => 'font',
					'label'             => esc_html__( 'Meta', '__theme_txtd' ),
					'desc'              => esc_html__( '', '__theme_txtd' ),
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
