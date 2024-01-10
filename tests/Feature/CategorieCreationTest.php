<?php

namespace Tests\Feature;

use App\Models\Categorie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategorieCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_categorie(): void
    {
        //* Create a new var client 
        $categorie = [
            "designation" => "lorem ipsum test",
            "description" => "lorem ipsum",

        ];

        //* Call the model client and get the result
        $result = Categorie::create($categorie);

        $this->assertDatabaseHas("categories", ["id" => $result->id]);
    }
}
