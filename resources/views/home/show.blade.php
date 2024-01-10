@extends('layouts.admin')
@section('title', 'Home Page')
@section('content')

    <a href="{{ route('clear-panier-item') }}">Clear Panier</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Icon</th>
                <th scope="col">designation</th>
                <th scope="col">prix</th>
                <th scope="col">quantity</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @php($total = 0)
            @foreach ($produits as $prod)
                <tr>
                    <td>
                        <img height="50" src={{ asset("storage/" . $prod["photo"]) }} alt="">
                    </td>
                    <td> {{ $prod['designation'] }} </td>
                    <td> {{ $prod['prix_u'] }} </td>
                    @php($total += $prod['prix_u'] * $prod['qnt'])
                    <td> {{ $prod['qnt'] }} </td>
                    <td>
                        <form method="POST" action="{{ route('remove-panier-item') }}/?id={{ $prod['id'] }}">
                            @csrf
                            <button class="btn btn-danger" type="submit"><img src="{{ asset('/delete.png') }}"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="h3">Total: {{ $total }} </td>
                <td>
                    <form action='{{route("commandes.create")}}'>
                        @csrf
                        <button class="btn btn-primary" type="submit">Command</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
