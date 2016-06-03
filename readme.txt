=== WP Site Verification tool ===
Contributors: pbearne
Donate Link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=MZTZ5S8MGF75C&lc=CA&item_name=Wordpress%20Development%20%2f%20Paul%20Bearne&item_number=SiteVerificationTool%20Plugin&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: Site Verification, tool, VIP, webmaster, certification
Requires at least: 3.6
Tested up to: 4.5.2
Stable tag: 1.0.5
License: GPLv2 or later

A tool to enable verification of site ownership via file or meta tag.


== Description ==

This is a simple tool that helps you provide the site verification code and file generator for any service that needs to verify the site
via a comment / meta in the head section or via a file URL. 

This is a generic site certification tool. 
To use it, just add the plug-in and turn it on as needed. 
You will no longer need to FTP a file to the site root or add extra tags to the header.php in the template to enable your site to be verified by third-party services. 

Some examples:
Google webmaster tool needs a file called <strong>googleXXXXXXXXXXXXX.html</strong>  with no contents. 
OR
<strong>&lt;meta name="google-site-verification" content="XXXXXXXXXXXXXXXXXXXXXXXXXXXXX" /></strong> in the HTML head,
Without this plugin, you would have to create a file and FTP it to your server or edit your template. With the plugin, you can generate the verification method needed automatically via the control panel.

Similarly, Trustwave SSL wants a file called <strong>cert.html</strong> with the contents of 
<strong>"Trustwave SSL Validation Page"</strong> 



== Installation ==

1. Upload the `wp-site-verification-tool` folder to the `/wp-content/plugins/` directory.  
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. The tool is found in tools => Site Verification  

== Screenshots ==

1. Control panel set for a file
2. The output if in file mode
3. Control pannel set in head mode
4. An example of a head meta tag

== Changelog ==

= 1.0.5 =
Readme update

= 1.0.4 =
Change the singleton to use self not static to support earlier PHP versions

= 1.0.1 to 1.0.3 = 
Added translation POT
getting deploy script and assest to SVN from git

= 1.0.0 =
First version -
Thanks to Chris Ross for the code review

== Upgrade Notice ==
Not currently required

== Frequently asked questions ==

= Pull requests =
I will look at all pull requests. Please submit them here: https://github.com/pbearne/wp-site-verification-tool