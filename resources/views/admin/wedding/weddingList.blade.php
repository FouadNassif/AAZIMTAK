@extends('components.adminLayout')
@section('title', 'Admin - Wedding List')

@section('content')

    <div class="w-full p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-2 border-gray-300 text-center shadow-lg rounded-lg">
                <caption class="text-lg font-semibold text-gray-800 py-4">Wedding List</caption>
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-3 px-4 border-b-2 border-r-2">ID</th>
                        <th class="py-3 px-4 border-b-2 border-r-2">BRIDE NAME</th>
                        <th class="py-3 px-4 border-b-2 border-r-2">BRIDE LASTNAME</th>
                        <th class="py-3 px-4 border-b-2 border-r-2">GROOM NAME</th>
                        <th class="py-3 px-4 border-b-2 border-r-2">GROOM LASTNAME</th>
                        <th class="py-3 px-4 border-b-2 border-r-2">CREATED AT</th>
                        <th class="py-3 px-4 border-b-2 border-r-2">UPDATED AT</th>
                        <th class="py-3 px-4 border-b-2 border-r-2">EDIT</th>
                        <th class="py-3 px-4 border-b-2">DELETE</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($weddings as $wedding)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition duration-150">
                            <td class="py-3 px-4 border-b-2">{{ $wedding->id }}</td>
                            <td class="py-3 px-4 border-b-2">{{ $wedding->bride_name }}</td>
                            <td class="py-3 px-4 border-b-2">{{ $wedding->bride_lastname }}</td>
                            <td class="py-3 px-4 border-b-2">{{ $wedding->groom_name }}</td>
                            <td class="py-3 px-4 border-b-2">{{ $wedding->groom_lastname }}</td>
                            <td class="py-3 px-4 border-b-2">{{ $wedding->created_at }}</td>
                            <td class="py-3 px-4 border-b-2">{{ $wedding->updated_at }}</td>
                            <td class="py-3 px-4 border-b-2">
                                <button onclick="editWedding({{ $wedding->id }})"
                                    class="text-blue-600 hover:text-blue-800 transition duration-150">
                                    <img src="{{ asset('assets/svg/edit.svg') }}" class="w-8 inline-block" alt="Edit">
                                </button>
                            </td>
                            <td class="py-3 px-4 border-b-2">
                                <button onclick="deleteWedding({{ $wedding->id }})"
                                    class="text-red-600 hover:text-red-800 transition duration-150">
                                    <img src="{{ asset('assets/svg/delete.svg') }}" class="w-8 inline-block" alt="Delete">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
