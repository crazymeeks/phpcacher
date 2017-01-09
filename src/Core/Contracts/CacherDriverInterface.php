<?php namespace Crazymeeks\PHPCacher\Core\Contracts;

/**
 * Concrete interface for all cache drivers
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

interface CacherDriverInterface{
	

	public function setKey($key);

	public function setItem($data);

	public function expires($time);

	public function getItem($key);


}