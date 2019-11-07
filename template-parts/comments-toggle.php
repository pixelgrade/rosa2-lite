<?php
/**
 * The template part used for displaying the comments toggle
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<input type="checkbox" name="comments-toggle" id="nova-comments-toggle"
       class="c-comments-toggle__checkbox" <?php rosa2_lite_comments_toggle_checked_attribute(); ?> />

<label class="c-comments-toggle__label" for="nova-comments-toggle">
    <span class="c-comments-toggle__icon"></span>
    <span class="c-comments-toggle__text">
        <?php

        $comments_number = absint( get_comments_number() );

        if ( empty( $comments_number ) ) {
	        esc_html_e( 'No Comments Yet', '__theme_txtd' );
        } elseif ( 1 === $comments_number ) {
	        printf( esc_html_x( '1 Comment', 'comments title', '__theme_txtd' ) );
        } else {
	        echo esc_html(
		        sprintf(
		        /* translators: 1: number of comments */
			        _nx(
				        '%1$s Comment',
				        '%1$s Comments',
				        $comments_number,
				        'comments title',
				        '__theme_txtd'
			        ),
			        number_format_i18n( $comments_number )
		        )
	        );
        }
        ?>
    </span>
</label>
