<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id_client)
    {
        // $client = Client::all();
        $client = $request->cookie("id_client");
        // dd($client);
        $cart = session()->get('cart');

        return view("clients.index", compact('client', 'cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "ville" => "",
            "adresse" => "",
            "tele" => "required",
            "login" => "required",
            "password" => "required"
        ]);
        $client = Client::create($data);
        $id_client = $client->id;
        $client->save();
        return redirect()->route("clients.login");
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
     */
    public function destroy(string $id)
    {
        //
    }

    public function loginPage()
    {
        return view("clients.login");
    }

    public function login(Request $request)
    {
        if ($request->cookie("id_client")) {
            cookie("id_client", "", -1);
        }

        $request->validate([
            "login" => "required|exists:clients,login",
            "password" => "required"
        ]);

        $client = Client::where("login", $request->input("login"))->first();
        
        Cookie::queue("id_client", $client->id, 45);
        return redirect()->route("commandes.create");

    }

}
