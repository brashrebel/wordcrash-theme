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

the_post();

$users = get_users( array( 'role' => 'subscriber' ) );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( $extra_description = get_post_meta( get_the_ID(), 'wordcrash_extra_description', true ) ) : ?>
				<div class="site-summary">
					<div class="row">
						<div class="columns small-12">
							<?php echo wpautop( $extra_description ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<!--			<h3 class="instructions">Give them a <i class="fa fa-thumbs-up"></i> to see if you can crash with them!</h3>-->

			<?php if ( ! empty( $users ) ) : ?>
				<?php
				$states = array();
				foreach ( $users as $user ) {

					$state = get_user_meta( $user->ID, 'state', true );
					$city  = get_user_meta( $user->ID, 'city', true );

					if ( ! isset( $states[ $state ] ) ) {
						$states[ ucwords( $state ) ] = array();
					}

					if ( ! in_array( $city, $states[ $state ] ) ) {
						$states[ $state ][] = ucwords( $city );
					}
				}

				asort( $states );
				foreach ( $states as $cities ) {
					sort( $cities );
				}
				?>
				<div class="filter-hosts row">
					<div class="state columns small-12 medium-6">
						<select name="filter-hosts-state">
							<option value="0">- Choose a State -</option>
							<?php foreach ( $states as $state => $cities ) : ?>
								<option value="<?php echo $state; ?>">
									<?php echo $state; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="city columns small-12 medium-6">
						<select name="filter-hosts-city">
							<option value="0">- Choose a City -</option>
							<?php foreach ( $states as $state => $cities ) : ?>
								<?php foreach ( $cities as $city ) : ?>
									<option value="<?php echo $city; ?>" data-state="<?php echo $state; ?>">
										<?php echo $city; ?>
									</option>
								<?php endforeach; ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $users ) ) { ?>
				<ul class="crash-pad-list small-block-grid-1 medium-block-grid-2 large-block-grid-4 user-grid">
					<?php foreach ( $users as $user ) { ?>
						<?php $city = get_user_meta( $user->ID, 'city', true ); ?>
						<?php $state = get_user_meta( $user->ID, 'state', true ); ?>

						<li data-groups='["<?php echo $city; ?>", "<?php echo $state; ?>"]'>
							<div class="crash-pad">
								<h2><?php echo $city; ?></h2>

								<h3><?php echo $state; ?></h3>

								<p><strong>Pets:</strong> <?php echo get_user_meta( $user->ID, 'pets', true ); ?><br/>
									<strong>Capacity:</strong> <?php echo get_user_meta( $user->ID, 'capacity', true ); ?>
								</p>
								<a href="#" class="modal-trigger button" data-user-id="<?php echo $user->ID; ?>"
								   data-reveal-id="gf-ping-form">
									Contact Host
								</a>
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
			<?php
			if ( function_exists( 'gravity_form' ) ) {
				gravity_form( 3 );
			}
			?>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
	</div><!-- #primary -->

<?php
get_footer();