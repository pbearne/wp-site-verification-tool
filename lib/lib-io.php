<?php
// -----------------------------------------------------
// Class:	template_io
// Author:	Justin Russell
// Date:	
// Purpose:	Encapsulate functionality related to
// 			generic input and output
// -----------------------------------------------------

class wp_site_verification_tool_io
{

	public static function log_folder() {
		return dirname(__file__) . "/../logs";
	}

	public static function log($msg, $log_file_name = "debug.txt") {
		$log_file = self::log_folder . "/" .$log_file_name;
		$handle = fopen($log_file, "a");
		fwrite($handle, date(DATE_RFC822, time()) . "\t" . $msg . "\r\n");
		fclose($handle);
	}

}

// -----------------------------------------------------
// Closing php tag omitted
// -----------------------------------------------------
