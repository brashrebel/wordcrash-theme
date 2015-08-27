<?php
/**
 * The theme's footer file that appears on EVERY page.
 *
 * @since 0.1.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

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

<?php // #wrapper ?>
</div>

<?php wp_footer(); ?>

</body>
</html>