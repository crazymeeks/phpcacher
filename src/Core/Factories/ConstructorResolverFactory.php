<?php namespace Crazymeeks\PHPCacher\Core\Factories;
/**
 * The factory of all drivers
 *
 * @author Jeff Claud<jeffclaud17@gmail.com>
 * @since 2016
 */

use ReflectionClass;
use Crazymeeks\PHPCacher\Core\Exceptions\PHPCacherDriverNotFoundException;
use Predis\Client as RedisClient;
class ConstructorResolverFactory{
	
	public function createClassConstructor($driver){

		switch($driver){
			case 'files':
				return [];
			case 'redis':
				return new RedisClient;
			case 'mongo':
				return [];
			default:
				return [];
		}
	}
}