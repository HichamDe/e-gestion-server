<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produits') }}
        </h2>
    </x-slot>

    <div class="container m-auto">

        <form class="max-w-sm mx-auto mat-5" action="{{ route('produits.update', ['produit' => $data['prod']->id]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Designation</label>
                <input type="text" name="designation" value="{{ old('designation', $data['prod']->designation) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Prix Unitaire</label>
                <input type="text" name="prix_u" value="{{ old('prix_u', $data['prod']->prix_u) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Quantité</label>
                <input type="text" name="quantite_stock"
                    value="{{ old('quantite_stock', $data['prod']->quantite_stock) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Categorie</label>
                <select value="{{ old('categorie_id', $data['prod']->categorie_id) }}"
                    class="@error('categorie_id') is-invalid @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    name="categorie_id">
                    <option value="" selected>Select categorie</option>
                    @foreach ($data['cats'] as $item)
                        <option value="{{ $item->id }}">{{ $item->designation }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="photo">

            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                Product
            </button>
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
    </div>

</x-app-layout>
