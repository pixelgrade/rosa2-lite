<?php
/**
 * Template part for displaying the site footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<footer id="colophon" class="site-footer  site-footer--fallback">
	<div class="site-footer__inner-container">
		<?php
		rosa2_lite_footer_the_copyright();

		if ( has_nav_menu( 'footer' ) ) { ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', '__theme_txtd' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .footer-navigation -->
		<?php } ?>
	</div><!-- .site-footer__inner-container -->
</footer><!-- #colophon -->
