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
				$countries = array();
				foreach ( $users as $user ) {

					$country = get_user_meta( $user->ID, 'country', true );
                    $country = trim( $country );
					$state   = get_user_meta( $user->ID, 'state', true );
					$city    = get_user_meta( $user->ID, 'city', true );
					
					if ( empty( $country ) || 
					   empty( $state ) ||
						empty( $city ) ) continue;

					// Long-form for the Dropdown, show only "USA" for each Host in the List for brevity
					if ( strtolower( $country ) == 'usa' ) $country = 'United States of America';

					if ( ! isset( $countries[ $country ][ ucwords( $state ) ][ $city ] ) ) {
						$countries[ $country ][ ucwords( $state ) ][ $city ] = array();
					}

					if ( ! in_array( $city, $countries[ $country ][ ucwords( $state ) ] ) ) {
						$countries[ $country ][ ucwords( $state ) ][ $city ] = ucwords( $city );
					}

                }

				ksort( $countries );

				// USA at the top
				if ( isset( $countries['United States of America'] ) ) {

					$usa = $countries['United States of America'];
					unset( $countries['United States of America'] );

					$countries = array_merge( array( 'United States of America' => $usa ), $countries );

				}

				foreach ( $countries as &$states_pointer ) {
					ksort( $states_pointer );

					foreach( $states_pointer as &$cities_pointer ) {

						sort( $cities_pointer );

					}

				}
				?>
				<div class="filter-hosts row">
					<div class="country columns small-12 medium-4">
						<select name="filter-hosts-country">
							<option value="0">- Choose a Country -</option>
							<?php foreach ( $countries as $country => $states ) : ?>
								<option value="<?php echo $country; ?>">
									<?php echo $country; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="state columns small-12 medium-4">
						<select name="filter-hosts-state">
							<option value="0">- Choose a State/Province -</option>
							<?php foreach ( $countries as $country => $states ) : ?>
								<?php foreach ( $states as $state => $cities ) : ?>
									<option value="<?php echo ucwords( $state ); ?>" data-country="<?php echo $country; ?>">
										<?php echo $state; ?>
									</option>
								<?php endforeach; ?>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="city columns small-12 medium-4">
						<select name="filter-hosts-city">
							<option value="0">- Choose a City -</option>
							<?php foreach ( $countries as $country => $states ) :
								foreach ( $states as $state => $cities ) :
									foreach ( $cities as $city ) : ?>
										<option value="<?php echo $city; ?>" data-country="<?php echo $country; ?>" data-state="<?php echo $state; ?>">
											<?php echo $city; ?>
										</option>
									<?php endforeach;
								endforeach;
							endforeach; ?>
						</select>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $users ) ) { ?>
				<ul class="crash-pad-list small-block-grid-1 medium-block-grid-2 large-block-grid-4 user-grid">
					<?php foreach ( $users as $user ) :
						$city = get_user_meta( $user->ID, 'city', true );
						$state = get_user_meta( $user->ID, 'state', true );
						$country = get_user_meta( $user->ID, 'country', true );

						?>

						<li data-groups='["<?php echo $city; ?>", "<?php echo $state; ?>", "<?php echo ( strtolower( $country ) == 'usa' ) ? 'United States of America' : $country; ?>"]'>
							<div class="crash-pad">
								<h2><?php echo $city; ?></h2>

								<h3><?php echo $state; ?>, <?php echo $country; ?></h3>

								<p><strong>Pets:</strong> <?php echo get_user_meta( $user->ID, 'pets', true ); ?><br/>
									<strong>Capacity:</strong> <?php echo get_user_meta( $user->ID, 'capacity', true ); ?>
								</p>
								<a href="#" class="modal-trigger button" data-user-id="<?php echo $user->ID; ?>"
								   data-reveal-id="gf-ping-form">
									Contact Host
								</a>
							</div>
						</li>
					<?php endforeach; ?>
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
