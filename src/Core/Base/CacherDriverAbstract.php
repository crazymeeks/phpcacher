<?php namespace Crazymeeks\PHPCacher\Core\Base;

/**
 * Abstract class for cacher drivers
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use Crazymeeks\PHPCacher\Contracts\CacherDriverInterface;
use Crazymeeks\PHPCacher\Core\Driver;
use Crazymeeks\PHPCacher\Core\Base\BaseTrait;

abstract class CacherDriverAbstract{

	use BaseTrait;
	
	protected $driver;

	
}