<?php
/**
 * Shortcode: Button.
 *
 * Displays a button.
 *
 * @since   1.0.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'button', 'wordcrash_sc_button' );
} );

function wordcrash_sc_button( $atts = array(), $content = '' ) {

	$atts = shortcode_atts( array(
		'link'   => '#',
		'size'   => '', // {tiny, small, large}
		'type'   => '', // {secondary},
		'expand' => 'no',
	), $atts );

	$classes = array(
		'button',
		$atts['size'],
		$atts['type'],
		$atts['expand'] == 'yes' ? 'expand' : '',
	);
	$classes = array_filter( $classes );

	return "<a href=\"$atts[link]\" class=\"" . implode( ' ', $classes ) . '">' . do_shortcode( $content ) . '</a>';
}