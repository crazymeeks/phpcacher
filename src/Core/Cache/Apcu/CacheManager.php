<?php namespace Crazymeeks\PHPCacher\Core\Cache\Apcu;

/**
 * The Apcu cache manager
 *
 * APCU version 4.0.8
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use Crazymeeks\PHPCacher\Core\Base\CacherDriverAbstract;
use Crazymeeks\PHPCacher\Core\Contracts\CacherDriverInterface;
use Crazymeeks\PHPCacher\Core\Response\Response;
use Exception;
class CacheManager extends CacherDriverAbstract implements CacherDriverInterface{

	/**
	 * Construct
	 *
	 */
	public function __construct($config = array(), $drivername){

		$this->setDriverName($drivername);
		// set the cache directory
		$this->setCacheDir();


	}

	/**
	 * Set the key for our cache
	 *
	 * @param string $key         The name of the cache's key
	 * @param string $customKey   The identifier
	 * @return $this
	 */
	public function setKey($key, $customKey = null){
		$this->cache_key = $key;
		$this->custom_key = $customKey;

		return $this;
	}

	/**
	 * Set the item for our cache
	 *
	 * @param mixed $data
	 * @return $this
	 */
	public function setItem($data){
		if(empty($data)){
			throw new Exception('You cannot set an empty data to the cache');
		}
		$this->cache_data = $data;
		return $this;
	}

	/**
	 * Set the expiration of the cache and save
	 * 
	 * @param int $time
	 * @return void
	 */
	public function expires($time = 3600){
		
		if(!is_numeric($time)){
			throw new Exception('Invalid cache expiration.');
		}
		// store item to cache
		$key = !is_null($this->custom_key) ? md5($this->cache_key . ':' . $this->custom_key) : md5($this->cache_key);
		apcu_store($key, $this->cache_data, $time);
	}

	/**
	 * Get the item in the cache
	 *
	 * @param mixed $key              The cache key
	 * @param string $customClaim     The custom claim to the cache
	 * @return mixed
	 */
	public function getItem($key, $customClaim = null){
		$key = !is_null($customClaim) ? md5($key . ':' . $customClaim) : md5($key);
		$data = apcu_fetch($key);
		return !empty($data) ? $data : [];
	}

	/**
	 * Delete item in cache
	 *
	 * @param string $key          The cache key
	 * @param string $customClaim  The cache custom key
	 * @return bool
	 */
	public function deleteCache($key, $customClaim = null){
		$key = !is_null($customClaim) ? md5($key . ':' . $customClaim) : md5($key);
		return apcu_delete($key);
	}

}