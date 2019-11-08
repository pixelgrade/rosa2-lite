<?php
/**
 * Template part for displaying the site header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_template_part( 'template-parts/menu-toggle' ); ?>

<header id="masthead" class="site-header site-header--logo-center">
    <div class="site-header__wrapper">
        <div class="site-header__inner-container">
            <div class="site-header__content alignfull">
                <nav class="wp-block-novablocks-navigation site-header__menu site-header__menu--secondary">
                    <?php wp_nav_menu( array(
                        'container'      => false,
                        'theme_location' => 'secondary',
                        'menu_id'        => 'secondary-menu',
                        'fallback_cb'    => false,
	                    'depth'          => 1
                    ) ); ?>
                </nav><!-- #site-navigation -->

                <?php get_template_part( 'template-parts/site-branding' ); ?>

                <nav class="wp-block-novablocks-navigation site-header__menu site-header__menu--primary">
                    <?php wp_nav_menu( array(
                        'container'      => false,
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'fallback_cb'    => 'rosa2_lite_please_select_a_menu_fallback',
                        'depth'          => 1
                    ) ); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </div>
</header>
