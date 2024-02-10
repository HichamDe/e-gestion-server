<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produits') }}
        </h2>
    </x-slot>

    <div class="container m-auto">
  
        <div id="ajouter">
            <a class="ms-2 btn btn-primary" href="{{ route('produits.create') }}">Ajouter Produit</a>
        </div>

        {{-- reset --}}
        <a href="{{ route('produits.index') }}">list des produits</a>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                    Our products
                    <p class="mt-1 text-sm font-normal text-gray-500">Browse a list of Flowbite
                        products designed to help you work and play, stay organized, get answers, keep in touch, grow
                        your business, and more.</p>
                    <form action="{{ route('produits.index') }}" method="get">
                        <div class="input-group mb-3">
                            <label for="designation">designation</label>
                            <input type="text" class="form-control" name="designation"
                                value="{{ old('designation') }}">
                            <label for="min_price">min price</label>
                            <input class="form-control" type="text" name="min_price" value="{{ old('min_price') }}">
                            <label for="min_price">max price</label>
                            <input class="form-control" type="text" name="max_price" value="{{ old('max_price') }}">
                            <input type="submit" value="submit">
                    </form>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Designation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix U
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantité
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categorie Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($produits as $prod)
                        <tr class="bg-white border-b">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $prod->designation }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $prod->prix_u }}
                            </td>
                            <td class="px-6 py-4">
                                ${{ $prod->quantite_stock }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $prod->categorie_id }}
                            </td>
                            <td class="px-6 py-4 text-right flex gap-2">
                                <a href="{{ route('produits.show', ['produit' => $prod->id]) }}">
                                    <img src="{{ asset('/details.png') }}">
                                </a>

                                <a class="btn btn-success"
                                    href="{{ route('produits.edit', ['produit' => $prod->id]) }}">
                                    <img src="{{ asset('/change.png') }}">
                                </a>

                                <form action="{{ route('produits.destroy', ['produit' => $prod->id]) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('voulez-vous supprimer ce produit?')">
                                        <img src="{{ asset('/delete.png') }}">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div>
            <p> results {{ $produits->count() }} of {{ $produits->total() }}</p>
            <div></div>
        </div>
        {{ $produits->links() }}
    </div>

</x-app-layout>
