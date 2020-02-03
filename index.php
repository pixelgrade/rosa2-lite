<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) { ?>
				<div class="entry-content">
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
