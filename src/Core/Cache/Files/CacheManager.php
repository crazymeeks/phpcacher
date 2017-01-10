<?php namespace Crazymeeks\PHPCacher\Core\Cache\Files;

/**
 * The File cache manager
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use Crazymeeks\PHPCacher\Core\Base\CacherDriverAbstract;
use Crazymeeks\PHPCacher\Core\Contracts\CacherDriverInterface;
use Exception;
class CacheManager extends CacherDriverAbstract implements CacherDriverInterface{
	

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

		$cache_dir = null;

		if(os_type() == 'windows'){
			$cache_dir = "C:/tmp/";
		}elseif(os_type() == 'linux' || os_type() == 'mac'){
			$cache_dir = "/tmp/";
		}
		$key = md5($this->key);
		if(!is_null($cache_dir)){
			if(!file_exists($cache_dir)){
				mkdir($cache_dir, 0777);
			}
			$file = fopen($cache_dir . $key . '.txt', "w");

			$data = ['expiration' => [time() + $time, 'data' => $this->cache_data]];
			$data = serialize($data);
			fwrite($file, $data);
			fclose($file);
			echo $this->key;
		}

	}

	public function getItem($key){
		$file = file_get_contents("C:/tmp/" . md5($key) . '.txt');
		$data = unserialize($file);
		if($data['expiration'][0] < time()){
			echo "expired na";exit;
		}
		echo "<pre>";
		print_r($data);
	}

}