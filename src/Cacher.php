<?php namespace Crazymeeks\PHPCacher;

/**
 * Cacher class
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use Crazymeeks\PHPCacher\Core\Factories\DriverFactory;
use Closure;
class Cacher{

	/**
	 * The driver factory
	 * @var
	 */
	protected $driverfactory;

	protected $driver;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct(){
		$this->driverfactory = new DriverFactory;
	}

	/**
	 * Set the cache driver
	 *
	 * @param string $driver
	 * @param string $customCachePath        The cache path set by developer.
	 *                                       For windows users set it like c:/tmp
	 *                                       For unix users set it like /var/something
	 * @return Object         The driver object
	 */
	public function setDriver($driver, $customCachePath = null){
		$this->driver = $this->driverfactory->make($driver);

		if(!is_null($customCachePath))
			$this->driver->setCacheDir($customCachePath);
		
		return $this->driver;
	}
}