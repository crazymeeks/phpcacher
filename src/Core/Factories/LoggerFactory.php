<?php namespace Crazymeeks\PHPCacher\Core\Factories;

use Crazymeeks\PHPCacher\Core\Logger\LoggerController;

/**
* 
*/
class LoggerFactory
{
	protected $driver_namespace = 'Crazymeeks\\PHPCacher\\Core\\Logger\\';

	public function make($class){
		$class = $this->driver_namespace.ucfirst($class)."Log";
		$class = new LoggerController(new $class);
		return $class->getLoggerInstance();
	}
	
}