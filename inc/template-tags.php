<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Rosa2 Lite
 */

if ( ! function_exists( 'rosa2_lite_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function rosa2_lite_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		/* translators: before post date. */
		echo '<div class="posted-on">' .
		     '<span class="screen-reader-text">' . esc_html_x( 'Posted on', 'post date', '__theme_txtd' ) . '</span>' .
		     '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' .
		     '</div>';

	}
endif;

if ( ! function_exists( 'rosa2_lite_posted_by' ) ) {

	/**
	 * Prints HTML with meta information for the current author.
	 */
	function rosa2_lite_posted_by() {
	    $author_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	    $author_name = esc_html( get_the_author() );

		echo '<span class="byline">' .
		     '<div class="screen-reader-text">' . esc_html_x( 'by', 'post author', '__theme_txtd' ) . '</div>' .
		     '<span class="author vcard"><a class="url fn n" href="' . $author_url . '">' . $author_name . '</a></span>' .
		     '</span>'; // WPCS: XSS OK.

	}
}

if ( ! function_exists( 'rosa2_lite_posted_in' ) ) {
    function rosa2_lite_posted_in() {
        rosa2_lite_categories_posted_in();
        rosa2_lite_tags_posted_in();
    }
}

if ( ! function_exists( 'rosa2_lite_categories_posted_in' ) ) {
	function rosa2_lite_categories_posted_in() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', '__theme_txtd' ) );
			if ( $categories_list ) {
				/* translators: before list of categories. */
				echo '<div class="cat-links"><span class="screen-reader-text">' . esc_html_x( 'Posted in', 'post categories', '__theme_txtd' ) . '</span>' . $categories_list . '</div>';
			}
		}
	}
}

if ( ! function_exists( 'rosa2_lite_tags_posted_in' ) ) {
	function rosa2_lite_tags_posted_in() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', '__theme_txtd' ) );
			if ( $tags_list ) {
				/* translators: before list of tags. */
				echo '<div class="tags-links"><span class="screen-reader-text">' . esc_html_x( 'Tagged', 'post tags', '__theme_txtd' ) . '</span>' . $tags_list . '</div>';
			}
		}
	}
}

if ( ! function_exists( 'rosa2_lite_comments_link' ) ) {
	function rosa2_lite_comments_link() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', '__theme_txtd' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'rosa2_lite_edit_post_link' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function rosa2_lite_edit_post_link() {

		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', '__theme_txtd' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
}

if ( ! function_exists( 'rosa2_lite_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function rosa2_lite_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) { ?>

            <div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

		<?php } else { ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) ); ?>
			</a>

			<?php
		}
	}
endif;

if ( ! function_exists( 'rosa2_lite_the_separator' ) ) {
    function rosa2_lite_the_separator( $style = 'default' ) {
        echo '<div class="wp-block-separator is-style-' . esc_attr( $style ) . '">' . rosa2_lite_get_separator_markup() . '</div>';
    }
}

if ( ! function_exists( 'rosa2_lite_get_separator_markup' ) ) {
    function rosa2_lite_get_separator_markup() {
        ob_start();
        ?>

        <div class="c-separator">
            <div class="c-separator__arrow c-separator__arrow--left"></div>
            <div class="c-separator__line c-separator__line--left"></div>
            <div class="c-separator__symbol">
                <span><?php echo rosa2_lite_get_separator_symbol(); ?></span>
            </div>
            <div class="c-separator__line c-separator__line--right"></div>
            <div class="c-separator__arrow c-separator__arrow--right"></div>
        </div>
		<?php return apply_filters( 'rosa_separator_markup', ob_get_clean() );
	}
}

if ( ! function_exists( 'rosa2_lite_get_separator_symbol' ) ) {
	function rosa2_lite_get_separator_symbol() {
        ob_start();
        get_template_part( 'template-parts/separators/fleuron-1-svg' );
        return ob_get_clean();
	}
}

