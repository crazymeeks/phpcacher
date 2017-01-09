<?php
require_once('./vendor/autoload.php');

use Crazymeeks\PHPCacher\Cacher;

$cache = new Cacher;

$instance = $cache->setDriver('files');

//echo $instance->setKey('test')->setItem(['test'])->expires(30);
echo $instance->getItem('test');