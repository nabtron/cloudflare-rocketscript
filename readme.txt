=== Plugin Name ===
Contributors: nabtron
Donate link: http://nabtron.com/nablab/
Tags: cloudflare, rocketscript, enable, disable, automatic, manual, include, exclude
Requires at least: 4.4
Tested up to: 4.4
Stable tag: 0.1

Disables or enables cloudflare rocket script on specific files

== Description ==

Plugin for wordpress, allows users to enable or disable rocketscript on selected files

If Rocketscript is set to Manual:
---------------------------------
The user is given the option to add the files to turn on rocket script for 

If Rocketscript is set to Automatic:
---------------------------------
The user is given the option to add the files to turn off rocket script for 

Up coming version will have many more options

In case of any queries let me know: http://nabtron.com/

Found a bug or have a feature request ? <a href="http://nabtron.com/contact/">Report here</a>

== Installation ==

1. Upload `cloudflare-rocketscript` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Goto: "Settings > Cloudflare Rocketscript" to configure the plugin

== Frequently Asked Questions ==

= Should we fill both fields? =

No, only one field will be used at a time, depending upon your cloudflare settings

= How to add file names? =

View the source of your frontend and search for .js filenames. Once found, enter the main full file name only (not directory paths) in comma seperated values, like: filename.js,secondfilename.js,thirdfilename.js

== Screenshots ==

1. Cloudflare rocketscript settings for WordPress - Options in admin panel

== Changelog ==

= 0.1 =
* Initial release

== Upgrade Notice ==

= 1.0 =
Initial release
