<?php
require_once('./vendor/autoload.php');

use Crazymeeks\PHPCacher\Cacher;
use Crazymeeks\PHPCacher\Logger;

$cache = new Cacher;

/*** File Cache **/



/*$instance = $cache->setDriver('files');
$data = json_encode([['id' => 2, 'name' => 'John Does', 'email' => 'johndoe@example.com']]);
$instance->setExpiration(30);

$instance->setKey('user?page=1', 1)->setItem($data)->expires(3600);*/
/*$data = json_decode($instance->getItem('user?page=1', 1));


//echo gettype($data);
if(count($data) > 0){
	echo "<pre>";
	print_r($data);

	// foreach($data as $d){
	// 	echo $d->name;
	// }
}*/


/*** Redis Cache **/


// $instance = $cache->setDriver('redis');

// $instance->setKey('names','aaron')->setItem('Aaron Paul')->expires(10);

// var_dump($instance->getItem("names","aaron"));



/*********Sample Usage of Logger***********/



$log = new Logger();
$log_var = $log->setLogger("redis");

echo $log_var->setLog("Test Logger",3);