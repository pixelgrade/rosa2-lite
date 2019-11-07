<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Replace default font palettes with custom ones
add_filter( 'customify_get_font_palettes', 'rosa2_lite_filter_font_palettes' );

function rosa2_lite_filter_font_palettes( $font_palettes ) {

	$font_palettes = array(
		'exquisite'  => array(
			'label'   => esc_html__( 'Exquisite', '__theme_txtd' ),
			'preview' => array(
				'title'                => esc_html__( 'Exquisite', '__theme_txtd' ),
				'description'          => esc_html__( 'A warm comfort, truly simple and delightfull', '__theme_txtd' ),
				'background_image_url' => 'https://cloud.pixelgrade.com/wp-content/uploads/2019/09/font-palette-exquisite.png',
			),
			'fonts_logic' => array(
				'sm_font_primary'   => array(
					'type'        => 'theme_font',
					'font_family' => 'Reforma1969',
					'font_size_to_line_height_points' => array(
						array( 17, 1.5 ),
						array( 24, 1.2 ),
						array( 32, 1.2 ),
						array( 40, 1.2 ),
						array( 66, 1.1 ),
						array( 115, 1.03 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => 500,
							'letter_spacing'  => '-0.02em',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
						array(
							'start'           => 24,
							'font_weight'     => 700,
							'letter_spacing'  => '-0.02em',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
						array(
							'start'           => 66,
							'font_weight'     => 700,
							'letter_spacing'  => '-0.03em',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_secondary' => array(
					'type'                  => 'theme_font',
					'font_family'           => 'Reforma2018',
					'font_size_to_line_height_points' => array(
						array( 17, 1.5 ),
						array( 100, 1 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => 500,
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_body'      => array(
					'type'        => 'theme_font',
					'font_family' => 'Reforma1969',
					'font_size_to_line_height_points' => array(
						array( 16, 1.7 ),
						array( 18, 1.6 ),
						array( 24, 1.6 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => 500,
							'letter_spacing'  => '-0.03em',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
						array(
							'start'           => 24,
							'font_weight'     => 500,
							'letter_spacing'  => '-0.02em',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_accent'    => array(
					'type'        => 'theme_font',
					'font_family' => 'Billy Ohio',
				),
			),
		),
		'lively'  => array(
			'label'   => esc_html__( 'Lively', '__theme_txtd' ),
			'preview' => array(
				'title'                => esc_html__( 'Lively', '__theme_txtd' ),
				'description'          => esc_html__( 'Chic and energetic with a confident nature', '__theme_txtd' ),
				'background_image_url' => 'https://cloud.pixelgrade.com/wp-content/uploads/2019/09/font-palette-lively.png',
			),
			'fonts_logic' => array(
				'sm_font_primary'   => array(
					'type'        => 'google',
					'font_family' => 'Prata',
					'font_size_to_line_height_points' => array(
						array( 16, 1.5 ),
						array( 80, 1.2 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => 'regular',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_secondary' => array(
					'type'        => 'google',
					'font_family' => 'Prata',
					'font_size_to_line_height_points' => array(
						array( 16, 1.5 ),
						array( 80, 1.2 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => 'regular',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_body'      => array(
					'type'        => 'theme_font',
					'font_family' => 'HK Grotesk',
					'font_size_to_line_height_points' => array(
						array( 16, 1.7 ),
						array( 24, 1.6 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => '400',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_accent' => array(
					'type' => 'theme_font',
					'font_family' => 'Mellony Dry Brush'
				),
			),
		),
		'voltage'  => array(
			'label'   => esc_html__( 'Voltage', '__theme_txtd' ),
			'preview' => array(
				'title'                => esc_html__( 'Voltage', '__theme_txtd' ),
				'description'          => esc_html__( 'Bold and strong, ready to make an impact', '__theme_txtd' ),
				'background_image_url' => 'https://cloud.pixelgrade.com/wp-content/uploads/2019/09/font-palette-voltage.png',
			),
			'fonts_logic' => array(
				'sm_font_primary'   => array(
					'type'        => 'theme_font',
					'font_family' => 'League Spartan',
					'font_size_to_line_height_points' => array(
						array( 16, 1.5 ),
						array( 80, 1.2 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => '400',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_secondary' => array(
					'type'        => 'theme_font',
					'font_family' => 'League Spartan',
					'font_size_to_line_height_points' => array(
						array( 16, 1.5 ),
						array( 80, 1.2 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => '400',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_body'      => array(
					'type'        => 'google',
					'font_family' => 'Poppins',
					'font_size_to_line_height_points' => array(
						array( 16, 1.7 ),
						array( 24, 1.6 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => 'regular',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_accent' => array(
					'type' => 'theme_font',
					'font_family' => 'Jandys Dua'
				),
			),
		),
		'self'  => array(
			'label'   => esc_html__( 'Self', '__theme_txtd' ),
			'preview' => array(
				'title'                => esc_html__( 'Self', '__theme_txtd' ),
				'description'          => esc_html__( 'An adventurous spirit that\'s loud and proud', '__theme_txtd' ),
				'background_image_url' => 'https://cloud.pixelgrade.com/wp-content/uploads/2019/09/font-palette-self.png',
			),
			'fonts_logic' => array(
				'sm_font_primary'   => array(
					'type'        => 'theme_font',
					'font_family' => 'YoungSerif',
					'font_size_to_line_height_points' => array(
						array( 16, 1.5 ),
						array( 80, 1.2 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => '400',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_secondary' => array(
					'type'        => 'theme_font',
					'font_family' => 'YoungSerif',
					'font_size_to_line_height_points' => array(
						array( 16, 1.5 ),
						array( 80, 1.2 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => '400',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_body'      => array(
					'type'        => 'google',
					'font_family' => 'Lato',
					'font_size_to_line_height_points' => array(
						array( 16, 1.7 ),
						array( 24, 1.6 ),
					),
					'font_styles_intervals' => array(
						array(
							'start'           => 0,
							'font_weight'     => 'regular',
							'letter_spacing'  => 'normal',
							'text_transform'  => 'none',
							'text_decoration' => 'none',
						),
					),
				),
				'sm_font_accent' => array(
					'type' => 'theme_font',
					'font_family' => 'Nermola Script'
				),
			),
		),
	);

	return $font_palettes;
}
