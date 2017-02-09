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
		/*$cache_files = glob($this->getCacheDir() . '*');
		foreach($cache_files as $file){
			if(is_file($file)){
				unlink($file);
			}
		}*/
	}
	
}