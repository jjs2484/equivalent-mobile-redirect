=== Equivalent Mobile Redirect ===

Contributors: uniquelylost
Tags: mobile redirect, mobile detect, equivalent, mobile, redirection
Requires at least: 3.0
Tested up to: 5.6
Stable tag: 4.5
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

Easy way to detect and redirect mobile visitors to the equivalent page on your mobile site. Optionally redirect all mobile users to one mobile URL.

== Description ==
This WordPress plugin will detect mobile devices and redirect the user to the equivalent mobile page as set in the metabox that is added to your page and post screens upon activation. You can optionally override equivalent redirects and instead redirect all mobile users to one URL.

= Features =
* Unlimited possible page/post redirects
* Set mobile URL in meta box on each page/post
* Option to redirect blog index in settings
* Option to override equivalent redirects and redirect all mobile users to one URL 
* Option to redirect tablets as mobile or not
* Comprehensive mobile detection library
* Google recommended 302 redirects for mobile
* Option to let mobile visitors "View Full Site". To use this feature add a link like "http://example.com/?view_full_site=true" anywhere on your mobile site.
* Built in support for custom post types

= Configuring cache plugins for Equivalent Mobile Redirect =
Some caching software set on your desktop site may override Equivalent Mobile Redirect's mobile detection method and then the redirects will not function properly. Fortunately, most caching plugins can be set to disable caching when mobile devices are detected. 

If you use: W3 Total Cache, WP Super Cache, Wordfence, WP Rocket, Hyper Cache, Quick Cache Pro, WP Simple Cache, Comet Cache, WPEngine, or other caching plugins or services.

In the settings you will need to disable caching for the following User Agents: iPhone, iPod, Android, BB10, BlackBerry, webOS, IEMobile/7.0, IEMobile/9.0, IEMobile/10.0, MSIE 10.0, iPad, PlayBook, Xoom , P160U, SCH-I800, Nexus 7, Touch

= Annotations for desktop and mobile URLs =
To help search engines understand separate mobile URLs tags are automatically added to the desktop pages to tell crawlers about it. For a more in-depth explaination of annotations please see <a href="https://developers.google.com/search/mobile-sites/mobile-seo/separate-urls">Google developers</a>

= Known limitations =
* Some touchscreen devices (eg. Microsoft Surface) are tough to detect as mobile since they can be used in a laptop mode.
* If the mobile browser is set on Desktop mode, the Mobile Detect script has no way of knowing that the device is mobile.
* There are hundreds of devices launched every month, we cannot keep a 100% up to date detection rate.

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

1. Metabox on post/page of WP 5.0
2. Admin page options

== Changelog ==

= 4.5 =
* Fix: Better empty check for $mobile_rel_link, $nonstatic_redirect_url, $mobile_all_url variables.
* Fix: PHP 7.4 compatibility.
* Fix: If no options are saved use default.
* Updated: Load files with plugin_dir_path.
* Tested: Compatibility with WordPress 5.6

= 4.4 release =
* New: add automatic desktop link rel="alternate" annotations.
* New: Added PHPCS.
* New: Code refactoring.
* Updated: to mobile detect @version 2.8.34
* Tested: compatibility with WordPress 5.4.2
* Tested: Cross tested device detection and redirects with BrowserStack.

= 4.2 =
* Added: on or off option on settings page.
* Added: back to full website link example on settings page.
* Updated: readme
* Tested: compatibility with WordPress 5.0

= 4.1 =
* Code: refactoring
* Code: renamed options page settings and variables. Old settings are remapped upon upgrade for backwards compatibility.
* Fixed: all php notices and warnings that occured with debug mode enabled
* Added: placeholders to text fields
* Updated: to mobile detect @version 2.8.33
* Updated: readme
* Tested: compatibility with WordPress 4.9.8
* Tested: compatibility with gutenberg editor
* Tested: Cross tested device detection and redirects with BrowserStack

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