=== Equivalent Mobile Redirect ===

Contributors: uniquelylost
Tags: mobile redirect, mobile detect, equivalent, mobile, redirection, detection
Requires at least: 3.0
Tested up to: 3.9.1
Stable tag: 2.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Detect and redirect mobile visitors to the equivalent page on your mobile site.

== Description ==
UPGRADE TO VERSION 2.0 AT YOUR OWN RISK. PRIOR VERSIONS SETTINGS WILL BE LOST!
This WordPress plugin will detect mobile devices and redirect the user to the equivalent mobile page/post as set in the metabox that is added to your page and post screens upon activation. This plugin also gives you the ability to allow mobile viewers to bypass the mobile redirect and "View Full Site" by using a cookie that can be set on your mobile site. If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site.

= Features =
* Unlimited possible page/post redirects
* Set mobile url in meta box on page/post
* Up to date mobile library 8/4/14 http://mobiledetect.net/
* Google recommended 302 redirects https://developers.google.com/webmasters/smartphone-sites/change-configuration
* Optionally let mobile vistors "View Full Site"
* Built in support for custom post types
* Compatible with multisite
* Fork of https://wordpress.org/plugins/speedy-page-redirect/

== Installation ==

= Automatic Installation =
1. Login to your Dashboard as admin.
2. Once logged in select Plugins -> Add New.
3. Next search for Equivalent Mobile Redirect and click the install button.
4. Set mobile redirects in the metabox on pages and posts

= Manual Install =
1. Extract the contents of equivalent-mobile-redirect.zip and upload to the wp-content/plugins folder.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Set mobile redirects in the metabox on pages and posts


== Frequently Asked Questions ==

= I activated the plugin and nothing happened? =
This plugin will only redirect users who view the site on a mobile device and you must first fill in redirects in the metabox on pages and posts.

= What format should I add the mobile URL in the metabox? =
You should add the full mobile URL including the "http://". For example: http://example.com

= How can I give my users the option to view the full site =
If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site. By default the cookie is set to expire after 24 hours.

== Screenshots ==

1. Screenshot of admin page

== Changelog ==
= 2.0 (2013/8/4) =
* Complete rewrite
* Changed how mobile redirects are set.
* Tested compatibility with wordpress 3.9.1

= 1.5 (2013/12/26) =
* Cleaned up notices and warnings
* Tested compatibility with child themes
* Tested compatibility with wordpress 3.8

= 1.4 (2013/9/21) =
* Added option to enable/disable tablet redirects

= 1.3 (2013/7/19) =
* Added checkbox to enable/disable homepage redirect
* Added more possible redirects

= 1.0.2 (2013/07/18) =
* Quick clean up

= 1.0.1 (2013/07/16) =
* Inital release

== To Do ==
