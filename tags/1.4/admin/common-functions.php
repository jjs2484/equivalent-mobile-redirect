<?php
/////////////////////////////////////////
// ************* Theme Options Page *********** //
/*$options = get_option('wpw_options');
echo '<pre>';
print_r($options);
echo '</pre>';exit;*/

$admin_menu_access_level = apply_filters('wpw_admin_menu_access_level_filter',8);
define('TEMPL_ACCESS_USER',8);
add_action('admin_menu', 'wpw_admin_menu'); //Add new menu block to admin side

add_action('wpw_admin_menu', 'wpw_add_admin_menu');
function wpw_admin_menu()
{
	do_action('wpw_admin_menu');	
}
function wpw_add_admin_menu(){
	$menu_title = apply_filters('wpw_admin_menu_title_filter',__('EMR Redirect','wpw'));
	if(function_exists(add_object_page))
    {
       add_object_page("EMR Redirect Admin Menu",  $menu_title, TEMPL_ACCESS_USER, 'wpw_theme_options', 'wpw_theme_options_options_page', WPW_ADMIN_URL.'/images/favicon.ico'); // title of new sidebar
    }
    else
    {
       add_theme_page("Admin Menu",  $menu_title, TEMPL_ACCESS_USER, 'wpw_theme_options', 'wpw_theme_options_options_page', WPW_ADMIN_URL.'/images/favicon.ico'); // title of new sidebar
    }
}

require_once ('admin-interface.php');  // Admin Interfaces
require_once ('theme-options.php');   // Options panel settings

//*******************************************************

function wpw_theme_url()
{
	return get_stylesheet_directory_uri();
}


//print_r(get_option('wpw_options'));
//
function wpw_get_option($name) {
    $options = get_option('wpw_options');
	//delete_option('wpw_options');
    if (isset($options[$name]))
        return $options[$name];
}

//
function wpw_update_option($name, $value) {
    $options = get_option('wpw_options');
    $options[$name] = $value;
    return update_option('wpw_options', $options);
}

//
function wpw_delete_option($name) {
    $options = get_option('wpw_options');
    unset($options[$name]);
    return update_option('wpw_options', $options);
}

if($_POST['page']=='wpw_theme_options' && $_POST['wpw_designerpress_css_code_disable'])
{
	update_option('wpw_designerpress_css_code_disable', $_POST['wpw_designerpress_css_code_disable']);
}

if($_GET['page']=='wpw_theme_options' && $_GET['settingsbackup']==1)
{
	if($_GET['settingsdelete']==1)
	{
		delete_option('wpw_options');
	}
	if($_POST['options'])
	{
		$options_str = unserialize($_POST['options']);
		//print_r($options_str);exit;
		update_option('wpw_options',$options_str);
		wpw_after_theme_options_saved_action_fun();
	}
	$options = get_option('wpw_options');
?>
<style type="text/css">
.section-info h3.heading {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: none repeat scroll 0 0 #EFE186;
    border-color: #FFF298 -moz-use-text-color -moz-use-text-color;
    border-image: none;
    border-right: 0 none;
    border-style: solid none none;
    border-width: 1px 0 0;
    font-size: 12px;
    font-weight: 100;
    letter-spacing: 1px;
    margin-bottom: 0;
    margin-top: 20px;
    padding: 10px 20px;
	font-family: "Lucida Grande",Sans-serif;
}
.section-info .controls {
    background: none repeat scroll 0 0 #FFF298;
    border: 1px solid #ECD852;
    color: #424242;
    font-family: Georgia,arial;
    font-size: 14px;
    font-style: italic;
    line-height: 1.5em;
    margin: 0 0 20px;
    padding: 15px 20px;
    width: auto;
}
</style>
<div class="section section-info ">
<h3 class="heading"><?php _e("Reset current settings",'wpw')?></h3>
<div class="option">
<div class="controls">
<?php /*?><a href="admin.php?page=wpw_theme_options&settingsbackup=1&settingsdelete=1"><?php _e('Delete Current Settings','wpw');?></a><?php */?>
<form action="" method="post">
<input type="hidden" name="page" value="wpw_theme_options" />
<?php $css_code_disable = get_option('wpw_designerpress_css_code_disable');
if($css_code_disable=='yes')
{
?>
<input type="hidden" name="wpw_designerpress_css_code_disable" value="no" />
<p><?php _e('The plugin settings is disabled, do you want to enable?','wpw');?></p>
<input type="submit" name="save" value="<?php _e('Enable Plugin Settings','wpw');?>" />
<?php
}else{
?>
<input type="hidden" name="wpw_designerpress_css_code_disable" value="yes" />
<p><?php _e('The plugin settings is enabled, are you sure want to disable?','wpw');?></p>
<input type="submit" name="save" value="<?php _e('Disable Plugin Settings','wpw');?>" />
<?php
}
?>

</form>
<div class="clear"> </div></div></div>
<br />

<div class="section section-info ">
<h3 class="heading"><?php _e("Get current settings backup",'wpw')?></h3>
<div class="option">
<div class="controls">
<?php _e("Please get the code from below textarea and save in the file to use in future.",'wpw')?>
<br></div><div class="explain"></div>
<div class="clear"> </div></div></div>
<textarea style="width:550px; height:350px"><?php echo serialize(get_option('wpw_options'));?></textarea>
<br /><br />


<div class="section section-info ">
<h3 class="heading"><?php _e("Upload/Restore settings backup",'wpw')?></h3>
<div class="option">
<div class="controls">
<?php _e("Please get the code you may have saved in past from above textarea and upload.",'wpw')?>
<br></div><div class="explain"></div>
<div class="clear"> </div></div></div>

<form action="" method="post">
<input type="hidden" name="page" value="wpw_theme_options" />
<input type="hidden" name="settingsbackup" value="1" />
<textarea style="width:550px; height:350px" name="options"></textarea>
<input type="submit" name="save" value="<?php _e('Upload Settings','wpw');?>" />
</form>
<br />
<?php
	exit;
}
?>