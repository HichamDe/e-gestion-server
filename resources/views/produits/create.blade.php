@extends('layouts.admin')
@section('title', 'Ajouter un produit')
@section('content')
    <h1>Creer une nouvelle produit</h1>
    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group-text">
            <label for="designation">Designation:</label>
            <input name="designation" class="form-control mt-0 ms-2" type="text"
                aria-label="Checkbox for following text input">
        </div>

        <div class="input-group-text mt-2">
            <label for="description">Prix Unite:</label>
            <input name="prix_u" class="form-control mt-0 ms-2" type="text" value=""
                aria-label="Checkbox for following text input">
        </div>

        <div class="input-group-text mt-2">
            <label for="description">Quantite Stock:</label>
            <input name="quantite_stock" class="form-control mt-0 ms-2" type="text" value=""
                aria-label="Checkbox for following text input">
        </div>

        <select class="form-select @error("categorie_id") is-invalid @enderror" name="categorie_id" id="cat_id">
            <option value="" selected>Select categorie</option>
            @foreach ($cats as $item)
                <option value="{{ $item->id }}">{{ $item->designation }}</option>
            @endforeach
        </select>
        <label for="photo">image</label>
        <input type="file" name="photo"  alt="image" >

        <div class="mt-3">
            <input type="submit" value="Ajouter">
        </div>

    </form>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $er)
                    <li>{{ $er }}</li>
                @endforeach
            </ul>



        @endif
    </div>
@endsection
