@extends('components.userLayout')
@section('title', 'User - Guests')

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/userDashboard.css') }}">
@endsection

<div class="w-full flex justify-center items-center">
    <table id="guestTable" class="min-w-full bg-white text-center">
        <!-- Add the caption for the table -->
        <caption>
            <div class="flex justify-center mb-4 items-center">
                <label for="statusFilter" class="ml-4 mr-2">Filter Status:</label>
                <select id="statusFilter" class="p-2 border border-gray-300">
                    <option value="">All</option>
                    <option value="attending">Attending</option>
                    <option value="not attending">Not Attending</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
        </caption>

        <thead>
            <tr class="text-blue-600">
                <th class="p-4 border-b-2">NAME</th>
                <th class="p-4 border-b-2">WEDDING LINK</th>
                <th class="p-4 border-b-2">ATTENDING_STATUS</th>
                <th class="p-4 border-b-2">NUMBER OF PEOPLE</th>
                <th class="p-4 border-b-2">NUMBER OF KIDS</th>
                <th class="p-4 border-b-2">ACTION</th>
            </tr>
        </thead>
        <tbody id="guestTableBody">
            <!-- Data will be populated here by JavaScript -->
        </tbody>
    </table>
</div>

<div id="moreInfoGuestConMain"
    class="hidden fixed inset-0 bg-blue-300 bg-opacity-75 z-50 flex items-center justify-center">
    <div id="moreInfoGuestCon" class="bg-white p-4 rounded-lg">
        <div id="closeMoreInfoGuestCon" class="cursor-pointer text-right font-bold">X</div>
        <!-- Content dynamically loaded by JS -->
    </div>
</div>

@section('script')
    <script src="{{ asset('assets/js/userDashboard.js') }}"></script>
@endsection
@endsection
