<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = get_option('current_theme');
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = wpw_get_option('of_options');
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        //Stylesheet Reader
        global $alt_stylesheets;
		
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }

	    
		
	
        // If using image radio buttons, define a directory path
        $imagepath = get_stylesheet_directory_uri() . '/images/';

        $options = array();
		
		
	/******************
		BODY SETTINGS
	******************/
        $options[] = array("name" => __("EMR Settings",'wpw'),
			"icon" => WPW_ADMIN_URL.'images/icons/home.png',
            "type" => "heading");

         $options[] = array("name" => __("Equivalent Mobile Redirect Settings",'wpw'),
            "type" => "header");
			
		$options[] = array("name" => __("Enable Redirect",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_enable",
			"desc" => "Do you want to Enable Page/Post Redirects?",
            "type" => "checkbox");
			
		$options[] = array("name" => __("Enable Homepage Redirect",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_thehomeenable",
			"desc" => "Enable the Homepage Redirect?",
            "type" => "checkbox");
		
		$options[] = array("name" => __("Mobile Homepage URL - http://m.sample.com ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_home",
			"desc" => "",
            "type" => "text");
			
		 $options[] = array("name" => __("Page Title #1 - e.g. About ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t1",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #1 - http://m.sample.com/about ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl1",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #2 - e.g. Services ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t2",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #2 - http://m.sample.com/services ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl2",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #3: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t3",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #3: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl3",
			"desc" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Page Title #4: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t4",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #4: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl4",
			"desc" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Page Title #5: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t5",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #5: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl5",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #6: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t6",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #6: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl6",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #7: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t7",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #7: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl7",
			"desc" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Page Title #8: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t8",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #8: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl8",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #9: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t9",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #9: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl9",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #10: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t10",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #10: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl10",
			"desc" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Page Title #11: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t11",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #11: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl11",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #12: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t12",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #12: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl12",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #13: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t13",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #13: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl13",
			"desc" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Page Title #14: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t14",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #14: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl14",
			"desc" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Page Title #15: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t15",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #15: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl15",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #16: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t16",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #16: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl16",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Page Title #17: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t17",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #17: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl17",
			"desc" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Page Title #18: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_t18",
			"desc" => "",
            "type" => "text");
		
		$options[] = array("name" => __("Mobile Site URL #18: ",'wpw'),
            "desc" => __("",'wpw'),
            "id" => "wpw_emr_murl18",
			"desc" => "",
            "type" => "text");
			
			
			$options[] = array("name" => __("View Full Site Option",'wpw'),
			"std" => 'If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site. The cookie will expire after one day.',
            "type" => "info");
			

        wpw_update_option('of_template', $options);
    }
}
?>