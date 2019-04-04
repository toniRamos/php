<?php

namespace App\Http\Controllers;

use App\Infrastructure\TweetRepositoryInMemory;

class AppController extends Controller{
    public function helloWorld(){
        print_r("Hola que ase");
    }

    public function ping(){
        return response()->json("pong", 200);
    }

    public function shout($userName,$limit){
        $test = new TweetRepositoryInMemory();
        $twits = $test->searchByUserName("hola",2);
        print_r($twits[0]->getText());

        print_r($userName);
        print_r("\n");
        print_r($limit);
    }

}