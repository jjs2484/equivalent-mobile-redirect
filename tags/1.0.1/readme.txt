=== Equivalent Mobile Redirect ===

Contributors: Jesse Sneider
Tags: mobile redirect, mobile detect, equivalent, mobile, redirection, detection
Requires at least: 3.3
Tested up to: 3.5.2
Stable tag: 1.0.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Detect and redirect mobile visitors to the equivalent page on your mobile site.

== Description ==
This WordPress plugin will detect mobile devices and redirect the user to the equivalent mobile page as set in the plugin admin panel. 

== Installation ==

= Automatic Installation =
1. Login to your Dashboard as admin.
2. Once logged in select Plugins -> Add New.
3. Next search for Equivalent Mobile Redirect and click the install button.
4. Locate the "EMR Redirect" settings menu
5. Enable mobile redirect by checking the enable checkbox.
6. Fill in the full site page title (ex. Home) and the equivalent mobile site URL (ex. http://example.com) you would like to redirect the mobile visitors to.
7.  Select "Save Options".

= Manual Install =
1. Extract the contents of equivalent-mobile-redirect.zip and upload to the wp-content/plugins folder.
2. Activate the plugin through the 'Plugins' menu in WordPress
4. Locate the "EMR Redirect" settings menu
5. Enable mobile redirect by checking the enable checkbox.
6. Fill in the full site page title (ex. Home) and the equivalent mobile site URL (ex. http://example.com) you would like to redirect the mobile visitors to.
7.  Select "Save Options".


== Frequently Asked Questions ==

= I activated the plugin and nothing happened? =
This plugin will only redirect users who view the site on a mobile device and you must first fill in the page title(s) and redirect URL(s) in the plugin settings.

= What format should I add the page title in the settings page? =
You should add the page title the exact way it is spelled and you can one add 1 page title per text box. For example: Home

= What format should I add the mobile URL in the settings page? =
You should add the full mobile URL including the "http://". For example: http://example.com

= How can I give my users the option to view the full site =
If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site. By default the cookie is set to expire after 24 hours.

== Changelog ==
= 1.0.1 (2013/07/16) =
* Inital release

== To Do ==
* Admin options to exclude tablets from mobile redirect
* Admin settings update with custom cookie time

