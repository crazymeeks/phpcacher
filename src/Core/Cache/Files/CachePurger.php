<?php namespace Crazymeeks\PHPCacher\Core\Cache\Files;
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
	public function purgeAllCache($cache_dir){
		$cache_files = glob($cache_dir . '*');
		foreach($cache_files as $file){
			if(is_file($file)){
				unlink($file);
			}
		}
	}
}