<?php
/**
 * The theme's 404 page for showing not found pages.
 *
 * @since 0.1.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();
?>

	<div id="error-404" class="page-content row">

		<div class="columns small-12">

			<div class="page-copy">
				Sorry, but there doesn't seem to be anything here!

				Perhaps one of these pages could be helpful:
				<?php
				wp_nav_menu( array(
					'theme_location' => 'error-404',
					'container' => false,
				));
				?>
			</div>

		</div>

	</div>

<?php
get_footer();