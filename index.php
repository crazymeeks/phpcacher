<?php
require('./vendor/autoload.php');
//echo time() + 24*60*60*365;exit;
use Crazymeeks\PHPCacher\Cacher;
use Crazymeeks\PHPCacher\Logger;

$cache = new Cacher;

/*** File Cache **/



$instance = $cache->setDriver('files');
// $data = json_encode([['id' => 2, 'name' => 'John Doe', 'email' => 'johndoe@example.com']]);
// $instance->setKey('cachekey')->setItem($data)->everyFiveMinutes();
/*$data = json_encode([['id' => 2, 'name' => 'John Does', 'email' => 'johndoe@example.com']]);
$instance->setExpiration(30);

$instance->setKey('1')->setItem($data)->expires(3600);*/
$data = json_decode($instance->getItem('cachekey'));

echo "<pre>";
	print_r($data);exit;
//echo gettype($data);
if(count($data) > 0){
	echo "<pre>";
	print_r($data);

	// foreach($data as $d){
	// 	echo $d->name;
	// }
}


/*** Redis Cache **/


// $instance = $cache->setDriver('redis');

// $instance->setKey('names','aaron')->setItem('Aaron Paul')->expires(10);

// var_dump($instance->getItem("names","aaron"));



/*********Sample Usage of Logger***********/



/*$log = new Logger();
$log_var = $log->setLogger("redis");

echo $log_var->setLog("Test Logger",3);*/