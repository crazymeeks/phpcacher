<?php namespace Crazymeeks\PHPCacher\Core\Contracts;

/**
 * Concrete interface for all cache drivers
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

interface CacherDriverInterface{
	

	public function setKey($key, $customKey = null);

	public function setItem($data);

	public function expires($time = 3600);

	public function getItem($key, $customClaim = null);

}