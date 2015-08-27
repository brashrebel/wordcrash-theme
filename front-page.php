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

$user_query = new WP_User_Query( array( 'role' => 'Subscriber' ) );
$users      = $user_query->get_results();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h3 class="instructions">Give them a <i class="fa fa-thumbs-up"></i> to see if you can crash with them!</h3>
			<?php if ( ! empty( $user_query ) ) { ?>
				<ul class="crash-pad-list small-block-grid-1 medium-block-grid-2 large-block-grid-4 user-grid">
					<?php foreach ( $users as $user ) {
						$user_info = get_userdata( $user->ID );
						?>
						<li>
							<div class="crash-pad">
								<h2><?php echo get_user_meta( $user->ID, 'city', true ); ?></h2>

								<h3><?php echo get_user_meta( $user->ID, 'state', true ); ?></h3>

								<p><strong>Pets:</strong> <?php echo get_user_meta( $user->ID, 'pets', true ); ?><br/>
									<strong>Capacity:</strong> <?php echo get_user_meta( $user->ID, 'capacity', true ); ?>
								</p>
								<a href="#" class="modal-trigger" data-user-id="<?php echo $user->ID; ?>"
								   data-reveal-id="gf-ping-form"><i class="fa fa-thumbs-up"></i></a>
							</div>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</main>
		<!-- #main -->
		<div id="gf-ping-form" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true"
		     role="dialog">
			<h2 id="modalTitle">Contact this host</h2>
			<?php gravity_form( 3 ); ?>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
	</div><!-- #primary -->

<?php
get_footer();