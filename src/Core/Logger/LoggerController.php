<?php namespace Crazymeeks\PHPCacher\Core\Logger;

use Crazymeeks\PHPCacher\Core\Contracts\LogInterface;
use Crazymeeks\PHPCacher\Core\Factories\LoggerFactory;

/**
* 
* 
*/


class LoggerController{
	
	protected $logger_instance;

	public function __construct(LogInterface $logger){
		$this->logger_instance = $logger;
	}

	public function getLoggerInstance(){
		return $this->logger_instance;
	}
}