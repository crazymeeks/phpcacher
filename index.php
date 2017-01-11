<?php
require_once('./vendor/autoload.php');

use Crazymeeks\PHPCacher\Cacher;

$cache = new Cacher;

/*** File Cache **/


$instance = $cache->setDriver('files');
$data = json_encode([['id' => 2, 'name' => 'John Does', 'email' => 'johndoe@example.com']]);
//$instance->setKey('user?page=1', 1)->setItem($data)->expires(3600);
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


/*$instance = $cache->setDriver('redis');

$instance->setKey('names')->setItem('Aaron Paul')->expires(10);

var_dump($instance->getItem("names"));
*/