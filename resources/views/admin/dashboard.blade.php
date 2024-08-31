@extends('components.adminLayout')
@section('title', 'Admin - Dashboard')

@section('content')
<div class="w-full p-6 space-y-6">
    <!-- Title -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <p class="text-gray-600 mt-2">Overview of recent activities and metrics.</p>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-blue-100 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Total Weddings</h2>
            <p class="text-4xl">{{ $totalWeddings }}</p>
        </div>

        <div class="bg-red-100 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Newly Added Weddings</h2>
            <p class="text-4xl">{{ $recentlyAddedWeddings }}</p>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Recent Activity</h2>
        <ul class="space-y-2">
            @foreach($recentActivities as $activity)
                <li class="text-gray-700 p-4 border-b">
                    <span class="text-gray-500">{{ $activity['date'] }}</span> 
                    <p class="text-lg">{{ $activity['description'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <button class="bg-blue-600 text-white p-4 rounded-lg shadow-md">Add New Wedding</button>
        <button class="bg-green-600 text-white p-4 rounded-lg shadow-md">Manage Weddings</button>
        <button class="bg-yellow-600 text-white p-4 rounded-lg shadow-md">View Guest Lists</button>
    </div>
</div>
@endsection
