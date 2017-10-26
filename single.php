<?php
/**
 * The theme's single file use for displaying single posts.
 *
 * @since 0.1.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

the_post();
comments_template();

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) : ?>
	<div class="comment-form-wrapper">
		<?php comment_form( array(
			'title_reply' => '<span>' . __( 'Leave a Comment', 'wordcrash' ) . '</span>',
			'comment_notes_after' => ''
			)
		); ?>
	</div> <!--  .comment-formwrapper -->
<?php endif; ?>

	<!-- Single HTML -->

<?php
get_footer();
