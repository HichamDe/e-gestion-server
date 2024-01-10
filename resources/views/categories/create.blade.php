<x-app-layout>

    <h1>Creer une nouvelle categorie</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="input-group-text">
            <label for="designation">Designation:</label>
            <input name="designation" class="form-control mt-0 ms-2" type="text" value=""
                aria-label="Checkbox for following text input">
        </div>
        <div class="input-group-text mt-2">
            <label for="description">Description:</label>
            <input name="description" class="form-control mt-0 ms-2" type="text" value=""
                aria-label="Checkbox for following text input">
        </div>
        <div class="mt-3">
            <input class="btn btn-primary" type="submit" value="Ajouter">
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
</x-app-layout>