if ( ! function_exists( ' rosa2_lite_has_custom_logo_transparent' ) ) {
	/**
	 * Determines whether the site has a custom transparent logo.
	 *
	 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
	 *
	 * @return bool Whether the site has a custom logo or not.
	 */
	function rosa2_lite_has_custom_logo_transparent( $blog_id = 0 ) {
		$switched_blog = false;

		if ( is_multisite() && ! empty( $blog_id ) && get_current_blog_id() !== absint( $blog_id ) ) {
			switch_to_blog( $blog_id );
			$switched_blog = true;
		}

		$custom_logo_id = get_theme_mod( 'rosa_transparent_logo' );

		if ( $switched_blog ) {
			restore_current_blog();
		}

		return (bool) $custom_logo_id;
	}
}

if ( ! function_exists( ' rosa2_lite_get_custom_logo_transparent' ) ) {
	/**
	 * Returns a custom logo, linked to home.
	 *
	 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
	 *
	 * @return string Custom logo transparent markup.
	 */
	function rosa2_lite_get_custom_logo_transparent( $blog_id = 0 ) {
		$html          = '';
		$switched_blog = false;

		if ( is_multisite() && ! empty( $blog_id ) && get_current_blog_id() !== absint( $blog_id ) ) {
			switch_to_blog( $blog_id );
			$switched_blog = true;
		}

		$custom_logo_id = get_theme_mod( 'rosa_transparent_logo' );

		// We have a logo. Logo is go.
		if ( $custom_logo_id ) {
			$html = sprintf(
				'<a href="%1$s" class="custom-logo-link  custom-logo-link--inversed" rel="home" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$custom_logo_id, 'large', false, array(
						'class'    => 'custom-logo--transparent',
						'itemprop' => 'logo',
					)
				)
			);
		} // If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
		elseif ( is_customize_preview() ) {
			$html = sprintf(
				'<a href="%1$s" class="custom-logo-link  custom-logo-link--inversed" style="display:none;"><img class="custom-logo--transparent"/></a>',
				esc_url( home_url( '/' ) )
			);
		}

		if ( $switched_blog ) {
			restore_current_blog();
		}

		/**
		 * Filters the custom logo output.
		 *
		 * @param string $html    Custom logo HTML output.
		 * @param int    $blog_id ID of the blog to get the custom logo for.
		 */
		return apply_filters( 'rosa2_lite_get_custom_logo_transparent', $html, $blog_id );
	}
}

