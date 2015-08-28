<?php
/**
 * Home extra meta.
 *
 * @since   1.0.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', '_wordcrash_add_metaboxes_home' );
add_action( 'save_post', '_wordcrash_save_metaboxes_home' );

function _wordcrash_add_metaboxes_home() {

	global $post;

	if ( $post->ID != get_option( 'page_on_front' ) ) {
		return;
	}

	remove_post_type_support( 'page', 'editor' );

	add_meta_box(
		'extra-description',
		'Extra Description',
		'_wordcrash_mb_home_extra_description',
		'page'
	);
}

function _wordcrash_mb_home_extra_description() {

	wp_nonce_field( 'mb_home_save', 'wordcrash_nonce' );
	?>
	<textarea name="wordcrash_extra_description" class="widefat" rows="6"
		><?php echo esc_attr( get_post_meta( get_the_ID(), 'wordcrash_extra_description', true ) ); ?></textarea>
	<?php
}

function _wordcrash_save_metaboxes_home( $post_ID ) {

	if ( ! isset( $_POST['wordcrash_nonce'] ) ||
	     ! wp_verify_nonce( $_POST['wordcrash_nonce'], 'mb_home_save' ) ||
	     ! current_user_can( 'edit_posts' )
	) {
		return;
	}

	if ( isset( $_POST['wordcrash_extra_description'] ) ) {
		update_post_meta( $post_ID, 'wordcrash_extra_description', $_POST['wordcrash_extra_description'] );
	}
}