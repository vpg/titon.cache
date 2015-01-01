<?php
namespace Titon\Cache\Storage;

use Titon\Db\Query;
use Titon\Test\Stub\Repository\Cache;

class DatabaseStorageTest extends AbstractStorageTest {

    protected function setUp() {
        $this->loadFixtures('Cache');

        $this->object = new DatabaseStorage(new Cache());

        parent::setUp();
    }

    protected function tearDown() {
        parent::tearDown();

        $this->unloadFixtures('Cache');
    }

}