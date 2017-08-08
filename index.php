<?php

require('./vendor/autoload.php');

use Crazymeeks\PHPCacher\Cacher;
use Crazymeeks\PHPCacher\Logger;

## Sample usage
$cache = new Cacher;

# Set the cache driver
$instance = $cache->setDriver('files');
# Prepare cache data
$data = json_encode([['id' => 2, 'name' => 'John Dsoe', 'email' => 'johndoe@example.com']]);
# Set cache data
$instance->setKey('mykey')->setItem($data)->everyFiveMinutes();

# Optional: Set the global expiration
#$instance->setExpiration(30);

## Get the cached data

# $data = json_decode($instance->getItem('mykey'));
# if(count($data) > 0){
# 	echo "<pre>";
# 	print_r($data);
# }

################################################################
# Please refer to https://github.com/crazymeeks/phpcacher/wiki #
# for more details about the usage                             #
################################################################