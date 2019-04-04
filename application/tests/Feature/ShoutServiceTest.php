<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Service\ShoutService;

class ShoutServiceTest extends TestCase
{
    var $shoutService;

    public function setUp():void {
        $this->shoutService = new ShoutService();
    }

    /**
     * Check if the function upper text
     *
     * @return void
     */
    public function testUpperCase()
    {
        $text = "This text is a example";
        $textReferenceUpper = strtoUpper($text);

        $textFunction = $this->shoutService->toUpper($text);
        
        $this->assertEquals($textFunction,$textReferenceUpper, "The function no modify to upper text");   
    }

    /**
     * Check if the function add exclamation
     *
     * @return void
     */
    public function testInsertExclamation()
    {
        $text = "This text is a example";
        $textReference = $text."!";

        $textFunction = $this->shoutService->insertExclamation($text);
        
        $this->assertEquals($textFunction,$textReference, "The function no added exclamation to text");   
    }
}
