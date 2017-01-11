<?php namespace Crazymeeks\PHPCacher;

/**
* 
*/

use Crazymeeks\PHPCacher\Core\Factories\LoggerFactory;

class Logger
{
	
	protected $logger_factory;

	public function __construct(){
		$this->logger_factory = new LoggerFactory;
	}

	public function setLogger($class){
		return $this->logger_factory->make($class);
	}
}