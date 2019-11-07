<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package Rosa2 Lite
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rosa2_lite_body_classes( $classes ) {

	$classes[] = 'is-loading';

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = 'has-site-header-transparent';

	if ( rosa2_lite_page_has_hero() ) {
		$classes[] = 'has-hero';
	}

	if ( rosa2_lite_last_block_hero() ) {
		$classes[] = 'has-no-padding-bottom';
	}

	if ( rosa2_lite_has_moderate_media_card_after_hero() ) {
		$classes[] = 'has-moderate-media-card-after-hero';
	}

	return $classes;
}
add_filter( 'body_class', 'rosa2_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rosa2_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'rosa2_lite_pingback_header' );
