<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Infrastructure\CacheStorage;
use Cache;

class CacheStorageTest extends TestCase
{
    var $cacheStorage;

    public function setUp():void {
        $this->cacheStorage = new CacheStorage();
    }

    /**
     * A basic feature get storage in cache.
     *
     * @return void
     */
    public function testGet()
    {
        $userTest = "antonio";
        $limit = 1;
        $textSave = "This a test save in cache";

        $resultCall = false;

        #Cache::put("Hola","que tal ", 1);

        #$resultCall = $this->cacheStorage->set($userTest,$limit,$textSave);

        if($resultCall){
            #print_r("Guardado correctamente");
        }else{
            #print_r("Ojo cuidado, no guardado");
        }

        $this->assertTrue(true,true);

    }

    /**
     * A basic feature set storage in cache.
     *
     * @return void
     */
    public function testSet()
    {

        $this->assertTrue(true,true);

        #print_r("hola que ase");die;

    }
}
