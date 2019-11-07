<?php
/**
 * Template part for displaying the menu toggle.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $novablocks_responsive_navigation_outputted;

if ( empty( $novablocks_responsive_navigation_outputted ) ) { ?>

    <input class="c-menu-toggle__checkbox" id="nova-menu-toggle" type="checkbox">

    <label class="c-menu-toggle" for="nova-menu-toggle">
        <span class="c-menu-toggle__wrap">
            <span class="c-menu-toggle__icon">
                <b class="c-menu-toggle__slice c-menu-toggle__slice--top"></b>
                <b class="c-menu-toggle__slice c-menu-toggle__slice--middle"></b>
                <b class="c-menu-toggle__slice c-menu-toggle__slice--bottom"></b>
            </span>
            <span class="c-menu-toggle__label screen-reader-text"><?php esc_html_e( 'Menu', '__theme_txtd' ); ?></span>
        </span>
    </label>

	<?php
	// Remember the fact so we only output once.
	$novablocks_responsive_navigation_outputted = true;
}
