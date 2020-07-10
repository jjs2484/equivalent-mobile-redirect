<?php
/*
Plugin Name: Equivalent Mobile Redirect
Description: Detect and redirect mobile visitors to the equivalent page on your mobile site.
Version: 4.4
Text Domain: emr-redirect
Author: uniquelylost
Author URI: https://ndstud.io/
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Admin panel.
require_once 'includes/emr-options.php';

// Equivalent mobile redirect class.
require_once 'includes/class-emr.php';
