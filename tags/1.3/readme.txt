=== Equivalent Mobile Redirect ===

Contributors: uniquelylost, Jesse Sneider
Tags: mobile redirect, mobile detect, equivalent, mobile, redirection, detection
Requires at least: 3.3
Tested up to: 3.6
Stable tag: 1.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Detect and redirect mobile visitors to the equivalent page on your mobile site.

== Description ==
This WordPress plugin will detect mobile devices and redirect the user to the equivalent mobile page as set in the plugin admin panel. Redirects are set by enabling/disabling the checkbox and/or by entering the page title you want to redirect and a corresponding URL. By default there are up to 18 possible redirects. This plugin also gives you the ability to allow mobile viewers to bypass the mobile redirect and "View Full Site" by using a cookie that can easily be set on your mobile site. If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site.

== Installation ==

= Automatic Installation =
1. Login to your Dashboard as admin.
2. Once logged in select Plugins -> Add New.
3. Next search for Equivalent Mobile Redirect and click the install button.
4. Locate the "EMR Redirect" settings menu
5. Enable mobile redirect by checking the enable checkbox.
6. Enable Homepage redirect by checking the enbale checkbox and enter the corrosponding mobile site URL (ex. http://example.com).
7. Fill in the full site page title (ex. About) and the equivalent mobile site URL (ex. http://example.com) you would like to redirect the mobile visitors to.
8.  Select "Save Options".

= Manual Install =
1. Extract the contents of equivalent-mobile-redirect.zip and upload to the wp-content/plugins folder.
2. Activate the plugin through the 'Plugins' menu in WordPress
4. Locate the "EMR Redirect" settings menu
5. Enable mobile redirect by checking the enable checkbox.
6. Enable Homepage redirect by checking the enbale checkbox and enter the corrosponding mobile site URL (ex. http://example.com).
7. Fill in the full site page title (ex. About) and the equivalent mobile site URL (ex. http://example.com) you would like to redirect the mobile visitors to.
8.  Select "Save Options".


== Frequently Asked Questions ==

= I activated the plugin and nothing happened? =
This plugin will only redirect users who view the site on a mobile device and you must first fill in the page title(s) and redirect URL(s) in the plugin settings.

= What format should I add the page title in the settings page? =
You should add the page title the exact way it is spelled and you can one add 1 page title per text box. For example: Home

= What format should I add the mobile URL in the settings page? =
You should add the full mobile URL including the "http://". For example: http://example.com

= How can I give my users the option to view the full site =
If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site. By default the cookie is set to expire after 24 hours.

== Screenshots ==

1. Screenshot of admin page

== Changelog ==
= 1.3 (2013/7/19) =
* Added checkbox to enable/disable homepage redirect
* Added more possible redirects


= 1.0.2 (2013/07/18) =
* Quick clean up

= 1.0.1 (2013/07/16) =
* Inital release

== To Do ==
* Admin options to exclude tablets from mobile redirect
* Admin settings update with custom cookie time

