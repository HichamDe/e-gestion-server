@extends('layouts.admin')
@section('title', 'Home Page')
@section('content')



    {{-- Search and Ajouter --}}
    <h1 class="mt-5 mb-3">Welcome GestionE</h1>

    {{-- reset --}}
    <a href="{{ route('produits.index') }}">list des produits</a>

    <div class="row gap-5">
        <a href="{{ route('show-panier') }}">Show Panier</a>
        @foreach ($produits as $prod)
            <form method="POST" action="{{ route('add-panier') }}/" class="card col-4" style="width: 18rem;">
                @csrf
                <img src="{{ asset("storage/$prod->photo") }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $prod->designation }}</h5>
                    <p class="card-text">{{ $prod->prix_u }}</p>
                    {{-- hidden inputs --}}

                    <input value="{{$prod->id}}" type="hidden" name="id">
                    <input value="{{$prod->prix_u}}" type="hidden" name="prix_u">
                    <input value="{{$prod->designation}}" type="hidden" name="designation">
                    <input value="{{$prod->photo}}" type="hidden" name="photo">

                    <input placeholder="quantity" class="form-control mb-3" type="number" name="qnt">

                    <button type="submit" href="#" class="btn btn-primary">Detailt</button>
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </div>
            </form>
        @endforeach
    </div>

    {{ $produits->links() }}
@endsection
