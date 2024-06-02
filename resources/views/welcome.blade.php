@extends('app')


@section('content')
    <h1 class="py-4 title">Liste des contacts</h1>
    <div class="flex justify-between mb-4 app-header">
        <input type="text" class="px-4 py-2 rounded-md focus:outline-none" placeholder="Recherche...">
        <a href="javascript:void(0)" id="create-contact"
            class="add bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded flex items-center">
            <span class="mr-2">@include('components.icons.plus-svg')</span>
            Ajouter
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-gray-00 rounded-table">
            <thead class="">
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300 text-left sort" data-column="nom" data-order="asc">NOM DU CONTACT ↨</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left sort" data-column="entreprise" data-order="asc">SOCIÉTÉ ↨</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left sort" data-column="status" data-order="asc">STATUS ↨</th>
                    <th class="py-2 px-4 border-b border-gray-300"></th>
                </tr>
            </thead>
            <tbody id="contact-table-body">
                @foreach ($contacts as $contact)
                    <tr id="contact_{{ $contact->id }}">
                        <td class="py-2 px-4 border-b border-gray-300 ">{{ $contact->prenom }} {{ $contact->nom }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $contact->entreprise }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 status">
                            @if ($contact->status == 'CLIENT')
                                <span
                                    class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-700/10">CLIENT</span>
                            @elseif ($contact->status == 'LEAD')
                                <span
                                    class="inline-flex items-center rounded-full bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">LEAD</span>
                            @elseif ($contact->status == 'PROSPECT')
                                <span
                                    class="inline-flex items-center rounded-full bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-700/10">PROSPECT</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <div class="flex actions">
                                <a href="javascript:void(0)" class="mr-4"
                                    onclick="showContact({{ $contact->id }})">@include('components.icons.show-svg')</a>
                                <a href="javascript:void(0)" class="mr-4"
                                    onclick="editContact({{ $contact->id }})">@include('components.icons.edit-svg')</a>
                                <a href="javascript:void(0)"
                                    onclick="deleteContact({{ $contact->id }} , 'contact_{{ $contact->id }}')">@include('components.icons.delete-svg')</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('sorting-scripts')
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            const headers = document.querySelectorAll('.sort');
            headers.forEach(header => {
                header.addEventListener('click', () => {
                    const column = header.getAttribute('data-column');
                    const sortOrder = header.getAttribute('data-order');
                    const url = `/sort?column=${column}&order=${sortOrder}`;
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            updateTable(data);
                            toggleSortOrder(header);
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });

        function updateTable(data) {
            const tbody = document.getElementById('contact-table-body');
            tbody.innerHTML = '';
            data.forEach(contact => {
                const tr = document.createElement('tr');
                tr.id = `contact_${contact.id}`;
                tr.innerHTML = `
                    <td class="py-2 px-4 border-b border-gray-300">${contact.prenom} ${contact.nom}</td>
                    <td class="py-2 px-4 border-b border-gray-300">${contact.entreprise}</td>
                    <td class="py-2 px-4 border-b border-gray-300 status">${getStatusBadge(contact.status)}</td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <div class="flex actions">
                            <a href="javascript:void(0)" class="mr-4" onclick="showContact(${contact.id})">@include('components.icons.show-svg')</a>
                            <a href="javascript:void(0)" class="mr-4" onclick="editContact(${contact.id})">@include('components.icons.edit-svg')</a>
                            <a href="javascript:void(0)" onclick="deleteContact(${contact.id}, 'contact_${contact.id}')">@include('components.icons.delete-svg')</a>
                        </div>
                    </td>`;
                tbody.appendChild(tr);
            });
        }

        function toggleSortOrder(header) {
            const currentOrder = header.getAttribute('data-order');
            header.setAttribute('data-order', currentOrder === 'asc' ? 'desc' : 'asc');
        }

        function getStatusBadge(status) {
            let badgeClass = '';
            switch (status) {
                case 'CLIENT':
                    badgeClass = 'bg-green-50 text-green-700';
                    break;
                case 'LEAD':
                    badgeClass = 'bg-blue-50 text-blue-700';
                    break;
                case 'PROSPECT':
                    badgeClass = 'bg-yellow-50 text-yellow-700';
                    break;
                default:
                    badgeClass = 'bg-gray-200 text-gray-700';
            }
            return `<span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium ${badgeClass}">${status}</span>`;
        }

    </script>
@endpush


