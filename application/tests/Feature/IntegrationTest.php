<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Service\ApplicationService;
use App\Infrastructure\CacheStorage;
#use Log;
use Illuminate\Support\Facades\Log;

class IntegrationTest extends TestCase
{
    private $aplicationService;


    /**
     * A basic feature test this test call curl to application and check if all its OK.
     *
     * @return void
     */
    public function testIntegration()
    {

        $userTest = "userNameTwitter";
        $limit = 3;

        $handle = curl_init();
 
        $url = "127.0.0.1:8000/shout/".$userTest."/limit=".$limit;
        
        // Set the url
        curl_setopt($handle, CURLOPT_URL, $url);
        // Set the result output to be a string.
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
         
        $output = curl_exec($handle);
         
        curl_close($handle);
         
        $resultCall = $output;

        $resultCallInTreePhp = json_decode($resultCall,true);
        
        $allInUpper = true;
        $allContainExclamation = true;

        foreach($resultCallInTreePhp as $itemArray){
            if($itemArray != strtoUpper($itemArray)){
                $allInUpper = false;
            }
            
            $lastCharacter = substr($itemArray, -1);

            if($lastCharacter != "!"){
                $allContainExclamation = false;
            }

        }

        $this->assertSame(true,$allInUpper,"The test integration is ko, any text is not upper");
        $this->assertSame(true,$allContainExclamation,"The test integration is ko, any text last character is not exclamation");
    }
}
