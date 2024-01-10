<?php

namespace Tests\Unit;

use App\Models\Client;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ClientCreationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        Artisan::call("migrate");
        // Artisan::call('db:seed');
        

        //* Create a new var client 
        $client = [
            "nom"=>"doe",
            "prenom"=>"jhon",
            "ville"=>"agadir",
            "adresse"=>"vue 115 dakhala fonti",
            "tele"=>"05 03 87865"
        ];

        //* Call the model client and get the result
        $result = Client::create($client);
        
        $this->assertDatabaseHas("client",["id"=>$result->id]);
    }
}
