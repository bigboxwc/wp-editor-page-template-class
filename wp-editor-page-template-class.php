<?php
/**
 * Plugin Name: Editor Page Template Class
 * Plugin URI: https://bigboxwc.com/
 * Description: Add the selected page template's class to the `.editor-styles-wrapper` <div>.
 * Version: 1.0.0
 * Author: Spencer Finnell
 *
 * @package BigBox\EditorPageTemplateClass
 * @category Bootstrap
 * @author Spencer Finnell
 */

namespace BigBox\EditorPageTemplateClass;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Current version -- automatically updated on release.
define( __NAMESPACE__ . '\\VERSION', '%PLUGIN_VERSION%' );

// Plugin path and URL.
define( __NAMESPACE__ . '\\PATH', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\\URL', plugin_dir_url( __FILE__ ) );

// Composer autoloader.
require_once __DIR__ . '/bootstrap/version-check.php';

// Composer autoloader.
require_once __DIR__ . '/bootstrap/autoload.php';

// Start things.
require_once __DIR__ . '/bootstrap/app.php';
