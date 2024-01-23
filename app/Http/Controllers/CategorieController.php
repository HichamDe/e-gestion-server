<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Categorie::all();
       
        return view("categorie",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'designation'=>'required|unique:categories,designation',
            'description'=>'required',
        ]);
        Categorie::create($request->all()); 
        return  redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cat=Categorie::find($id);
        
        return view('categories.show')->with("cat",$cat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat=Categorie::find($id);
        return view('categories.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'designation'=>'required|unique:categories,designation',
            'description'=>'required',
        ]);
        $cat=Categorie::find($id);
        $cat->update($request->all());
        return redirect()->route('categories.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categorie::destroy($id);
        return  redirect()->route('categories.index');

    }
    public function search(Request $request){
       
        $param=$request->query('designation');
        $categories=Categorie::where('designation','like','%'.$param.'%')->get();
        return view('categories.index',compact('categories'));
    }
}