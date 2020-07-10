<?php
/*
Plugin Name: Equivalent Mobile Redirect
Description: Detect and redirect mobile visitors to the equivalent page on your mobile site.
Version: 4.4
Author: uniquelylost
Author URI: https://ndstud.io/
License: GPL3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Admin panel.
require_once 'includes/emr-options.php';

// Equivalent mobile redirect class.
require_once 'class-emr.php';
