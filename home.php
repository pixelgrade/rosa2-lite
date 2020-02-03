<?php
/**
 * The template for displaying the blog home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

$page_id = get_option( 'page_for_posts' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			$page_for_posts = get_option( 'page_for_posts' );

			$categories = get_categories();
			if ( ! empty( $categories ) ) {
				$categories = array_filter( $categories, function ( $category ) {
					return $category->term_id !== 1;
				} );
			}

			$has_title      = ! empty( $page_for_posts );
			$has_categories = ! empty( $categories ) && ! is_wp_error( $categories );

			if ( have_posts() ) {
				if ( $has_title || $has_categories ) { ?>
					<header class="entry-header">
						<div class="entry-content has-text-align-center">

							<?php
							if ( $has_title ) {
								echo '<h1 class="page-title">' . get_the_title( $page_id ) . '</h1>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}

							if ( $has_categories ) {
								echo '<ul class="entry-meta">';
								foreach ( $categories as $category ) {
									$category_url = get_category_link( $category->term_id );
									echo '<li><a href="' . esc_url( $category_url ) . '">' . esc_html( $category->name ) . '</a></li>';
								}
								echo '</ul>';
							} ?>
						</div>

					</header><!-- .page-header -->
				<?php } ?>

				<div class="entry-content">
					<?php
					get_template_part( 'template-parts/loop' );
					rosa2_lite_the_posts_pagination(); ?>
				</div>

			<?php } else {
				get_template_part( 'template-parts/content', 'none' );
			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
