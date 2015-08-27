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
?>

	<!-- Single HTML -->

<?php
get_footer();