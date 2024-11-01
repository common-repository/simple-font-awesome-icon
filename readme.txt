=== Simple Font Awesome Icon ===
Contributors: jomol
Tags: font awesome, awesome, simple, icon, icons, bootstrap, light, weight, custom field, meta field
Requires at least: 4.0
Tested up to: 4.9.6
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple Font Awesome plugin will give you the option for adding Font Awesome icons for your post and pages in the form of a meta box.

== Description ==

Simple Font Awesome Icon plugin will give you the Font Awesome Icon option in your post and page. From there you can choose the required icon and hit save. Then use the get_post_meta('post ID', 'font-awesome-icon', true); function in the template file and you will get the class name which can be used with i tag.

Please take a look the plugin page for more details: [https://codingdom.wordpress.com/simple-font-awesome-icon/)

== Installation ==

**Through Dashboard**

1. Log in to your WordPress admin panel and go to Plugins -> Add New
2. Type **simple font awesome icon** in the search box and click on search button.
3. Find Simple Font Awesome Icon plugin.
4. Then click on Install Now after that activate the plugin.
5. Go to the required template file and call the function as below.
   $icon_class = get_post_meta('your post ID', 'font-awesome-icon', true);
   Use this variable as class name for the i tag add where ever you want.

**Installing Via FTP**

1. Download the plugin to your hardisk.
2. Unzip.
3. Upload the "simple-font-awesome-icon" folder into your plugins directory.
4. Log in to your WordPress admin panel and click the Plugins menu.
5. Then activate the plugin.
6. Go to the required template file and call the function as below.
   $icon_class = get_post_meta('your post ID', 'font-awesome-icon', true);
   Use this variable as class name for the i tag and add where ever you want.

== Screenshots ==

1. The Font Awesome Icon Metabox in Post editor.


== Changelog ==

= 1.0 - June 27, 2017 =
* Support WordPress 4.8
= 1.0.1 - May 31, 2018 =
* Support WordPress 4.9.6