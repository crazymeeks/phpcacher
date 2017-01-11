<?php namespace Crazymeeks\PHPCacher\Core\Base;

trait BaseTrait{

	/**
	 * Holds our cache key
	 * @var
	 */
	protected $cache_key;

	/**
	 * The custom identifier for the cache
	 * @var
	 */
	protected $custom_key = null;

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
	 * @param string $customCachePath    The custom cache path set by developer
	 * @return void
	 */
	public function setCacheDir($customCachePath = null){
		
		$cache_dir = null;

		if(is_null($customCachePath)){
			if(os_type() == 'windows'){
			$cache_dir = "C:/tmp/" . $this->getRootDir() . '/' . strotolower($this->getDriverName()) . '/';
			}elseif(os_type() == 'linux' || os_type() == 'mac'){
				$cache_dir = "/tmp/" . $this->getRootDir() . '/' . strtolower($this->getDriverName()) . '/';
			}
		}else{
			$cache_dir = rtrim($customCachePath, "/") . '/' . $this->getRootDir() . '/' . strtolower($this->getDriverName()) . '/';
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

	/**
	 * Get the project directory
	 *
	 * We will use this together with cache defined directory
	 * to store cached data
	 * 
	 * @return string
	 */
	public function getRootDir(){
		$dir_root = explode("/", rtrim($_SERVER['DOCUMENT_ROOT'], "/"));
		return $dir_root[count($dir_root) - 1];
	}
}