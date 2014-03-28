=== WP Site Verication tool ===
Contributors: pbearne
Donate Link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=MZTZ5S8MGF75C&lc=CA&item_name=Wordpress%20Development%20%2f%20Paul%20Bearne&item_number=SiteVericationTool%20Plugin&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: Site Verication, tool, VIP, webmaster, certication
Requires at least: 3.6
Tested up to: 3.9
Stable tag: 1.0.4
License: GPLv2 or later

Site Verication Tool via file or head tag.

== Description ==

This is a sinple tool that helps you provide the site verication code amd files for any service that you need 
via a comment / meta in the head section or via a file URL.

This is the genric site certication tool add the plug-in and turn it on as needed. 
No more FTPing a file to the site root or added tags to the header.php in the template.

Some examples:
Google webmaster tool needs a file called <strong>googleXXXXXXXXXXXXX.html</strong>  with no contents
or 
<strong>&lt;meta name="google-site-verification" content="XXXXXXXXXXXXXXXXXXXXXXXXXXXXX" /></strong> in the head,

Trustwave SSL wants a file called <strong>cert.html</strong> with the contents of 
<strong>"Trustwave SSL Validation Page"</strong> 



== Installation ==

1. Upload the `author-avatars` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. The tool is found in tools => Site Verication

== Screenshots ==

1. Control pannel set for a file
1. The output if in file mode
1. Control pannel set in head mode
1. An example of a head meta tag

== Change Log ==

= 1.0.4 =
Change the singleton to use self not static to support earlier PHP versions

= 1.0.1 to 1.0.3 = 
Added translation POT
getting deploy script and assest to SVN from git

= 1.0.0 =
First version
Thanks to Chris Ross for the code review

== Upgrade Notice ==
no upgrade instructions

= 1.0.0 =
none first version