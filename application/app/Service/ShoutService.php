<?php

namespace App\Service;

class ShoutService{
    
    public function toUpper($text){
        return strtoUpper($text);
    }

    public function insertExclamation($text){
        return $text."!";
    }
}