if ( ! function_exists( ' rosa2_lite_the_custom_logo_transparent' ) ) {
	/**
	 * Displays a custom logo transparent, linked to home.
	 *
	 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
	 */
	function rosa2_lite_the_custom_logo_transparent( $blog_id = 0 ) {
		echo rosa2_lite_get_custom_logo_transparent( $blog_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'rosa2_lite_footer_the_copyright' ) ) {
	/**
	 * Display the footer copyright.
	 */
	function rosa2_lite_footer_the_copyright() {
		$output         = '';
		$output .= '<div class="site-info">' . "\n";
		/* translators: %s: WordPress. */
		$output .= '<a href="' . esc_url( __( 'https://wordpress.org/', '__theme_txtd' ) ) . '">' . sprintf( esc_html__( 'Proudly powered by %s', '__theme_txtd' ), 'WordPress' ) . '</a>' . "\n";
		$output .= '<span class="sep"> | </span>';
		$output .= '<span class="c-footer__credits">' . sprintf( esc_html__( 'Theme: %1$s by %2$s.', '__theme_txtd' ), 'Rosa2 Lite', '<a href="https://pixelgrade.com/?utm_source=rosa2-lite-clients&utm_medium=footer&utm_campaign=rosa2-lite" title="' . esc_html__( 'The Pixelgrade Website', '__theme_txtd' ) . '" rel="nofollow">Pixelgrade</a>' ) . '</span>' . "\n";
		$output .= '</div>';
		echo apply_filters( 'rosa2_lite_footer_the_copyright', $output );
	}
}

if ( ! function_exists( 'rosa2_lite_shape_comment' ) ) {
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @param WP_Comment $comment
	 * @param array $args
	 * @param int $depth
	 */
	function rosa2_lite_shape_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; // phpcs:ignore
		switch ( $comment->comment_type ) {
			case 'pingback':
			case 'trackback': ?>

				<li class="post pingback">
				<p><?php esc_html_e( 'Pingback:', '__theme_txtd' ); ?><?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', '__theme_txtd' ), ' ' ); ?></p>
				<?php
				break;
			default: ?>

			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<article id="div-comment-<?php comment_ID(); ?>" class="comment__wrapper">
					<?php if ( 0 != $args['avatar_size'] ) : ?>
						<div class="comment__avatar"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
					<?php endif; ?>

					<div class="comment__body">

						<header class="comment__header">

							<div class="comment__author vcard">
								<?php
								/* translators: %s: comment author link */
								printf( wp_kses_post( __( '%s <span class="says">says:</span>', '__theme_txtd' ) ), sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) );
								?>
							</div><!-- .comment-author -->

							<div class="comment__metadata">
								<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
									<time datetime="<?php esc_attr( get_comment_time( 'c' ) ); ?>">
										<?php
										/* translators: 1: comment date, 2: comment time */
										printf( esc_html__( '%1$s at %2$s', '__theme_txtd' ), esc_html( get_comment_date( '', $comment ) ), esc_html( get_comment_time() ) );
										?>
									</time>
								</a>
								<?php edit_comment_link( esc_html__( 'Edit', '__theme_txtd' ), '<span class="comment__edit">', '</span>' ); ?>
							</div><!-- .comment-metadata -->

							<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', '__theme_txtd' ); ?></p>
							<?php endif; ?>

						</header><!-- .comment-meta -->

						<div class="comment__content">
							<?php comment_text( $comment ); ?>
						</div><!-- .comment-content -->

						<?php
						comment_reply_link(
							array_merge(
								$args, array(
									'add_below' => 'div-comment',
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
									'before'    => '<div class="comment__reply">',
									'after'     => '</div>',
								)
							),
							$comment
						);
						?>
					</div>
				</article><!-- .comment-body -->
				<?php
				break;
		}
	}
}

if ( ! function_exists( 'rosa2_lite_comments_toggle_checked_attribute' ) ) {
	/**
	 * Print the comment show/hide control's checked HTML attribute.
	 *
	 * We only accept two outcomes: either output 'checked="checked"' or nothing.
	 */
	function rosa2_lite_comments_toggle_checked_attribute() {
		echo rosa2_lite_get_comments_toggle_checked_attribute();
	}
}


if ( ! function_exists( 'rosa2_lite_get_comments_toggle_checked_attribute' ) ) {
	/**
	 * Return the comment show/hide control's checked HTML attribute.
	 *
	 * @return string
	 */
	function rosa2_lite_get_comments_toggle_checked_attribute() {
		$attribute = 'checked';

		return apply_filters( 'pixelgrade_get_comments_toggle_checked_attribute', $attribute );
	}
}

if ( ! function_exists( 'rosa2_lite_the_read_more_button' ) ) {
	function rosa2_lite_the_read_more_button() {
		echo rosa2_lite_get_read_more_button();
	}
}

if ( ! function_exists( 'rosa2_lite_get_read_more_button' ) ) {
	function rosa2_lite_get_read_more_button() {

		return
			'<div class="wp-block-button aligncenter is-style-text">' .
			'<a class="wp-block-button__link" href="' . esc_url( get_permalink() ) . '">' . sprintf( wp_kses_post( __( 'Read more <span class="screen-reader-text">about "%s"</span>', '__theme_txtd' ) ), get_the_title() ) . '</a>' .
			'</div>';
	}
}

