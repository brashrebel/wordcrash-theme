<?php
/**
 * The theme's header file that appears on EVERY page.
 *
 * @since   0.1.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="container">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="logo">
				<?php get_template_part( 'assets/images/WordCrash.svg' ); ?>
			</a>

			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
			                         rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php endif; ?>
		</div>
		<!-- .site-branding -->
	</header>
	<!-- .site-header -->

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<div id="primary-navigation" class="primary-navigation" role="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'primary-navigation',
			'fallback_cb'    => '__return_false',
		) );
		?>
	</div><!-- #info-bar-navigation -->
<?php endif; ?>