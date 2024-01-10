<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorie') }}
        </h2>
    </x-slot>

    <a href="{{ route('categories.index') }}">Retourner vers la liste des categories</a>
    <h1>Detail de la categorie Num {{ $cat->id }}</h1>
    <div>
        <p><strong>Designation:</strong> {{ $cat->designation }}</p>
        <p><strong>Description:</strong> {{ $cat->description }}</p>
    </div>
</x-app-layout>
