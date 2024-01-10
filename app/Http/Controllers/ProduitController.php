<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produits = Produit::paginate(10);
        $query_builder = Produit::query();

        $designiation = $request->input("designation");
        $min_price = $request->input("min_price");
        $max_price = $request->input("max_price");

        if ($designiation) {
            $query_builder->where("designation", "like", "%" . $designiation . "%");
            $produits = $query_builder->paginate();
        }

        if ($min_price and $max_price) {
            $query_builder->whereBetween("prix_u", [$min_price, $max_price]);
            $produits = $query_builder->paginate();
        }






        return view("produit", compact('produits'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Categorie::all();
        return view('produits.create', compact('cats'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'designation' => 'required|unique:categories,designation',
            'prix_u' => 'required|numeric',
            'quantite_stock' => 'required|numeric',
            'categorie_id' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png,gif,svg|max:512000'

        ]);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('products/images', 'public');
            $validatedData['photo'] = $imagePath;
        }
        Produit::create($validatedData);
        return  redirect()->route('produits.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $prod = Produit::find($id);
        return view('produits.show')->with("prod", $prod);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prod = Produit::find($id);
        $cats = Categorie::all();
        $data = ["prod" => $prod, "cats" => $cats];

        return view('produits.edit', compact('data'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'designation' => 'required|unique:categories,designation',
            'prix_u' => 'required|numeric',
            'quantite_stock' => 'required|numeric|decimal:0',
            'categorie_id' => 'required',
            /*
            'photo' => [
                'required',
                File::image()
                    ->min(1024)
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))
                    
            ]
            */


        ]);
        $cat = Produit::find($id);
        $cat->update($request->all());
        return redirect()->route('produits.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produit::destroy($id);
        return  redirect()->route('produits.index');
    }
    public function search(Request $request)
    {

        $param = $request->query('designation');
        $produits = Produit::where('designation', 'like', '%' . $param . '%')->get();
        return view('produits.index', compact('produits'));
    }
    // public function filter(Request $request)
    // {
    //     $minPrice = $request->input('min_price');
    //     $maxPrice = $request->input('max_price');

    //     $produits = Produit::filterByPrice($minPrice, $maxPrice)->paginate(10);

    //     return view('produits.index', compact('produits', 'minPrice', 'maxPrice'));
    // }
}
