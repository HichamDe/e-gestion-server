<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="container m-auto">
        {{-- Search and Ajouter --}}
        <h1 class="mt-5 mb-3">Liste des categories</h1>
        <form action="{{ route('categories.search') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="designation">
                <button class="input-group-text" type="submit">
                    <img src="{{ asset('/search.png') }}">
                </button>
                <div id="ajouter"><a class="ms-2 btn btn-primary" href="{{ route('categories.create') }}">Ajouter
                        categorie</a></div>
            </div>
        </form>

        {{-- reset --}}
        <a href="{{ route('categories.index') }}">list des categories</a>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        {{-- Viewer --}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th>Id</th>
                <th>Designation</th>
                <th>Description</th>
                <th colspan="3">Actions</th>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cat->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $cat->designation }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cat->description }}
                        </td>
                        <td class="px-6 py-4 text-right flex gap-2">
                            <a href="{{ route('categories.show', ['category' => $cat->id]) }}">
                                <img src="{{ asset('/details.png') }}">
                            </a>
                            <a class="btn btn-success" href="{{ route('categories.edit', ['category' => $cat->id]) }}">
                                <img src="{{ asset('/change.png') }}">
                            </a>
                            <form action="{{ route('categories.destroy', ['category' => $cat->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('voulez-vous supprimer cette categorie?')">
                                    <img src="{{ asset('/delete.png') }}">
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
