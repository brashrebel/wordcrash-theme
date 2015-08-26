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
			<ul>
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>
					<a href="#" data-reveal-id="gf-ping-form">THUMB ICON</a>
				</li>
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>
					<span>THUMB ICON</span>
				</li>
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>
					<span>THUMB ICON</span>
				</li>
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>
					<span>THUMB ICON</span>
				</li>
			</ul>
		</main><!-- #main -->
		<div id="gf-ping-form" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<h2 id="modalTitle">Awesome. I have it.</h2>
			<p class="lead">Your couch.  It is mine.</p>
			<p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
	</div><!-- #primary -->

<?php
get_footer();