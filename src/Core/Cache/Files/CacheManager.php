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
	 * Construct
	 *
	 */
	public function __construct(){

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
				mkdir($this->getCacheDir(), 0777);
			}
			$file = fopen($this->getCacheDir() . $key . '.txt', "w");

			$data = ['expiration' => [time() + $time, 'data' => $this->cache_data]];
			$data = serialize($data);
			fwrite($file, $data);
			fclose($file);
			echo $this->key;
		}

	}

	public function getItem($key){
		if(!is_null($this->getCacheDir())){

			if(file_exists($this->getCacheDir() . md5($key) . '.txt')){
				$file = file_get_contents($this->getCacheDir() . md5($key) . '.txt');
				$data = unserialize($file);
				if($data['expiration'][0] < time()){
					echo "expired na";exit;
				}
				echo "<pre>";
				print_r($data);
			}else{
				echo 'Cache not written';
			}
			
		}else{
			echo "No directory found";
		}
		
	}

}