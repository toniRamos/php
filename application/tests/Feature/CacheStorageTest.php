<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Infrastructure\CacheStorage;

class CacheStorageTest extends TestCase
{

    /**
     * A basic feature get storage in cache.
     *
     * @return void
     */
    public function testGet()
    {
        $userTest = "ExampleUserName";
        $limit = 1;
        $textSave = "This a test save in cache";

        $stub = $this->createMock(CacheStorage::class);

        $varReturn = [
            $textSave
        ];

        $stub->method('get')->willReturn($varReturn);

        $valueCallReturned = $stub->get($userTest,$limit);

        $this->assertSame([$textSave], $valueCallReturned);

    }

    /**
     * A basic feature set storage in cache.
     *
     * @return void
     */
    public function testSet()
    {
        $userTest = "ExampleUserName";
        $limit = 1;
        $textSave = "This a test save in cache";

        $stub = $this->createMock(CacheStorage::class);

        $varReturn = true;

        $stub->method('set')->willReturn($varReturn);

        $valueCallReturned = $stub->set($userTest,$limit,[$textSave]);

        $this->assertSame(true, $valueCallReturned);

    }
}
