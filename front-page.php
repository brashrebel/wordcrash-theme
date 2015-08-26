<?php
/**
 * The theme's front-page file use for displaying the home page.
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<h3 class="instructions">Give them a <i class="fa fa-thumbs-up"></i> to see if you can crash with them!</h3>
			
			<ul class="crash-pad-list small-block-grid-4">
				<li>
					<div class="crash-pad">
						<h2>Ann Arbor</h2>
						<h3>Michigan</h3>
						<p><strong>Pets:</strong> One cat<br/>
							<strong>Capacity:</strong> 4 people</p>
						<i class="fa fa-thumbs-up"></i>
					</div>
				</li>
				<li>
					<div class="crash-pad">
						<h2>Ann Arbor</h2>
						<h3>Michigan</h3>
						<p><strong>Pets:</strong> One cat<br/>
							<strong>Capacity:</strong> 4 people</p>
						<i class="fa fa-thumbs-up"></i>
					</div>
				</li>
				<li>
					<div class="crash-pad">
						<h2>Ann Arbor</h2>
						<h3>Michigan</h3>
						<p><strong>Pets:</strong> One cat<br/>
							<strong>Capacity:</strong> 4 people</p>
						<i class="fa fa-thumbs-up"></i>
					</div>
				</li>
				<li>
					<div class="crash-pad">
						<h2>Ann Arbor</h2>
						<h3>Michigan</h3>
						<p><strong>Pets:</strong> One cat<br/>
							<strong>Capacity:</strong> 4 people</p>
						<i class="fa fa-thumbs-up"></i>
					</div>
				</li>
			</ul>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();