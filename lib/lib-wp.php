<?php
/**
 * Class to encapsulate interaction with wp-core, in particular should wrap up 
 * everything that needs to be namespaced.
 */
class wp_site_verification_tool
{
	public static $plugin_name		= "Site Verification";
	public static $option_namespace	= "wp-site-verification-tool";
	public static $option_group		= "wp-site-verification-tool-grp";
	public static $plugin_slug		= "wp-site-verification-tool";
	public static $plugin_hook 		= null;

	// -----------------------------------------------------
	// Option handling
	// -----------------------------------------------------
	public static function option_name($key) {
		return self::$option_namespace . "_" . $key;
	}

	public static function add_option($key, $val) {
		add_option(self::option_name($key), $val);
	}

	public static function update_option($key, $val="") {
		update_option(self::option_name($key), $val);
	}

	public static function get_option($key) {
		return get_option(self::option_name($key));
	}

	public static function delete_option($key) {
		delete_option(self::option_name($key));
	}
	
	public static function register_setting($key, $group="") {
		if(strlen($group) === 0) {
			$group = self::$option_group;
		}
		register_setting($group, self::option_name($key));
	}

	// -----------------------------------------------------
	// Creating/Updating Posts/Pages
	// -----------------------------------------------------
	public static function create_post($args = array()) {
		$default_args = array(
			'post_title' 		=> "" // Should be required
			,'post_content'		=> "" // Should usually be provided
			,'post_status' 		=> "publish"
			,'post_type' 		=> "post" // Use "page" to create a page
			,'comment_status' 	=> "closed"
			,'ping_status'		=> "closed"
			,'post_category' 	=> array(1) // the default 'Uncatrgorized'
		);
		$args = array_merge($default_args, $args);
		$the_page = get_page_by_title($args["post_title"]);
		if(!$the_page) { // Add the page if does't exist
			$the_page_id = wp_insert_post($args);
		} else {  // If the page exists but is trashed try un-trashing it
			$the_page_id 				= $the_page->ID;
			$the_page->post_status		= $args["post_status"];
			$the_page->comment_status 	= $args["comment_status"];
			$the_page->ping_status 		= $args["ping_status"];
			if(strlen($args["post_content"]) > 0) {
				$the_page->post_content	= $args["post_content"];
			}
			$the_page_id 				= wp_update_post($the_page);
		}
		return $the_page_id;
	}

	public static function trash_page($the_page_id) {
		if($the_page_id) {
			wp_delete_post($the_page_id);
		}
	}

	// -----------------------------------------------------
	// Routines to be run on activate/deactivate/install/uninstall
	// -----------------------------------------------------
	public static function set_options() {
		self::add_option("wp_site_verification_tool_on", "false");
		self::add_option("wp_site_verification_tool_via_file", "true");
		self::add_option("wp_site_verification_tool_file", "");
		self::add_option("wp_site_verification_tool_contents", "");
	}

	public static function unset_options() {
		self::delete_option("wp_site_verification_tool_on");
		self::delete_option("wp_site_verification_tool_via_file");
		self::delete_option("wp_site_verification_tool_file");
		self::delete_option("wp_site_verification_tool_contents");
	}

	public static function register_settings() {
		$group = self::$option_group;
		self::register_setting("wp_site_verification_tool_on", $group);
		self::register_setting("wp_site_verification_tool_via_file", $group);
		self::register_setting("wp_site_verification_tool_file", $group);
		self::register_setting("wp_site_verification_tool_contents", $group);
	}

}

// -----------------------------------------------------
// Closing PHP tag omitted
// -----------------------------------------------------
