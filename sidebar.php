<?php
/**
 * Sidebar that contain the main widget area.
 *
 * @package WordCrash
 */

?>

<div class="right-sidebar">

		<?php // Check if Sidebar has widgets.
		if ( is_active_sidebar( 'wordcrash-sidebar' ) ) :

			dynamic_sidebar( 'wordcrash-sidebar' );

			// Show hint where to add widgets.
			else : ?>

				<aside class="widget clearfix">
					<div class="widget-header"><h3 class="widget-title"><?php esc_html_e( 'Sidebar', 'wordcrash' ); ?></h3></div>
					<div class="textwidget">
						<p><?php esc_html_e( 'Please go to Appearance &#8594; Widgets and add some widgets to your sidebar.', 'wordcrash' ); ?></p>
					</div>
				</aside>

		<?php endif; ?>

	</div>
