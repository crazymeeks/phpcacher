<?php namespace Crazymeeks\PHPCacher\Core\Factories;
/**
 * The factory of all drivers
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use ReflectionClass;
use ReflectionObject;
use Crazymeeks\PHPCacher\Core\Exceptions\PHPCacherDriverNotFoundException;
use Crazymeeks\PHPCacher\Core\Factories\ConstructorResolverFactory;

class DriverFactory extends ConstructorResolverFactory{
	
	private $available_drivers = ['files', 'redis', 'mongo'];


	protected $driver_namespace = 'Crazymeeks\\PHPCacher\\Core\\Cache\\';
	/**
	 * Create the cacher driver
	 * 
	 * @param string $driver
	 * @return Object           The driver object
	 */
	public function make($driver){
		if(!in_array($driver, $this->available_drivers)){
			throw new PHPCacherDriverNotFoundException('Cache Driver not found. Please specify the driver.');
		}

		$class = $this->driver_namespace . ucfirst(strtolower($driver)) . '\\CacheManager';
		
		if(class_exists($class)){
			$constructor = $this->createClassConstructor($driver);
			$instance = $constructor;
			if(is_object($constructor) && $driver == 'redis'){
				
				$ReflectionClass = new ReflectionClass((new ReflectionObject($constructor))->getNamespaceName() . '\Client');
				$instance = $ReflectionClass->newInstanceArgs(['host' => 'localhost']);
				$orig = new $class($instance);

			}else{
				$ReflectionClass = new ReflectionClass($class);
				$orig = $ReflectionClass->newInstanceArgs($instance);	
			}
			
			return $orig;
		}
		throw new PHPCacherDriverNotFoundException('Cache Driver not found.');
	}
}