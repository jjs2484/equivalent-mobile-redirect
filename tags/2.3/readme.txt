=== Equivalent Mobile Redirect ===

Contributors: uniquelylost
Tags: mobile redirect, mobile detect, equivalent, mobile, redirection, detection, detect, redirect, tablet, 302 redirect, 302, google, iphone, smartphone, mobile site, script, ipad, url, simple, page, post, multisite
Requires at least: 3.0
Tested up to: 4.3
Stable tag: 2.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Detect and redirect mobile visitors to the equivalent page on your mobile site.

== Description ==
This WordPress plugin will detect mobile devices and redirect the user to the equivalent mobile page/post as set in the metabox that is added to your page and post screens upon activation. This plugin also gives you the ability to allow mobile viewers to bypass the mobile redirect and "View Full Site" by using a cookie that can be set on your mobile site. If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site.

= Features =
* Unlimited possible page/post redirects
* Set mobile url in meta box on page/post
* Option to redirect tablets as mobile or not
* Up to date mobile library http://mobiledetect.net/
* Google recommended 302 redirects for mobile
* Optionally let mobile vistors "View Full Site"
* Built in support for custom post types
* Compatible with multisite


For More Documentation Download the Documentation <a href="http://ndgraphic.com/wp-content/uploads/2014/08/documentation.zip">Here</a>
== Installation ==

= Automatic Installation =
1. Login to your Dashboard as admin.
2. Once logged in select Plugins -> Add New.
3. Upload Equivalent Mobile Redirect Pro and activate.
4. Set mobile redirects in the metabox on pages and posts.
5. Set whether you want tablets to be redirected in Settings -> EMR Settings.

For More Documentation Download the Documentation <a href="http://ndgraphic.com/wp-content/uploads/2014/08/documentation.zip">Here</a>

= Manual Install =
1. Extract the contents of equivalent-mobile-redirect.zip and upload to the wp-content/plugins folder.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Set mobile redirects in the metabox on pages and posts
5. Set whether you want tablets to be redirected in Settings -> EMR Settings.


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
= 2.3 (2015/8/22) =
* Updated to mobile detect @version 2.8.15
* Tested compatibility with wordpress 4.3
* Cross tested devices on browser stack
* Detect kindle as mobile due to error detecting as tablet in mobile detect @version 2.8.15  

= 2.2 (2015/5/26) =
* Updated mobile detection device library
* Tested compatibility with wordpress 4.2.2

= 2.1 (2014/8/23) =
* Added option to redirect tablets as mobile or not to.
* Cleaned up some code
* Tested compatibility with wordpress 3.9.2

= 2.0 (2014/8/4) =
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
* Initial release