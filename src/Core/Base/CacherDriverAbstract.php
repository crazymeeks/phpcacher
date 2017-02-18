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
use Crazymeeks\PHPCacher\Core\Inflector\Inflect;
abstract class CacherDriverAbstract{

	use BaseTrait;

	protected $cacheDriver;

	protected $driverName;

	protected $namespace = "Crazymeeks\\PHPCacher\\Core\\Cache\\";

	protected $cache_purger_postfix = 'CachePurger';

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

	/**
	 * Set cache expiration. This enables developers to set expiration
	 *
	 * @param int $time             The time of expiration
	 * @return int
	 * @throw Exception
	 */
	public function setExpiration($time){
		if(empty($time) && is_null($time)){
			throw new Exception('Invalid expiration.');
		}
		$this->expireAt = (int)$time;
	}

	/**
	 * Get the cache expiration
	 *
	 * @return int
	 */
	public function getExpiration(){
		return $this->expireAt;
	}

	public function purgeAllCache(){
		$class = $this->namespace . ucfirst($this->getDriverName()) . '\\' .$this->cache_purger_postfix;
		$purger = new $class;
		$purger->purgeAllCache($this->getCacheDir());
	}

	/**
	 * Expires the cache daily
	 *
	 * @return void
	 */
	public function daily(){
		$this->save(86400);
	}

	/**
	 * Expires the cache hourly
	 * @return void
	 */
	public function hourly(){
		$this->save(3600);
	}

	/**
	 * Expires the cache every 30minutes
	 * @return void
	 */
	public function everyThirtyMinutes(){
		$this->save(1800);
	}

	/**
	 * Expires the cache
	 * @return void
	 */
	public function everyFiveMinutes(){
		$this->save(300);
	}

	/**
	 * Save the data in the cache
	 *
	 * @param strtotime $time
	 * @return void
	 */
	protected function save($time){
		// check the driver
		$method = strtolower($this->getDriverName()) . 'SaveCache';
		if(method_exists($this->cacheDriver, $method)){
			$this->cacheDriver->$method($time);
		}
	}
}