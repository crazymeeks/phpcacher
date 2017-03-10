
<h1 align="center">
	phpcacher
	<br>
	<a href="https://github.com/crazymeeks/phpcacher/releases"><img src="https://img.shields.io/github/release/crazymeeks/phpcacher.svg?colorB=e50000" alt="Release"></a>
	<a href="https://packagist.org/packages/crazymeeks/phpcacher"><img src="https://img.shields.io/packagist/v/crazymeeks/phpcacher.svg?colorB=00e500" alt="Packgist Latest Version"></a>
	<a href="https://packagist.org/packages/crazymeeks/phpcacher/stats"><img src="https://img.shields.io/packagist/dt/crazymeeks/phpcacher.svg?colorB=00e500" alt="Packgist Downloads"></a>
	<a href="https://github/contributors/crazymeeks/phpcacher"><img src="https://img.shields.io/github/contributors/crazymeeks/phpcacher.svg?colorB=00e500" alt="Contributors"></a>
	<a href="https://packagist.org/l/crazymeeks/phpcacher"><img src="https://img.shields.io/packagist/l/crazymeeks/phpcacher.svg" alt="License"></a>
</h1>

# About
A PHP caching library
* v1.0.0

# Requirements
* PHP >= 5.6.*

# Supported Drivers
* Files  
* apcu v4.0.8  

# How to Install
* In your composer.json file add this require key:
```
	"require": {
          "crazymeeks/phpcacher": "v1.0.0"
	}
```
* Using CLI command, copy and execute this command in the target project or specified folder:
```
	composer require crazymeeks/phpcacher
```

# How to use
```
  <?php
      require __DIR__ . '/vendor/autoload.php';
      
      use Crazymeeks\PHPCacher\Cacher;

      $cache = new Cacher;
      $instance = $cache->setDriver('files');
      $data = array('id' => 1, 'name' => 'John Doe');

      Store data to cache and expires in 1hr
      $data = array('name' => 'John Doe');
      $instance->setKey('user')->setItem($data)->expires(3600);

      Get Item in the cache
      $item = $instance->getItem('user');

      Print the item
      print_r($item);
  ?>
```

# Setting Custom Cache Directory
* You can also set your own cache directory where the cache data will be save.
```
  $instance->cache->setDriver('files', '/tmp/'); // For windows users, 'D:/cachetmp' or 'C:/cachetmp'
```

# Report Bug
Email: jeffclaud17@gmail.com

# Author
Jeff Claud[jeffclaud17@gmail.com]

# Contributor
Aaron Tolentino[aarontolentino123@gmail.com]

# Referrences
* See the [WIKI](https://github.com/crazymeeks/phpcacher/wiki) for documentation
