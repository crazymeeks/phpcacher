## PHPCacher
THe PHP caching library

## Note:
This library is in continues development

## Driver currently supported
Files  
Redis  

## Requirements
PHP 5.6 or greater

## Installation
Composer  
Run this code in your cmd  

composer require crazymeeks/phpcacher  
  

## How to use ?
Use the the Cacher in your class  
use Crazymeeks\PHPCacher\Cacher;

$cache = new Cacher;  
$instance = $cache->setDriver('files');  
$data = array('id' => 1, 'name' => 'John Doe');  
  
Store data to cache and expires in 1hr  
$instance->setKey('user')->setItem()->expires(3600);  
  
Get Item in the cache  
$item = $instance->getItem('user');  
  
Print the item  
print_r($item);

## Setting custom cache directory
You can also set your own cache directory where the cache data will be save.  
$instance->cache->setDriver('files', '/tmp/'); // For windows users, 'D:/cachetmp' or 'C:/cachetmp'  

## Report Bug
Email: jeffclaud17@gmail.com

## Author
Jeff Claud[jeffclaud17@gmail.com]

## Contributor
Aaron Tolentino[aarontolentino123@gmail.com]