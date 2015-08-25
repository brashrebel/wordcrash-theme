<?php
/**
 * The theme's page file use for displaying pages.
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

<!-- Page HTML -->

<?php
get_footer();