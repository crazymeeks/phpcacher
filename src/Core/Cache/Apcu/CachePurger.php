<?php namespace Crazymeeks\PHPCacher\Core\Cache\Apcu;
/**
 * Class responsible for clearing all cache data
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2017
 */

class CachePurger{
	
	/**
	 * Clear the cache
	 * @return void
	 */
	public function purgeAllCache(){
		apcu_clear_cache();
	}
}