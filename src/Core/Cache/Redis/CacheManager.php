<?php namespace Crazymeeks\PHPCacher\Core\Cache\Redis;

/**
 * The Redis cache manager
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use Crazymeeks\PHPCacher\Core\Base\CacherDriverAbstract;
use Crazymeeks\PHPCacher\Core\Contracts\CacherDriverInterface;
use Exception;
use Predis;

class CacheManager extends CacherDriverAbstract implements CacherDriverInterface{
	
	protected $redis_client;

	public function __construct(){

		$this->connect();

	}

	public function connect(){
		$redis_client = new Predis\Client(array(
            "host" => "localhost"
        ));

        $redis_client->connect();

        $this->redis_client = $redis_client;

        
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
		$this->redis_client->set($this->key,$this->cache_data);
		$this->redis_client->expire($this->key, $time);
		$this->redis_client->ttl($this->key);

	}

	/**
	 * Get single item
	 * 
	 * @param string $key
	 * @return string
	 */

	public function getItem($key){
		return $this->redis_client->get($key);
	}

	/**
	 * Get all items in redis
	 * 
	 *
	 * @return array
	 */
	public function getAllItems(){

		return $this->redis_client->keys("*");
	}
}