if ( ! function_exists( 'rosa2_lite_the_posts_pagination' ) ) {
	/**
	 * Displays a paginated navigation to next/previous set of posts, when applicable.
	 *
	 * @param array $args Optional. See paginate_links() for available arguments.
	 *                    Default empty array.
	 */
	function rosa2_lite_the_posts_pagination( $args = array() ) {
		echo rosa2_lite_get_the_posts_pagination( $args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'rosa2_lite_get_the_posts_pagination' ) ) {
	/**
	 * Retrieves a paginated navigation to next/previous set of posts, when applicable.
	 *
	 * @param array $args Optional. See paginate_links() for options.
	 *
	 * @return string Markup for pagination links.
	 */
	function rosa2_lite_get_the_posts_pagination( $args = array() ) {
		// Put our own defaults in place
		$args = wp_parse_args(
			$args, array(
				'end_size'           => 1,
				'mid_size'           => 2,
				'type'               => 'plain',
				'prev_text'          => esc_html_x( 'Previous', 'previous set of posts', '__theme_txtd' ),
				'next_text'          => esc_html_x( 'Next', 'next set of posts', '__theme_txtd' ),
				'screen_reader_text' => esc_html__( 'Posts navigation', '__theme_txtd' ),
			)
		);

		return get_the_posts_pagination( $args );
	}
}

/**
 * Displays the navigation to next/previous post, when applicable.
 *
 * @param array $args Optional. See get_the_post_navigation() for available arguments.
 *                    Default empty array.
 * @return void
 */
function rosa2_lite_the_post_navigation( $args = array() ) {
	echo rosa2_lite_get_the_post_navigation( $args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

if ( ! function_exists( 'rosa2_lite_get_the_post_navigation' ) ) {
	/**
	 * Retrieves the navigation to next/previous post, when applicable.
	 *
	 * @param array $args {
	 *     Optional. Default post navigation arguments. Default empty array.
	 *
	 * @type string $prev_text Anchor text to display in the previous post link. Default '%title'.
	 * @type string $next_text Anchor text to display in the next post link. Default '%title'.
	 * @type bool $in_same_term Whether link should be in a same taxonomy term. Default false.
	 * @type array|string $excluded_terms Array or comma-separated list of excluded term IDs. Default empty.
	 * @type string $taxonomy Taxonomy, if `$in_same_term` is true. Default 'category'.
	 * @type string $screen_reader_text Screen reader text for nav element. Default 'Post navigation'.
	 * }
	 * @return string Markup for post links.
	 */
	function rosa2_lite_get_the_post_navigation( $args = array() ) {
		$args = wp_parse_args(
			$args, array(
				'prev_text'          => '%title',
				'next_text'          => '%title',
				'in_same_term'       => false,
				'excluded_terms'     => '',
				'taxonomy'           => 'category',
				'screen_reader_text' => esc_html__( 'Post navigation', '__theme_txtd' ),
			)
		);

		$navigation = '';

		$previous = get_previous_post_link(
			'<div class="post-navigation__link post-navigation__link--previous"><span class="post-navigation__link-label  post-navigation__link-label--previous">' . esc_html__( 'Previous article', '__theme_txtd' ) . '</span><span class="post-navigation__post-title  post-navigation__post-title--previous">%link</span></div>',
			$args['prev_text'],
			$args['in_same_term'],
			$args['excluded_terms'],
			$args['taxonomy']
		);

		$next = get_next_post_link(
			'<div class="post-navigation__link post-navigation__link--next"><span class="post-navigation__link-label  post-navigation__link-label--next">' . esc_html__( 'Next article', '__theme_txtd' ) . '</span><span class="post-navigation__post-title  post-navigation__post-title--next">%link</span></div>',
			$args['next_text'],
			$args['in_same_term'],
			$args['excluded_terms'],
			$args['taxonomy']
		);

		// Only add markup if there's somewhere to navigate to.
		if ( $previous || $next ) {
			$navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
		}

		return apply_filters( 'rosa2_lite_get_the_post_navigation', $navigation, $args );
	}
}

if ( ! function_exists( 'rosa2_lite_please_select_a_menu_fallback' ) ) {
	function rosa2_lite_please_select_a_menu_fallback() {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		echo '
		<ul class="menu" >
			<li><a href="' . esc_url( admin_url( 'nav-menus.php?action=locations' ) ) . '">' . esc_html__( 'Please select a menu in this location', '__theme_txtd' ) . '</a></li>
		</ul>';
	}
}
