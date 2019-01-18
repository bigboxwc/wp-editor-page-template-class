<?php
/**
 * Check if version requirements are met before allowing the plugin to run.
 *
 * @since 1.0.0
 *
 * @package BigBox\EditorPageTemplateClass
 * @category Bootstrap
 * @author Spencer Finnell
 */

namespace BigBox\EditorPageTemplateClass;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Minimum PHP version.
define( __NAMESPACE__ . '\\REQUIRED_PHP_VERSION', '7.0.0' );

// Do not allow the theme to be active if the PHP version is not met.
if ( version_compare( PHP_VERSION, REQUIRED_PHP_VERSION, '<' ) ) {
	add_action( 'admin_notices', 'php_admin_notices' );

	if ( is_admin() ) {
		return;
	}

	wp_die( get_php_notice_text() );
}

/**
 * Output a notice that the minimum PHP version is not met.
 *
 * @since 1.10.0
 */
function php_admin_notices() {
	echo '<div class="notice notice-error"><p>' . get_php_notice_text() . '</p></div>';
}

/**
 * PHP upgrade notice text.
 *
 * @since 1.0.0
 *
 * @return string
 */
function get_php_notice_text() {
	/**
	 * Filter text shown when current PHP version does not meet requirements.
	 *
	 * @since 1.0.0
	 *
	 * @param string $text Text to display.
	 */
	return apply_filters(
		'bigbox_wp_page_template_editor_class_php_notice_text',
		/* translators: %s Minimum PHP version required for theme to run. */
		wp_kses_post( sprintf( __( 'Plugin requires PHP version <code>%s</code> or above to be active. Please contact your web host to upgrade.', 'bigbox-wp-page-template-editor-class' ), esc_attr( REQUIRED_PHP_VERSION ) ) )
	);
}
