<?php
/*
Plugin Name: WP Site Verication tool
Plugin URI: http://wordpres.org/wp-vite-verication-tool
Description: A tool to enable verification of site ownership via file or meta tag.
Version: 1.0.4
Author: paul Bearne
Author URI: http://bearne.ca
*/

// -----------------------------------------------------
// Setup some constants
// -----------------------------------------------------
$this_dir = dirname( __file__ );
$lib_dir = $this_dir . '/lib';


// -----------------------------------------------------
// Include our library files
// -----------------------------------------------------
if ( $handle = opendir( $lib_dir ) ) {
	while ( false !== ( $file = readdir( $handle ) ) ) {
		// Don't include hidden files or directories
		$file_path = $lib_dir . '/' . $file;
		if ( preg_match( "/(lib|class)-[\w-]+\.php/", $file_path ) && is_file( $file_path ) )
			include_once( $file_path );
	}
	closedir( $handle );
}

// -----------------------------------------------------
// Register our transalations
// -----------------------------------------------------
load_plugin_textdomain('wp_site_verification_tool', false, basename( dirname( __FILE__ ) ) . '/languages');

// -----------------------------------------------------
// Register our options menu item and options page
// -----------------------------------------------------
add_action( 'admin_menu', 'wp_site_verification_tool_ui::print_plugin_menu' );


// -----------------------------------------------------
// Activation, Deactivation, and Install routines
// -----------------------------------------------------
register_activation_hook( __FILE__, 'wp_site_verification_tool::set_options' );
register_deactivation_hook( __FILE__, 'wp_site_verification_tool::unset_options' );
add_action( 'admin_init', 'wp_site_verification_tool::register_settings' );


// -----------------------------------------------------
// Closing php tag omitted
// -----------------------------------------------------
