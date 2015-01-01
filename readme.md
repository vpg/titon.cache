# Cache v0.8.2 [![Build Status](https://travis-ci.org/titon/cache.png)](https://travis-ci.org/titon/cache) #

Provides a data caching layer that supports popular storage engines like Memcache, APC, Redis, Wincache, Xcache,
and the local file system. A `Cache` instance can be used to manage and interact with `Storage` engines.

```php
$cache = new Titon\Cache\Cache();
$cache->addStorage('memcache', new Titon\Cache\Storage\MemcacheStorage());
$cache->addStorage('fs', new Titon\Cache\Storage\FileSystemStorage());

$cache->set('foo', $data, '+1 hour', 'memcache');
$data = $cache->get('bar', 'fs');
```

`Storage` engines can also be used externally and are primarily injected into other services for caching.

```php
$apc = new Titon\Cache\Storage\ApcStorage();
$apc->remove('foo');
```

### Features ###

* `Cache` - Storage management layer
* `Storage` - Vendor specific caching mechanism

### Dependencies ###

* `Common`
* `Io` (optional, for FileSystemStorage)
* `Db` (optional, for DatabaseStorage)

### Requirements ###

* PHP 5.4.0
    * Igbinary (optional)
    * Apc (for ApcStorage)
    * Memcached (for MemcacheStorage)
    * Redis (for RedisStorage)
    * Wincache (for WincacheStorage)
    * Xcache (for XcacheStorage)