<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $commandes=Commande::all();
       
        return view("commande",compact('commandes'));
        // dd($commandes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("commandes.create");
    }

    public function commandeEtat(int $id){
        $query = Etat::query();
        $next_etats = $query->where("id_precedent" ,"=",$id)->get();

        return response()->json($next_etats);
    }

    public function setEtat(int $id){
        
        echo "set Etat function";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $client = [
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "ville"=>$request->ville,
            "adresse"=>$request->adresse,
            "tele"=>$request->tele,
        ];
        $produits = session()->get("user.produits");

        $client = Client::create($client);
        $command = Commande::create(["client_id"=>$client->id,"etat_id"=>1]);
        foreach($produits as $prod){
            LigneCommande::create([
                "commande_id"=>$command->id,
                "produit_id"=>$prod["id"],
                "qte"=>$prod["qnt"],
                "prix"=>$prod["prix_u"]

            ]);
        }

        return "Your Commande is Fully Noted";


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */    public function destroy(string $id)
    {
        Commande::destroy($id);
        return  redirect()->route('commandes.index');

    }
}
