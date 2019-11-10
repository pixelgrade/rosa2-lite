<?php
/**
 * Template Name: Full Width Template
 * Template Post Type: post, page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_page() ) {
	get_template_part( 'page' );
} else {
	get_template_part( 'single' );
}
