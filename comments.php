<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package icuerious
 */

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

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<!-- <h2 class="comments-title">
			<?php
			// $icuerious_comment_count = get_comments_number();
			// if ( '1' === $icuerious_comment_count ) {
			// 	printf(
			// 		/* translators: 1: title. */
			// 		esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'icuerious' ),
			// 		'<span>' . wp_kses_post( get_the_title() ) . '</span>'
			// 	);
			// } else {
			// 	printf( 
			// 		/* translators: 1: comment count number, 2: title. */
			// 		esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $icuerious_comment_count, 'comments title', 'icuerious' ) ),
			// 		number_format_i18n( $icuerious_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			// 		'<span>' . wp_kses_post( get_the_title() ) . '</span>'
			// 	);
			// }
			?>
		</h2>.comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'icuerious' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	$comments_args = array(
        // Change the title of send button 
        'label_submit' => __( 'Post', 'textdomain' ),
        // Change the title of the reply section
        'title_reply' => __( 'Write a Reply or Comment', 'textdomain' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea rows="4" placeholder="add your comment" id="comment" name="comment" aria-required="true"></textarea></p>',
);
comment_form( $comments_args );
	?>

</div><!-- #comments -->
