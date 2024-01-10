<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        $produits = Produit::paginate(12);
        return view("welcome", compact("produits"));
    }



    public function addPanier(Request $request){

        $produits = [
            "id"=>$request->id,
            "designation"=>$request->designation,
            "prix_u"=>$request->prix_u,
            "qnt"=>$request->qnt,
            "photo"=>$request->photo,
        ];
        session()->push("user.produits",$produits);
        return $this->index();
    }
    public function showPanier(){

        $produits = session()->get("user.produits");
        return view("home.show",compact("produits"));
    }

    public function removePanier(Request $request){
        $produits = $request->session()->get('user.produits');
        foreach($produits as $key=>$prod){
            if($prod["id"] == $request->id) unset($produits[$key]);
        };
        session()->put("user.produits",$produits);
        return redirect()->route('show-panier');
    }
    public function sumPanier(){
        
    }
    public function clearPanier(Request $request){
        $request->session()->flush();
        return redirect()->route('index');
    }
    
}
