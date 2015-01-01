# Usage #

You can manage an unlimited amount of storage engines within the cache manager.

```php
use Titon\Cache\Cache;
use Titon\Cache\Storage\MemcacheStorage;
use Titon\Cache\Storage\XcacheStorage;

$cache = new Cache();

// Use memcache
$cache->addStorage('memcache, new MemcacheStorage([
    'server' => 'localhost:11211',
    'persistent' => true,
    'compress' => true
]));

// And xcache
$cache->addStorage('xcache', new XcacheStorage([
    'username' => 'admin',
    'password' => md5('pass')
]));
```

Once a storage engine exists, you can get and set data to the cache.

```php
$cache->get('key', 'memcache'); // Get key from memcache
$cache->set('key', [], 'xcache'); // Set key into xcache

// Equivalent to
$cache->getStorage('memcache')->get('key');
$cache->getStorage('xcache')->set('key', []);
```

Storage also supports incrementing and decrementing.

```php
$cache->increment('key', 1, 'memcache'); // +1
$cache->decrement('key', 4, 'memcache'); // -4

// Equivalent to
$cache->getStorage('memcache')->increment('key', 1);
$cache->getStorage('memcache')->decrement('key', 4);
```

You can also remove a single value, or flush all values.

```php
$cache->remove('key', 'xcache'); // or
$cache->getStorage('xcache')->remove('key');

// Flush single storage
$cache->flush('memcache'); // or
$cache->getStorage('memcache')->flush();

// Or flush all storage
$cache->flush();
```

However, storage engines can be used manually outside of the Cache class.