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
use Predis\Client as RedisClient;
class CacheManager extends CacherDriverAbstract implements CacherDriverInterface{
	
	protected $redis_client;

	public function __construct(RedisClient $redisclient){

		$this->connect($redisclient);

	}

	public function connect(RedisClient $client){

        $client->connect();

        $this->redis_client = $client;

        
	}

	/**
	 * Set the key for our cache
	 *
	 * @param string $key         The name of the cache's key
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
	public function expires($time){

		if(!is_numeric($time)){
			throw new Exception('Invalid cache expiration.');
		}
		$key = ($this->cache_key . (!is_null($this->custom_key) ? '-' . $this->custom_key : ''));
		$this->redis_client->set($key, $this->cache_data);
		$this->redis_client->expire($key, $time);
		$this->redis_client->ttl($key);

	}

	/**
	 * Get single item
	 * 
	 * @param string $key
	 * @return string
	 */

	public function getItem($key, $customClaim = null){
		$key = (!is_null($customClaim) ? $key = $key . '-' . $customClaim : $key = $key . '');
		
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