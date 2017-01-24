<?php namespace Crazymeeks\PHPCacher\Core\Logger;

use Crazymeeks\PHPCacher\Core\Contracts\LogInterface;

/**
 * Redis Logger Class
 *
 * @author Aaron Tolentino<aarontolentino123@gmail.com>
 * @since 2016
 */
class RedisLog extends LoggerAbstract implements LogInterface{

	/**
	* setLog based from interface
	* set log
	* @param string $log
	* @param int $type
	* @return bool
	*/
	public function __construct(){
		$this->prefix = "Redis Logger";
	}

	public function setLog($log, $type = 0){
		
		$this->setStatus($type);
		$this->writeLog($log);
	}
}