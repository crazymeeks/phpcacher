<?php namespace Crazymeeks\PHPCacher\Core\Base;

trait BaseTrait{

	/**
	 * Holds our cache key
	 * @var
	 */
	protected $cache_key;

	/**
	 * Holds our cache data
	 * @var mixed
	 */
	protected $cache_data;

	/**
	 * Holds cache directory
	 * @var
	 */
	protected $cache_dir = null;

	/**
	 * Set cache directory
	 *
	 * @return void
	 */
	public function setCacheDir(){
		$cache_dir = null;
		if(os_type() == 'windows'){
			$cache_dir = "C:/tmp/";
		}elseif(os_type() == 'linux' || os_type() == 'mac'){
			$cache_dir = "/tmp/";
		}

		$this->cache_dir = $cache_dir;
	}

	/**
	 * Get the cache directory
	 *
	 * @return string | null
	 */
	public function getCacheDir(){
		return $this->cache_dir;
	}
}