<?php namespace Crazymeeks\PHPCacher\Core\Base;

/**
 * Abstract class for cacher drivers
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use Crazymeeks\PHPCacher\Contracts\CacherDriverInterface;
use Crazymeeks\PHPCacher\Core\Driver;
use Crazymeeks\PHPCacher\Core\Base\BaseTrait;

abstract class CacherDriverAbstract{

	use BaseTrait;

	protected $driverName;

	/**
	 * Set the cache driver name
	 * 
	 * @param string $driverName
	 * @return void
	 */
	public function setDriverName($driverName){
		$this->driverName = $driverName;
	}

	/**
	 * Get the cache driver name
	 *
	 * @return string
	 */
	public function getDriverName(){
		return $this->driverName;
	}
	
}