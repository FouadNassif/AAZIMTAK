@extends('components.adminLayout')
@section('title', 'Admin - Wedding List')

@section('content')

    <div class="w-full p-6">
        <!-- Wedding Selector -->
        <div class="mb-4">
            <label for="weddingSelect" class="mr-2">Select Wedding:</label>
            <select id="weddingSelect" class="p-2 border border-gray-300">
                <option value="">Select a Wedding</option>
                @foreach ($weddings as $wedding)
                    <option value="{{ $wedding->id }}">{{ $wedding->bride_name }} & {{ $wedding->groom_name }}</option>
                @endforeach
            </select>

            <label for="statusFilter" class="ml-4 mr-2">Filter Status:</label>
            <select id="statusFilter" class="p-2 border border-gray-300">
                <option value="">All</option>
                <option value="attending">Attending</option>
                <option value="not attending">Not Attending</option>
                <option value="pending">Pending</option>
            </select>
        </div>

        <!-- Guest Table -->
        <table id="guestTable" class="min-w-full bg-white border-2 border-gray-300 text-center">
            <caption>Guest List</caption>
            <thead>
                <tr class="text-blue-600">
                    <th class="py-2 px-4 border-b-2 border-r-2">ID</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">WEDDING ID</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">WEDDING LINK</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">NAME</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">ATTENDING_STATUS</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">MESSAGE</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">NUMBER OF PEOPLE</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">CREATED AT</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">UPDATED AT</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">EDIT</th>
                    <th class="py-2 px-4 border-b-2 border-r-2">DELETE</th>
                </tr>
            </thead>
            <tbody id="guestTableBody">
                <!-- Data will be populated here by JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('weddingSelect').addEventListener('change', updateGuestList);
        document.getElementById('statusFilter').addEventListener('change', updateGuestList);

        function updateGuestList() {
            const weddingId = document.getElementById('weddingSelect').value;
            const status = document.getElementById('statusFilter').value;

            fetch(`/api/guests?wedding_id=${weddingId}&status=${status}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('guestTableBody');
                    tableBody.innerHTML = '';
                    data.guests.forEach(guest => {
                        tableBody.innerHTML += `
                            <tr>
                                <td class="py-2 px-4 border-b-2">${guest.id}</td>
                                <td class="py-2 px-4 border-b-2">${guest.wedding_id}</td>
                                <td class="py-2 px-4 border-b-2">${guest.wedding_link}</td>
                                <td class="py-2 px-4 border-b-2">${guest.name}</td>
                                <td class="py-2 px-4 border-b-2">${guest.attending_status}</td>
                                <td class="py-2 px-4 border-b-2">${guest.message}</td>
                                <td class="py-2 px-4 border-b-2">${guest.number_of_people}</td>
                                <td class="py-2 px-4 border-b-2">${guest.created_at}</td>
                                <td class="py-2 px-4 border-b-2">${guest.updated_at}</td>
                                <td class="py-2 px-4 border-b-2"><button onclick="editWedding(${guest.id})"><img src="{{ asset('assets/svg/edit.svg') }}" class="w-8"></button></td>
                                <td class="py-2 px-4 border-b-2"><button onclick="deleteWedding(${guest.id})"><img src="{{ asset('assets/svg/delete.svg') }}" class="w-8"></button></td>
                            </tr>
                        `;
                    });
                });
        }
    </script>
@endsection
