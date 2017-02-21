<?php

/**
 * Get the System's OS
 *
 * @return string
 */
if(!function_exists('os_type')){
	function os_type(){
		//$agent = $_SERVER['HTTP_USER_AGENT'];

		// if(preg_match('/Linux/',$agent)) $os = 'linux';
		// elseif(preg_match('/Win/',$agent)) $os = 'windows';
		// elseif(preg_match('/Mac/',$agent)) $os = 'mac';
		// else $os = 'unknown';

		$os = strtolower(PHP_OS);
		switch($os){
			case "linux":
				return 'linux';
			case "winnt":
				return 'windows';
			default:
				return 'mac';
		}
	}
}