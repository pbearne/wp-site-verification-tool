WordPress Plugin Template
=========================

A sinple tool that deivlers entered file content for a given URL (filename)
e.g. url /cert.html with the content of "Trustwave SSL Validation Page"

Features
--------
* On Off
* select home page head or a give filename
* Provide the content of the file 


notes:

~~~
git submodule add git://github.com/jtrussell/WordPress-Plugin-Script-Library.git lib
~~~

* Try to avoid bloating your main plugin script with function declarations
* Library files - or classes with all static methods - should be prefixed with "lib-"
* Proper class files should be prefixed with "class-"
* Other php files in the "./lib" folder will not be automatically included

Getting your plugin ready
-------------------------
Eventually there will be a configurable deploy script, but for now...

* Do a global find/replace on "template_" for "your_plugin_slug_"
* Update _deploy/readme.txt and move it to the root directory
* Delete the _deploy folder
* Update the static attributes at the top of lib/lib-wp.php to match your namespacing preferences
