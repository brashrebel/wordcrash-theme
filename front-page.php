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

			<a href="#" data-reveal-id="gf-ping-form">Open the Modal without sending an ID (just for testing)</a>

			<ul class="user-grid">
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>

					<!-- 99 is the user ID, obviously this will change based on the user that this thumb is for -->
					<a href="#" class="modal-trigger" data-user-id="1" data-reveal-id="gf-ping-form">THUMB ICON</a>
				</li>
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>
					<span>THUMB ICON</span>

					<!-- 99 is the user ID, obviously this will change based on the user that this thumb is for -->
					<a href="#" class="modal-trigger" data-user-id="2" data-reveal-id="gf-ping-form">THUMB ICON</a>
				</li>
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>
					<span>THUMB ICON</span>

					<!-- 99 is the user ID, obviously this will change based on the user that this thumb is for -->
					<a href="#" class="modal-trigger" data-user-id="3" data-reveal-id="gf-ping-form">THUMB ICON</a>
				</li>
				<li>
					<span>Ann Arbor</span><br/>
					<span>Michigan</span><br/>
					<span>Pets: One cat</span><br/>
					<span>Capacity: 4 people</span><br/>
					<span>THUMB ICON</span>

					<!-- 99 is the user ID, obviously this will change based on the user that this thumb is for -->
					<a href="#" class="modal-trigger" data-user-id="4" data-reveal-id="gf-ping-form">THUMB ICON</a>
				</li>
			</ul>
		</main><!-- #main -->
		<div id="gf-ping-form" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<h2 id="modalTitle">Awesome. I have it.</h2>
			<p class="lead">Your couch.  It is mine.</p>
			<p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>

			<!-- This mimicks the input from the GF form that you will need to find. Note there's no value yet -->
			<p>The ID you just passed is.... *drumroll* ... <input type="text" class="some-notable-class-or-something" />!!</p>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
	</div><!-- #primary -->

<?php
get_footer();