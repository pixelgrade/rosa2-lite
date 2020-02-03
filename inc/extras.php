<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Rosa2 Lite
 */

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since 5.2.0
		 */
		do_action( 'wp_body_open' );
	}
}

function rosa2_lite_page_has_hero() {
	global $post;

	if ( ! empty( $post->post_content ) && has_blocks( $post->post_content ) ) {
		$blocks = parse_blocks( $post->post_content );

		if ( $blocks[0]['blockName'] === 'novablocks/hero' || $blocks[0]['blockName'] === 'novablocks/slideshow' ) {
			return true;
		}
	}

	return false;
}

function rosa2_lite_last_block_hero() {
	global $post;

	if ( ! empty( $post->post_content ) && has_blocks( $post->post_content ) ) {
		$blocks = parse_blocks( $post->post_content );
		$count = count( $blocks );
		$lastBlockName = $blocks[ $count - 1 ]['blockName'];

        return $lastBlockName === 'novablocks/hero' || $lastBlockName === 'novablocks/slideshow';
	}

	return false;
}
add_action('rosa2_before_header', 'rosa2_lite_last_block_hero');

function rosa2_lite_has_moderate_media_card_after_hero() {
	global $post;

	if ( ! empty( $post->post_content ) && has_blocks( $post->post_content ) ) {
		$blocks = parse_blocks( $post->post_content );
		$blocks = array_filter( $blocks, 'rosa2_lite_exclude_null_blocks' );
		$blocks = array_values( $blocks );

		if ( count( $blocks ) > 1 ) {
		    $firstBlockIsHero = $blocks[0]['blockName'] === 'novablocks/hero';
		    $secondBlockIsMedia = $blocks[1]['blockName'] === 'novablocks/media';
		    if ( $firstBlockIsHero && $secondBlockIsMedia ) {
		    	return isset( $blocks[1]['attrs']['blockStyle'] ) && $blocks[1]['attrs']['blockStyle'] === 'moderate';
		    }
		}
	}

	return false;
}

function rosa2_lite_exclude_null_blocks( $block ) {
    return ! empty( $block['blockName'] );
}

if ( ! function_exists( 'rosa2_lite_alter_logo_markup' ) ) {
	function rosa2_lite_alter_logo_markup() {

		if ( has_custom_logo() || rosa2_lite_has_custom_logo_transparent() ) { ?>

			<div class="c-logo site-logo">
				<?php if ( has_custom_logo() ) { ?>
					<div class="c-logo__default">
						<?php the_custom_logo(); ?>
					</div>
				<?php } ?>

				<?php if ( rosa2_lite_has_custom_logo_transparent() ) { ?>
					<div class="c-logo__inverted">
						<?php rosa2_lite_the_custom_logo_transparent(); ?>
					</div>
				<?php } ?>
			</div>

		<?php }
	}
}
add_filter( 'novablocks_logo_markup', 'rosa2_lite_alter_logo_markup' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function rosa2_lite_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
<script>
  /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
</script>
	<?php
}
// We will put this script inline since it is so small.
add_action( 'wp_print_footer_scripts', 'rosa2_lite_skip_link_focus_fix' );

if ( ! function_exists( 'rosa2_lite_custom_excerpt_length' ) ) {
	/**
	 * Filter the except length to 25 words.
	 *
	 * @param int $length Excerpt length.
	 *
	 * @return int (Maybe) modified excerpt length.
	 */
	function rosa2_lite_custom_excerpt_length( $length ) {
		return 25;
	}
}
add_filter( 'excerpt_length', 'rosa2_lite_custom_excerpt_length', 50 );

if ( ! function_exists( 'rosa2_lite_google_fonts_url' ) ) {
	/**
	 * Register Google fonts for Rosa2 Lite.
	 *
	 * @since Rosa2 Lite 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function rosa2_lite_google_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';


		/* Translators: If there are characters in your language that are not
		* supported by Montserrat, translate this to 'off'. Do not translate
		* into your own language.
		*/
		if ( 'off' !== esc_html_x( 'on', 'Montserrat font: on or off', '__theme_txtd' ) ) {
			$fonts[] = 'Montserrat:700';
		}

		/* Translators: If there are characters in your language that are not
		* supported by Source Sans Pro, translate this to 'off'. Do not translate
		* into your own language.
		*/
		if ( 'off' !== esc_html_x( 'on', 'Source Sans Pro font: on or off', '__theme_txtd' ) ) {
			$fonts[] = 'Source Sans Pro:400';
		}

		/* Translators: If there are characters in your language that are not
		* supported by Yesteryear, translate this to 'off'. Do not translate
		* into your own language.
		*/
		if ( 'off' !== esc_html_x( 'on', 'Yesteryear font: on or off', '__theme_txtd' ) ) {
			$fonts[] = 'Yesteryear:400';
		}

		/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = esc_html_x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', '__theme_txtd' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => rawurlencode( implode( '|', $fonts ) ),
				'subset' => rawurlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	} #function
}
