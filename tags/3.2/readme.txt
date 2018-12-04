=== Equivalent Mobile Redirect ===

Contributors: uniquelylost
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HTZHS2DY85G42
Tags: mobile redirect, mobile detect, equivalent, mobile, redirection, detection, detect, redirect, tablet, 302 redirect, 302, google, iphone, android, smartphone, mobile site, mobile script, ipad, kindle, url, simple, page, post, multisite, blog mobile, blog redirect, blog index, blog
Requires at least: 3.0
Tested up to: 4.7
Stable tag: 3.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Easy way to detect and redirect mobile visitors to the equivalent page on your mobile site. Optionally redirect all mobile users to one mobile URL.

== Description ==
This WordPress plugin will detect mobile devices and redirect the user to the equivalent mobile page/post as set in the metabox that is added to your page and post screens upon activation. Option for redirecting blog index available in settings. You can also optionally override equivalent redirects and instead redirect all mobile users to one URL. This plugin gives you the ability to allow mobile viewers to bypass the mobile redirect and "View Full Site" by using a cookie that can be set on your mobile site. If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site.

= Features =
* Unlimited possible page/post redirects
* Set mobile URL in meta box on each page/post
* Option to redirect blog index in settings
* Option to override equivalent redirects and redirect all mobile users to one URL 
* Option to redirect tablets as mobile or not
* Up to date mobile library http://mobiledetect.net/
* Google recommended 302 redirects for mobile
* Option to let mobile visitors "View Full Site"
* Built in support for custom post types
* Compatible with multisite


== Installation ==

= Automatic Installation =
1. Login to your Dashboard as admin.
2. Once logged in select Plugins -> Add New.
3. Upload Equivalent Mobile Redirect and activate.
4. Set mobile redirects in the metabox on pages and posts.
5. Option to set whether you want tablets to be redirected in Settings -> EMR Settings.
6. Option to set whether you want to override equivalent redirects and redirect all mobile users to one URL in Settings -> EMR Settings.
7. Option to set whether you want to redirect blog index in settings in Settings -> EMR Settings.

= Manual Install =
1. Extract the contents of equivalent-mobile-redirect.zip and upload to the wp-content/plugins folder.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Set mobile redirects in the metabox on pages and posts
4. Option to set whether you want tablets to be redirected in Settings -> EMR Settings.
5. Option to set whether you want to override equivalent redirects and redirect all mobile users to one URL in Settings -> EMR Settings.
6. Option to set whether you want to redirect blog index in settings in Settings -> EMR Settings.


== Frequently Asked Questions ==

= I activated the plugin and nothing happened? =
This plugin will only redirect users who view the site on a mobile device and you must first fill in redirects in the metabox on pages and posts.

= What format should I add the mobile URL in the metabox? =
You should add the full mobile URL including the "http://". For example: http://example.com

= What if my homepage is my default blog posts or blog index? =
Option to set whether you want to redirect blog index in settings in Settings -> EMR Settings.

= What if I want to redirect all mobile users to 1 URL instead of the equivalent pages? =
Option to set whether you want to override equivalent redirects and redirect all mobile users to one URL in Settings -> EMR Settings.

= How can I give my users the option to view the full site =
If you want to use this feature set a link to "http://example.com/?view_full_site=true" anywhere on your mobile site. By default the cookie is set to expire after 24 hours.

== Screenshots ==

1. Screenshot of admin page

== Changelog ==
= 3.2 (2016/7/9) =
* Updated to mobile detect @version 2.8.24
* Add check to see if mobile detect is already loaded by another plugin or theme
* Tested with WordPress 4.7

= 3.1 (2015/9/4) =
* 3.1 svn version bump

= 3.0 (2015/9/4) =
* Added option to override equivalent redirects
* Added option to redirect blog index
* Cross tested devices on BrowserStack

= 2.3 (2015/8/22) =
* Updated to mobile detect @version 2.8.15
* Tested compatibility with WordPress 4.3
* Cross tested devices on BrowserStack
* Detect kindle as mobile due to error detecting as tablet in mobile detect @version 2.8.15  

= 2.2 (2015/5/26) =
* Updated mobile detection device library
* Tested compatibility with WordPress 4.2.2

= 2.1 (2014/8/23) =
* Added option to redirect tablets as mobile or not to.
* Cleaned up some code
* Tested compatibility with WordPress 3.9.2

= 2.0 (2014/8/4) =
* Complete rewrite
* Changed how mobile redirects are set.
* Tested compatibility with WordPress 3.9.1

= 1.5 (2013/12/26) =
* Cleaned up notices and warnings
* Tested compatibility with child themes
* Tested compatibility with WordPress 3.8

= 1.4 (2013/9/21) =
* Added option to enable/disable tablet redirects

= 1.3 (2013/7/19) =
* Added checkbox to enable/disable homepage redirect
* Added more possible redirects

= 1.0.2 (2013/07/18) =
* Quick clean up

= 1.0.1 (2013/07/16) =
* Initial release