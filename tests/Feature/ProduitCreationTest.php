<?php

namespace Tests\Feature;

use App\Models\Produit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProduitCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {


        //* Create a new var client 
        $produit = [
            'designation'=>"lorem ipsum 1",
            'prix_u'=>25,
            'quantite_stock'=>24,
            'categorie_id'=>2,
            'photo'=>"0.jfif",
        ];

        //* Call the model client and get the result
        $result = Produit::create($produit);
        
        $this->assertDatabaseHas("produits",["id"=>$result->id]);
    }
}
