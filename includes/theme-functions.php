<?php
/**
 * Adds theme functions.
 *
 * @since   0.1.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

function wordcrash_function( $param ) {
	return 'I\'m an example function!';
}