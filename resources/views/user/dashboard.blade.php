@extends('components.userLayout')
@section('title', 'User - Dashboard')
@section('content')
    @php
        $totalStatus = ($attendingCount ?? 0) + ($pendingCount ?? 0) + ($notAttendingCount ?? 0);
        $attendingPercentage = $totalStatus > 0 ? (($attendingCount ?? 0) / $totalStatus) * 100 : 0;
        $pendingPercentage = $totalStatus > 0 ? (($pendingCount ?? 0) / $totalStatus) * 100 : 0;
        $notAttendingPercentage = $totalStatus > 0 ? (($notAttendingCount ?? 0) / $totalStatus) * 100 : 0;
    @endphp

    <div class="container mx-auto p-5">
        <h1 class="text-center text-4xl font-bold mb-10">Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
            <div class="p-5 bg-white shadow-md rounded-lg text-center">
                <p class="text-4xl font-bold">{{ $totalGuests }}</p>
                <h4 class="text-lg font-thin mt-2">Total Guests <br> People + Kids</h4>
            </div>
            <div class="p-5 bg-white shadow-md rounded-lg text-center">
                <p class="text-4xl font-bold">{{ $totalGuest }}</p>
                <h4 class="text-lg font-thin mt-2">Total Invites</h4>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="flex h-10 rounded-full overflow-hidden">
                    <div class="flex-shrink-0 h-full bg-green-500" style="width: {{ $attendingPercentage ?? 0 }}%;"></div>
                    <div class="flex-shrink-0 h-full bg-yellow-500" style="width: {{ $pendingPercentage ?? 0 }}%;"></div>
                    <div class="flex-shrink-0 h-full bg-red-500" style="width: {{ $notAttendingPercentage ?? 0 }}%;"></div>
                </div>
                <div class="flex justify-between mt-5">
                    <div class="text-center p-3 bg-white shadow rounded-lg">
                        <p class="text-2xl font-bold">{{ $attendingCount ?? 0 }}</p>
                        <h4 class="text-lg font-thin mt-2">Attending</h4>
                    </div>
                    <div class="text-center p-3 bg-white shadow rounded-lg">
                        <p class="text-2xl font-bold">{{ $pendingCount ?? 0 }}</p>
                        <h4 class="text-lg font-thin mt-2">Pending</h4>
                    </div>
                    <div class="text-center p-3 bg-white shadow rounded-lg">
                        <p class="text-2xl font-bold">{{ $notAttendingCount ?? 0 }}</p>
                        <h4 class="text-lg font-thin mt-2">Not Attending</h4>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="flex h-10 rounded-full overflow-hidden">
                    <div class="flex-shrink-0 h-full bg-blue-500" style="width: {{ $peoplePercentage }}%;"></div>
                    <div class="flex-shrink-0 h-full bg-blue-700" style="width: {{ $kidsPercentage }}%;"></div>
                </div>
                <div class="flex justify-between mt-5">
                    <div class="text-center p-3 bg-white shadow rounded-lg">
                        <p class="text-2xl font-bold">{{ $totalPeople ?? 0 }}</p>
                        <h4 class="text-lg font-thin mt-2">People</h4>
                    </div>
                    <div class="text-center p-3 bg-white shadow rounded-lg">
                        <p class="text-2xl font-bold">{{ $totalKids ?? 0 }}</p>
                        <h4 class="text-lg font-thin mt-2">Kids</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold mb-5">Guest Status Changes</h2>
            <select id="timeframeSelect" class="p-2 mb-5 border border-gray-300 rounded-lg">
                <option value="today">Today</option>
                <option value="last_week">Last Week</option>
                <option value="last_month">Last Month</option>
            </select>
            <div id="statusCount" class="text-center">
                <p class="text-4xl font-bold">0</p>
                <h4 class="text-lg font-thin mt-2">Guests Changed Status</h4>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timeframeSelect = document.getElementById('timeframeSelect');
            const statusCount = document.getElementById('statusCount').querySelector('p');

            timeframeSelect.addEventListener('change', function() {
                const timeframe = this.value;
                const weddingId = parseInt({{ $weddingId[0]->id }});

                fetch(`/api/get-guests?wedding_id=${weddingId}&timeframe=${timeframe}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        statusCount.textContent = data.guest_count;
                    })
                    .catch(error => console.error('Error:', error));
            });

            timeframeSelect.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
