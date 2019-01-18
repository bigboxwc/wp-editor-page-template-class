<?php
/**
 * Boostrap the application.
 *
 * @since 1.0.0
 *
 * @package BigBox\EditorPageTemplateClass
 * @category Bootstrap
 * @author Spencer Finnell
 */

namespace BigBox\EditorPageTemplateClass;

use const BigBox\EditorPageTemplateClass\URL;
use const BigBox\EditorPageTemplateClass\PATH;
use const BigBox\EditorPageTemplateClass\VERSION;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue editor assets.
 *
 * @since 1.0.0
 */
function enqueue_assets() {
	wp_enqueue_script(
		'bigbox-wp-editor-page-template-class',
		trailingslashit( URL ) . 'public/js/app.min.js',
		[
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		],
		VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_assets' );

/**
 * Load plugin text domain for translations.
 *
 * @since 1.0.0
 */
function load_plugin_textdomain() {
	\load_plugin_textdomain(
		'bigbox-wp-page-template-editor-class',
		false,
		trailingslashit( PATH ) . 'resources/languages/'
	);
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_plugin_textdomain' );
