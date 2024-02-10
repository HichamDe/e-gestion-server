<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Commandes') }}
        </h2>
    </x-slot>
    <script>
        // function modifyEtat(index, id_etat) {
        //     const elem = document.getElementById(`etat-modifier-${index}`);
        //     const action = document.getElementById(`action-${index}`);
        //     action.innerHTML = `
        //             <button type="submit"
        //                 onclick="">
        //                 <img src="/valider.png">
        //             </button>`;

        //     elem.innerHTML = `
        //         <select id="nextEtats" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        //             <option selected>Choose a Etat</option>
        //         </select>
        //     `;
        //     const selectNextEtat = document.getElementById(`nextEtats`);


        //     const xhttp = new XMLHttpRequest();
        //     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             const etats = JSON.parse(this.response);
        //             etats.map(etat => selectNextEtat.innerHTML +=
        //                 `<option value="${etat.id}">${etat.intitule}</option>`);

        //         }
        //     };
        //     xhttp.open("POST", "/get-next-etats/" + id_etat);
        //     xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        //     xhttp.send();
        // }


        // function save(id_etat) {
        //     const xhttp = new XMLHttpRequest();
        //     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        //     xhttp.open("POST", "/set-etat/" + id_etat);
        //     xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        //     xhttp.send();
        // }
    </script>
    <div class="container m-auto">
        <p>Filter By :</p>
        <form action="{{ route('commandes.index') }}">
            <div class="row">
                <div class="col-3">
                    <label class="form-label" for="client">client</label>
                    <input class="form-input" type="text" name="client">
                </div>
                <div class="col-3">
                    <label class="form-label" for="etat">etat_id</label>
                    <input class="form-input" type="text" name="etat">
                </div>
                <div class="col-3">
                    <label class="form-label" for="etat">date min</label>
                    <input class="form-input" type="date" name="date_min">
                </div>
                <div class="col-3">
                    <label class="form-label" for="etat">date max</label>
                    <input class="form-input" type="date" name="date_max">
                </div>
            </div>
            <input type="submit" value="Filter">
        </form>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <th>Id</th>
                <th>client name</th>
                <th>etat</th>
                <th colspan="3">Actions</th>
            </thead>
            <tbody>
                @foreach ($commandes as $index => $commande)
                    <tr class="bg-white border-b">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $commande->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $commande->client->nom }}
                        </td>
                        <td id="etat-modifier-{{ $index }}" class="px-6 py-4">
                            {{ $commande->etat }}
                        </td>
                        <td id="action-{{ $index }}" class="px-6 py-4 text-right flex gap-3">
                            <a href="#">
                                <img src="{{ asset('/details.png') }}">
                            </a>
                            <a class="btn btn-success" href="#">
                                <button class="btn btn-danger" type="submit"
                                    onclick="modifyEtat({{ $index }},{{ $commande->etat->id }})">
                                    <img src="{{ asset('/change.png') }}">
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
