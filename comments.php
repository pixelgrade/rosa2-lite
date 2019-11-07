<?php
/**
 * The template for displaying comments.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

    <?php get_template_part( 'template-parts/comments-toggle' ); ?>

    <div class="comments-area__wrap">
        <div class="comments-area__content">

            <?php
            // You can start editing here -- including this comment!
            if ( have_comments() ) { ?>

                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // Are there comments to navigate through? ?>
                    <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', '__theme_txtd' ); ?></h2>
                        <div class="nav-links">
                            <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', '__theme_txtd' ) ); ?></div>
                            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', '__theme_txtd' ) ); ?></div>
                        </div><!-- .nav-links -->
                    </nav><!-- #comment-nav-above -->
                <?php } // Check for comment navigation. ?>

                <ol class="comment-list">
                    <?php
                    wp_list_comments(
                        array(
                            'style'       => 'ol',
                            'short_ping'  => true,
                            'callback'    => 'rosa2_lite_shape_comment',
                            'avatar_size' => 56,
                        )
                    );
                    ?>
                </ol><!-- .comment-list -->

                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // Are there comments to navigate through? ?>
                    <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', '__theme_txtd' ); ?></h2>
                        <div class="nav-links">
                            <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', '__theme_txtd' ) ); ?></div>
                            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', '__theme_txtd' ) ); ?></div>
                        </div><!-- .nav-links -->
                    </nav><!-- #comment-nav-below -->
                <?php }
            }


            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>

                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', '__theme_txtd' ); ?></p>
                <?php
            }

            $args = array(
                'class_form'    => 'comment-form  inputs--alt',
                'comment_field' => '<p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', '__theme_txtd' ) .
                                   '</label><textarea id="comment" class="comment__text" name="comment" cols="45" rows="8" aria-required="true"
                                    placeholder="' . esc_attr__( 'Your comment...', '__theme_txtd' ) . '">' .
                                   '</textarea></p>',
                'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
            );
            comment_form( $args );
            ?>

        </div>
    </div>

</div><!-- #comments -->
