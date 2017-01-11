<?php namespace Crazymeeks\PHPCacher\Core\Cache\Files;

/**
 * The File cache manager
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
	 * @return $this
	 */
	public function setKey($key){
		$this->key = $key;

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
	public function expires($time){

		if(!is_numeric($time)){
			throw new Exception('Invalid cache expiration.');
		}

		$key = md5($this->key);
		if(!is_null($this->getCacheDir())){

			if(!file_exists($this->getCacheDir())){
				mkdir($this->getCacheDir(), 0777, true);
			}
			$file = fopen($this->getCacheDir() . $key . '.txt', "w");

			$data = ['expiration' => [time() + $time, 'data' => $this->cache_data]];
			$data = serialize($data);
			fwrite($file, $data);
			fclose($file);
		}

	}

	/**
	 * Get the item in the cache
	 *
	 * @param mixed $key              The cache key
	 * @return mixed
	 */
	public function getItem($key){

		if(!is_null($this->getCacheDir())){

			if(file_exists($this->getCacheDir() . md5($key) . '.txt')){
				$file = file_get_contents($this->getCacheDir() . md5($key) . '.txt');
				$data = unserialize($file);
				if($data['expiration'][0] < time()){
					unlink($this->getCacheDir() . md5($key) . '.txt');
					return [];
				}
				return $data['expiration']['data'];
			}else{
				return Response::error(['cache' => ['Cannot write the cache']]);
			}
			
		}else{
			return Response::error(['cachedir' => ['Cache directory not found.']], 500);
		}
		
	}

}