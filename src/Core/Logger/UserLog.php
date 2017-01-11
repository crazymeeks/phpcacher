<?php namespace Crazymeeks\PHPCacher\Core\Logger;

use Crazymeeks\PHPCacher\Core\Contracts\LogInterface;

/**
* 
*/
class UserLog implements LogInterface{

	/**
	* writeLog based from interface
	* @param string $log
	* @param int $type
	* @return bool
	*/
	public function writeLog($log, $type){
		return $log." ".$type." bullshit";
	}
}