@extends('layouts.admin')
@section('title','Detail d \'une categorie')
@section('content')
    <a href="{{route('produits.index')}}">Retourner vers la liste des produits</a>
    <h1>Detail de la produit Num {{$prod->id}}</h1>
    <img src="{{asset("storage/$prod->photo")}}" alt="product image">
    <div>
        <p><strong>Designation:</strong> {{$prod->designation}}</p>
        <p><strong>prix unitere:</strong> {{$prod->prix_u}}</p>
        <p><strong>quantite on stock:</strong> {{$prod->quantite_stock}}</p>
        <p><strong>id categorie:</strong> {{$prod->categorie_id}}</p>
    </div>
@endsection
