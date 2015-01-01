<?php
namespace Titon\Cache\Storage;

use Exception;

class FileSystemStorageTest extends AbstractStorageTest {

    protected function setUp() {
        $this->object = new FileSystemStorage(TEMP_DIR);

        parent::setUp();
    }

    /**
     * Delete all cache items and folders.
     */
    protected function tearDown() {
        $this->object->flush();
        unset($this->object);
        @rmdir(TEMP_DIR);
    }

    public function testExceptionThrownMissingDir() {
        try {
            new FileSystemStorage('');
            $this->assertTrue(false);
        } catch (Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testFlush() {
        $this->assertFileExists(TEMP_DIR . '/User.getById.1337.cache');
        $this->object->flush();
        $this->assertFileNotExists(TEMP_DIR . '/User.getById.1337.cache');
    }

    public function testRemove() {
        $this->assertTrue($this->object->has('User::getById-1337'));
        $this->assertFileExists(TEMP_DIR . '/User.getById.1337.cache');

        $this->object->remove('User::getById-1337');

        $this->assertFalse($this->object->has('User::getById-1337'));
        $this->assertFileNotExists(TEMP_DIR . '/User.getById.1337.cache');
    }

}