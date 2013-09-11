<?php
// -----------------------------------------------------
// Class:	wp_site_verification_tool_ui
// Author:	Justin Russell
// Date:	
// Purpose:	Encapsulate functionality related to
// 			printing wordpress ui elements.
// -----------------------------------------------------

class wp_site_verification_tool_ui 
{
	public static function print_plugin_menu() {
		wp_site_verification_tool::$plugin_hook = add_management_page(
			wp_site_verification_tool::$plugin_name . " Options", // Page Title
			wp_site_verification_tool::$plugin_name, // Display for menu listing
			"manage_options", // Only show this option if user can manage options
			wp_site_verification_tool::$plugin_slug . "_manage", // Unique identifier for this menu (i.e. menu slug)
			"wp_site_verification_tool_ui::print_plugin_options_form" // Callback - Refers to the function below
		);

		add_action("admin_enqueue_scripts", "wp_site_verification_tool_ui::enqueue_options_scripts");
	}

	public static function print_plugin_options_form() {
		if(!current_user_can("manage_options")) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		include(dirname(__FILE__) . "/../form/wp-site-verification-tool.php");
	}

	public static function enqueue_options_scripts() {
		global $hook_suffix;
		if( wp_site_verification_tool::$plugin_hook === $hook_suffix)
			self::enqueue_page_scripts("wp-site-verification-tool");
	}

	public static function enqueue_page_scripts($page) {
		$this_dir = dirname(__FILE__);
		$plugin_dir_uri	= plugins_url(wp_site_verification_tool::$plugin_slug);
		if(file_exists($this_dir . "/../css/{$page}.css")) {
			wp_enqueue_style(wp_site_verification_tool::$plugin_name . "-{$page}-style", $plugin_dir_uri . "/css/{$page}.css");
		}
		if(file_exists($this_dir . "/../js/{$page}.js")) {
			wp_enqueue_script(wp_site_verification_tool::$plugin_name . "-{$page}-script", $plugin_dir_uri . "/js/{$page}.js");
		}
	}
}

// -----------------------------------------------------
// Closing php tag omitted
// -----------------------------------------------------
