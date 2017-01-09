<?php namespace Crazymeeks\PHPCacher\Factories;
/**
 * The factory of all drivers
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use ReflectionClass;
use Crazymeeks\PHPCacher\Core\Exceptions\PHPCacherDriverNotFoundException;

class DriverFactory{
	
	protected $driver_namespace = 'Crazymeeks\\PHPCacher\\Core\\Cache\\';
	/**
	 * Create the cacher driver
	 * 
	 * @param string $driver
	 * @return Object           The driver object
	 */
	public function make($driver){
		if(empty($driver)){
			throw new PHPCacherDriverNotFoundException('Cache Driver not found. Please specify the driver.');
		}

		$class = $this->driver_namespace . ucfirst(strtolower($driver)) . '\\FileCacheManager';
		
		if(class_exists($class)){
			$class = new ReflectionClass($class);
			$instance = $class->newInstanceArgs();
			return $instance;
		}
		throw new PHPCacherDriverNotFoundException('Cache Driver not found.');
	}
}