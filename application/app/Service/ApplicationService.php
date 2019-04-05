<?php

namespace App\Service;

use App\Infrastructure\TweetRepositoryInMemory;
use App\Infrastructure\CacheStorage;
use App\Service\ShoutService;
use Log;


class ApplicationService{
    private $tweetRepository;
    private $cacheStorage;
    private $shoutService;

    function __construct(){
        $this->tweetRepository = new TweetRepositoryInMemory();
        $this->cacheStorage = new CacheStorage();
        $this->shoutService = new ShoutService();
    }

    #This function obtain messages an process
    public function getMessages($userName,$limit) {
        $arrayTree = [];

        Log::debug("I will check cached messages fot this username and limit");
        $twittsSaved = $this->cacheStorage->get($userName,$limit);

        $twits = [];


        if(empty($twittsSaved)){
            Log::debug("This user and limit not contain twits in cache");
            $twits = $this->obtainTwits($userName,$limit);
            Log::debug("He obtain messages");
        }else{
            $twits = $twittsSaved;
            Log::debug("Messages is cached");
        }

        Log::debug("go translate messages an process");
        foreach($twits as $twit){
            $textTwit = $twit;

            $textTwit = $this->transformText($textTwit);

            $arrayTree[] = utf8_encode($textTwit);

        }
        Log::debug("Finish process messages");

        return $arrayTree;
    }

    #This function transform to messages to upper and add exclamation
    private function transformText($textTwit){
        $textModified = $textTwit;

        $textModified = $this->shoutService->toUpper($textModified);
        $textModified = $this->shoutService->insertExclamation($textModified);

        return $textModified; 

    }

    #This function get messages to repository
    private function obtainTwits($userName,$limit){
        $twits = $this->tweetRepository->searchByUserName($userName,$limit);

        $twits = $this->generateTreePhp($twits);

        $saved = $this->cacheStorage->set($userName,$limit,$twits);

        return $twits;
    }

    #this function generates a php tree of the twits objects
    private function generateTreePhp($twits){
        $arrayTree = [];

        foreach($twits as $twit){
            $arrayTree[] = $twit->getText();
        }

        return $arrayTree;
    }

}