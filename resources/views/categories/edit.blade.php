<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <form class="max-w-sm mx-auto mt-5" action="{{ route('categories.update', ['category' => $cat->id]) }}"
        method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                Designation</label>
            <input type="text" value="{{ old('designation', $cat->designation) }}" name="designation"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                Prix Unitaire</label>
            <textarea
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                name="description" id="description" cols="30" rows="10">{{ old('designation', $cat->description) }}</textarea>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
            Categorie
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

</x-app-layout>
