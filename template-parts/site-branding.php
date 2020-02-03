<?php
/**
 * Template part for displaying the site logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="c-branding site-branding">

	<?php if ( has_custom_logo() || rosa2_lite_has_custom_logo_transparent() ) { ?>

        <div class="c-logo site-logo">
			<?php if ( has_custom_logo() ) { ?>
                <div class="c-logo__default">
					<?php the_custom_logo(); ?>
                </div>
			<?php }

			if ( rosa2_lite_has_custom_logo_transparent() ) { ?>
                <div class="c-logo__inverted">
					<?php rosa2_lite_the_custom_logo_transparent(); ?>
                </div>
			<?php } ?>
        </div><!-- .c-logo.site-logo -->

	<?php }

	$blog_info   = get_bloginfo( 'name' );
	$description = get_bloginfo( 'description', 'display' );

	if ( ! empty( $blog_info ) || ! empty( $description ) ) { ?>
        <div class="site-info">
			<?php
			if ( ! empty( $blog_info ) ) {
				if ( is_front_page() || is_home() ) { ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php }
			}

			if ( $description || is_customize_preview() ) { ?>
                <p class="site-description"><?php echo wp_kses_post( $description ); ?></p>
			<?php } ?>
        </div><!-- .site-info -->
	<?php } ?>

</div><!-- .c-branding.site-branding -->
