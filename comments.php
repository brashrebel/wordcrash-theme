<?php
/**
 * Template for displaying comments.
 *
 * @package WordCrash
 */

/*
 * If the current post is protected will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
	<div class="post-bottom clearfix">


	</div>

	<div class="post-comments">
			<?php
				wp_list_comments( array(
					'style'      => 'div',
					'short_ping' => true,
					'avatar_size' => 56,
				) );
			?>

	</div> <!--  .post-comments -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'wordcrash' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'wordcrash' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
