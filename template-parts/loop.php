<?php
/**
 * Template part for displaying the posts loop.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* The Loop */
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content' );
endwhile;
