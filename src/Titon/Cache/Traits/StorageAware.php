<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Titon\Cache\Traits;

use Titon\Cache\Storage;

/**
 * Permits a class to interact with a storage engine within the class layer.
 *
 * @package Titon\Cache\Traits
 */
trait StorageAware {

    /**
     * Storage engine instance.
     *
     * @type \Titon\Cache\Storage
     */
    protected $_storage;

    /**
     * Get the storage engine.
     *
     * @return \Titon\Cache\Storage
     */
    public function getStorage() {
        return $this->_storage;
    }

    /**
     * Set the storage engine.
     *
     * @param \Titon\Cache\Storage $storage
     * @return $this
     */
    public function setStorage(Storage $storage) {
        $this->_storage = $storage;

        return $this;
    }

}