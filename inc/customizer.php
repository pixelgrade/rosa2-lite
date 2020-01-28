<?php
/**
 * Rosa 2 Theme Customizer logic.
 *
 * @package Rosa2 Lite
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rosa2_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title',
			'render_callback' => 'rosa2_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'render_callback' => 'rosa2_lite_customize_partial_blogdescription',
		) );
	}

	// add a setting for the site logo
	$wp_customize->add_setting('rosa_transparent_logo', array(
		'theme_supports' => array( 'custom-logo' ),
		'transport'      => 'postMessage',
		'sanitize_callback' => 'rosa2_lite_sanitize_transparent_logo',
	) );

	// Add a control to upload the logo
	// But first get the custom logo options
	$custom_logo_args = get_theme_support( 'custom-logo' );
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'rosa_transparent_logo',
		array(
			'label' => esc_html__( 'Logo while on Transparent Header', '__theme_txtd' ),
			'button_labels' => array(
				'select'       => esc_html__( 'Select logo', '__theme_txtd' ),
				'change'       => esc_html__( 'Change logo', '__theme_txtd' ),
				'default'      => esc_html__( 'Default', '__theme_txtd' ),
				'remove'       => esc_html__( 'Remove', '__theme_txtd' ),
				'placeholder'  => esc_html__( 'No logo selected', '__theme_txtd' ),
				'frame_title'  => esc_html__( 'Select logo', '__theme_txtd' ),
				'frame_button' => esc_html__( 'Choose logo', '__theme_txtd' ),
			),
			'section' => 'title_tagline',
			'priority'      => 9, // put it after the normal logo that has priority 8
			'height'        => $custom_logo_args[0]['height'],
			'width'         => $custom_logo_args[0]['width'],
			'flex_height'   => $custom_logo_args[0]['flex-height'],
			'flex_width'    => $custom_logo_args[0]['flex-width'],
		) ) );

	$wp_customize->selective_refresh->add_partial( 'rosa_transparent_logo', array(
		'settings'            => array( 'rosa_transparent_logo' ),
		'selector'            => '.custom-logo-link--transparent',
		'render_callback'     => 'rosa2_lite_customizer_partial_transparent_logo',
		'container_inclusive' => true,
	) );

	// View Pro
	$wp_customize->add_section( 'pro__section', array(
		'title'       => '' . esc_html__( 'View PRO Version', '__theme_txtd' ),
		'priority'    => 2,
		'description' => sprintf(
		/* translators: %s: The view pro link. */
			__( '<div class="upsell-container">
					<h2>Need More? Go PRO</h2>
					<p>Take it to the next level and stand out. See the hotspots of Rosa 2 PRO:</p>
					<ul class="upsell-features">
                            <li>
                            	<h4>Personalize to Match Your Branding</h4>
                            	<div class="description">Showcase your brand in an easy and smart way by using Style Manager, an intuitive interface that allows you to change color and font palettes and with a few clicks until they fully represent your business.</div>
                            </li>
                            
                            <li>
                            	<h4>New Doppler Scrolling Effect</h4>
                            	<div class="description">With Rosa 2 PRO you can impress the site visitors with full-bleed images or videos. The new Doppler effect works perfectly with portrait images and lets you highlight the parts you find most relevant for your visitors.</div>
                            </li>
                            
                            <li>
                            	<h4>Sell Online, Manage Bookings, and More</h4>
                            	<div class="description">Rosa 2 PRO is fully integrated with the famous WooCommerce plugin so you can enable food delivery in an instant. Plus, people will be able to book a table online with a few clicks. You’ll also get a Location Map for easy discovery, custom Header and Footer, an Announcement Bar for sitewide notifications, and many other features.</div>
                            </li>

                              <li>
                            	<h4>Premium Customer Support</h4>
                            	<div class="description">You will benefit by priority support from a caring and devoted team, eager to help and spread happiness. We work hard to provide a flawless experience for those who vote for us with trust and choose to be our special clients.</div>
                            </li>

                    </ul> %s </div>', '__theme_txtd' ),
			/* translators: %1$s: The view pro URL, %2$s: The view pro link text. */
			sprintf( '<a href="%1$s" target="_blank" class="button button-primary">%2$s</a>', esc_url( rosa2_lite_get_pro_link() ), esc_html__( 'Get Rosa 2 PRO', '__theme_txtd' ) )
		),
	) );

	$wp_customize->add_setting( 'rosa_lite_style_view_pro_desc', array(
		'default'           => '',
		'sanitize_callback' => '__return_true',
	) );

	$wp_customize->add_control( 'rosa_lite_style_view_pro_desc', array(
		'section' => 'pro__section',
		'type'    => 'hidden',
	) );
}
add_action( 'customize_register', 'rosa2_lite_customize_register' );

/* ============================
 * Customizer sanitization
 * ============================ */

function rosa2_lite_sanitize_transparent_logo( $input ) {

	$mimes_allowed = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png'
	);
	$extension     = get_post_mime_type( $input );

	// If file has a valid mime type return input, otherwise return FALSE
	foreach ( $mimes_allowed as $mime ) {
		if ( $extension == $mime ) {
			return $input;
		}
	}

	return false;
}

/* ============================
 * Customizer rendering helpers
 * ============================ */

/**
 * Render the site title for the selective refresh partial.
 *
 * @see rosa2_lite_customize_register()
 *
 * @return void
 */
function rosa2_lite_customize_partial_blogname() {
	return get_bloginfo( 'name', 'display' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @see rosa2_lite_customize_register()
 *
 * @return void
 */
function rosa2_lite_customize_partial_blogdescription() {
	return get_bloginfo( 'description', 'display' );
}

/**
 * Callback for rendering the custom logo, used in the custom_logo partial.
 *
 * This method exists because the partial object and context data are passed
 * into a partial's render_callback so we cannot use get_custom_logo() as
 * the render_callback directly since it expects a blog ID as the first
 * argument. When WP no longer supports PHP 5.3, this method can be removed
 * in favor of an anonymous function.
 *
 * @see WP_Customize_Manager::register_controls()
 *
 * @return string Custom logo transparent.
 */
function rosa2_lite_customizer_partial_transparent_logo() {
	return rosa2_lite_get_custom_logo_transparent();
}

/**
 * Generate a link to the Rosa Lite info page.
 */
function rosa2_lite_get_pro_link() {
	return 'https://pixelgrade.com/themes/restaurants/rosa2-pro?utm_source=rosa2-lite-clients&utm_medium=customizer&utm_campaign=rosa2-lite';
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rosa2_lite_customize_preview_js() {

	wp_enqueue_script( 'rosa2_customizer_preview', trailingslashit( get_template_directory_uri() ) . 'inc/admin/js/customize-preview.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'rosa2_lite_customize_preview_js' );

/**
 * Assets that will be loaded for the customizer sidebar.
 */
function rosa2_lite_load_customize_js() {
	wp_enqueue_style( 'rosa2-customizer-style', trailingslashit( get_template_directory_uri() ) . 'inc/admin/css/customizer.css', null, '1.0.0', false );
}
add_action( 'customize_controls_enqueue_scripts', 'rosa2_lite_load_customize_js' );
