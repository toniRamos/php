<?php

namespace App\Infrastructure;

use Cache;

class CacheStorage implements StorageRepository{
    private $timeCache;
    private $tokenFind;

    function __construct(){
        $this->timeCache = isset($_ENV['timeCache']) ? $_ENV['timeCache'] : 1000;
        $this->tokenFind = isset($_ENV['tokenFind']) ? $_ENV['tokenFind'] : '-';
    }

    #This function obtain data saved in cache
    public function get(string $username, int $limit):array {
        $arrayReturned = [];
        $keyFind = $username.$this->tokenFind.$limit;

        if(Cache::has($keyFind)){
            $jsonCache = Cache::get($keyFind);
            $arrayReturned = json_decode($jsonCache);
        }

        return $arrayReturned;
    }

    #This function set data saved in cacle
    public function set(string $username, int $limit, array $textSave) {
        $returnResultSave = true;
        $keySave = $username.$this->tokenFind.$limit;

        try{
            Cache::put($keySave, json_encode($textSave) , $this->timeCache);
        }catch(Exception $e){
            $returnResultSave = false;
        }

        return $returnResultSave; 
    }
}