<?php
/*
Plugin Name: Equivalent Mobile Redirect    
Description: This WordPress plugin will detect mobile devices and redirect the user to the equivalent mobile page as set in the plugin admin panel. 
Version: 1.3
Author: Jesse Sneider
Author URI: http://ndgraphic.com
License: GPL3
*/


$plugin_dir_path = dirname(__FILE__);
$plugin_dir_url = plugins_url('', __FILE__);
define('WPW_DESIGNER_PRESS_JOB_PLUGIN_PATH',$plugin_dir_path);
define('WPW_DESIGNER_PRESS_JOB_PLUGIN_URL',$plugin_dir_url);

$admin_path = WPW_DESIGNER_PRESS_JOB_PLUGIN_PATH . '/admin/';
$wpw_admin_url = WPW_DESIGNER_PRESS_JOB_PLUGIN_URL . '/admin/';
define('WPW_ADMIN_PATH',$admin_path);
define('WPW_ADMIN_URL',$wpw_admin_url);
require_once('admin/common-functions.php');

add_filter('template_include','wpw_template_include');
function wpw_template_include($template)
{
/*********************************
* cookie or include
*********************************/
	//Let's see if we should set the full site cookie
	$get_cookie_check = $_GET['view_full_site'];
	if(isset($get_cookie_check)){
	//strip the http://www from the domain 
	$site_url =  site_url();
	$domain = parse_url($site_url, PHP_URL_HOST);
		if($get_cookie_check =='true'){
			//set the cookie
			setcookie("mobilethe_wp_full_site", 1, time()+86400, "/", $domain);
			$_COOKIE['mobilethe_wp_full_site'] = 1;

		}
		if($get_cookie_check =='false'){
			//set the cookie
			setcookie("mobilethe_wp_full_site", 0, time()-3600, "/", $domain);
			$_COOKIE['mobilethe_wp_full_site'] = 0;

		}
	}
	//cookie variable
	$full_site_cookie= $_COOKIE['mobilethe_wp_full_site']; 
	
	//cookie empty then include
	if (empty($full_site_cookie) && (wpw_get_option('wpw_emr_thehomeenable') && (is_front_page() || is_home()))){
	include('includes/Mobile_Detect.php');
	$detect = new Mobile_Detect();
    if ($detect->isMobile()){
	wp_redirect(wpw_get_option('wpw_emr_home')); exit;}}
	elseif (empty($full_site_cookie) && (wpw_get_option('wpw_emr_enable') && (is_single() || is_page())))
	{
		include('includes/Mobile_Detect.php');
		
		$page_array = array();
		
		$page_array[] = trim(wpw_get_option('wpw_emr_t1'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t2'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t3'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t4'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t5'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t6'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t7'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t8'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t9'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t10'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t11'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t12'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t13'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t14'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t15'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t16'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t17'));
		$page_array[] = trim(wpw_get_option('wpw_emr_t18'));

		$title = get_the_title();
		if($title && $page_array && in_array($title,$page_array))
		{
			$selectedkey = array_keys($page_array, $title);
			$url = trim(wpw_get_option('wpw_emr_murl'.($selectedkey[0]+1)));
			if(strlen($url)>4)
			{
				$detect = new Mobile_Detect();
				if ($detect->isMobile())
				{
					wp_redirect($url);exit;
				}
			}
		}
	}
	return $template;	
}
	