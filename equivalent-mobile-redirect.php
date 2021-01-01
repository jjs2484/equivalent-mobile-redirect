<?php
/**
 * Plugin Name: Equivalent Mobile Redirect
 * Description: Detect and redirect mobile visitors to the equivalent page on your mobile site.
 * Version: 4.5
 * Author: uniquelylost
 * Author URI: https://ndstud.io/
 * Text Domain: emr-redirect
 * Requires at least: 3.0
 * License: GPL3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Admin panel.
require_once plugin_dir_path( __FILE__ ) . 'includes/emr-options.php';

// Equivalent mobile redirect class.
require_once plugin_dir_path( __FILE__ ) . 'includes/class-emr.php';
