<?php namespace Crazymeeks\PHPCacher;

/**
 * Cacher class
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use Crazymeeks\PHPCacher\Core\Factories\DriverFactory;
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
	 * @return Object         The driver object
	 */
	public function setDriver($driver){
		$this->driver = $this->driverfactory->make($driver);
		return $this->driver;
	}
}