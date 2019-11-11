<?php
/**
 * Handle the Nova Blocks integration logic.
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rosa2_lite_novablocks_setup' ) ) {
	function rosa2_lite_novablocks_setup() {
		add_theme_support( 'novablocks', array(
			'headline',
			'menu-food',
			'hero',
			'media',
		) );
	}
}
add_action( 'after_setup_theme', 'rosa2_lite_novablocks_setup', 10 );

if ( ! function_exists( 'rosa2_lite_alter_novablocks_hero_settings' ) ) {
	function rosa2_lite_alter_novablocks_hero_settings( $settings ) {
		$settings['hero']['template'] = array(
			array(
				'core/separator',
				array(
					'className' => 'is-style-decorative',
				),
			),
			array(
				'novablocks/headline',
				array(
					'secondary' => esc_html__( 'This is a catchy', '__theme_txtd' ),
					'primary'   => esc_html__( 'Headline', '__theme_txtd' ),
					'align'     => 'center',
					'level'     => 1,
					'fontSize'     => 'larger',
					'className' => 'has-larger-font-size',
				),
			),
			array(
				'core/paragraph',
				array(
					'content'   => esc_html__( 'A brilliant subtitle to explain its catchiness', '__theme_txtd' ),
					'className' => 'is-style-lead',
				),
			)
		);

		$settings['hero']['scrollIndicatorMarkup'] = '<svg width="160" height="50" viewBox="0 0 160 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 50C55 50 45 0 80 0C115 0 105 50 160 50H0Z" fill="currentColor"/></svg>';

		return $settings;
	}
}
add_filter( 'novablocks_block_editor_settings', 'rosa2_lite_alter_novablocks_hero_settings' );

if ( ! function_exists( 'rosa2_lite_alter_novablocks_media_settings' ) ) {
	function rosa2_lite_alter_novablocks_media_settings( $settings ) {
		$settings['media']['template'] = array(
			array(
				'novablocks/headline',
				array(
					'secondary' => esc_html__( 'Discover', '__theme_txtd' ),
					'primary'   => esc_html__( 'Our Story', '__theme_txtd' ),
					'align'     => 'center',
					'level'     => 2,
					'fontSize'  => 'larger',
					'className' => 'has-larger-font-size',
				),
			),
			array(
				'core/separator',
				array(
					'style'     => 'flower',
					'className' => 'is-style-decorative',
				),
			),
			array(
				'core/paragraph',
				array(
					'content' => esc_html__( 'We have always defined ourselves by the ability to overcome the impossible. And we count these moments. These moments when we dare to aim higher, to break barriers, to make the unknown known.', '__theme_txtd' ),
					'align'   => 'center',
				),
			),
			array(
				'core/button',
				array(
					'text'      => esc_html__( 'Learn More', '__theme_txtd' ),
					'align'     => 'center',
					'className' => 'is-style-text'
				),
			),
		);

		$settings['media']['attributes']['horizontalAlignment']['default'] = 'center';

		if ( ! empty( $settings['media']['blockAreaOptions'] ) ) {
			$settings['media']['blockAreaOptions'] = array_filter( $settings['media']['blockAreaOptions'], function ( $option ) {
				return $option['value'] != 'highlighted';
			} );
		}

		return $settings;
	}
}
add_filter( 'novablocks_block_editor_settings', 'rosa2_lite_alter_novablocks_media_settings' );

if ( ! function_exists( 'rosa2_lite_alter_novablocks_separator_settings' ) ) {
	function rosa2_lite_alter_novablocks_separator_settings( $settings ) {
		if ( empty( $settings['separator'] ) ) {
			$settings['separator'] = array();
		}

		$settings['separator']['markup'] = rosa2_lite_get_separator_markup();

		return $settings;
	}
}
add_filter( 'novablocks_block_editor_settings', 'rosa2_lite_alter_novablocks_separator_settings' );
