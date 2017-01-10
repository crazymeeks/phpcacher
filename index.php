<?php
require_once('./vendor/autoload.php');

use Crazymeeks\PHPCacher\Cacher;

$cache = new Cacher;

/*** File Cache **/


$instance = $cache->setDriver('files', "C:/tmp");

echo $instance->setKey('test')->setItem(['test'])->expires(30);
//$instance->getItem('test');


/*** Redis Cache **/


/*$instance = $cache->setDriver('redis');

$instance->setKey('names')->setItem('Aaron Paul')->expires(10);

var_dump($instance->getItem("names"));
*/