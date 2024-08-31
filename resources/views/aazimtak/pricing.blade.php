@extends('components.mainLayout')
@section('title', 'AAZIMTAK - Pricing')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pricing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
@endsection
@section('content')
    <div class="pricing-container flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-10 pricing-header">Pricing Plans</h1>

        <div class="flex flex-wrap justify-center gap-8">
            <!-- Basic Package -->
            <div
                class="pricing-card bg-white rounded-lg shadow-lg p-8 max-w-xs transition-transform transform hover:scale-105">
                <h2 class="text-2xl font-semibold mb-4 text-center">Basic Package</h2>
                <p class="text-center text-3xl font-bold mb-6 text-gray-800">$90</p>
                <ul class="list-none space-y-4 text-center mb-6 text-gray-700">
                    <li>Invitation Card</li>
                    <li>Music</li>
                    <li>Images</li>
                    <li>Fixed style</li>
                    <li>You add your Guests</li>
                    <li>End-Date (After 7 days of the wedding)</li>
                </ul>
                <a href="{{ route('checkout.show', ['plan' => 'basic']) }}"
                    class="bg-blue-500 text-white py-3 px-4 rounded-full w-full hover:bg-blue-700 text-center block transition-colors">Select</a>
            </div>

            <!-- Premium Package -->
            <div
                class="pricing-card bg-white rounded-lg shadow-lg p-8 max-w-xs transition-transform transform hover:scale-105">
                <h2 class="text-2xl font-semibold mb-4 text-center">Premium Package</h2>
                <p class="text-center text-3xl font-bold mb-6 text-gray-800">$130</p>
                <ul class="list-none space-y-4 text-center mb-6 text-gray-700">
                    <li>Invitation Card</li>
                    <li>Music</li>
                    <li>Images</li>
                    <li>Videos</li>
                    <li>Reservation</li>
                    <li>Choose your layout</li>
                    <li>We add your Guests</li>
                    <li>End-Date (After 30 days of the wedding)</li>
                </ul>
                <a href="{{ route('checkout.show', ['plan' => 'premium']) }}"
                    class="bg-blue-500 text-white py-3 px-4 rounded-full w-full hover:bg-blue-700 text-center block transition-colors">Select</a>
            </div>

            <!-- Deluxe Package -->
            <div
                class="pricing-card bg-white rounded-lg shadow-lg p-8 max-w-xs transition-transform transform hover:scale-105">
                <h2 class="text-2xl font-semibold mb-4 text-center">Deluxe Package</h2>
                <p class="text-center text-3xl font-bold mb-6 text-gray-800">$180</p>
                <ul class="list-none space-y-4 text-center mb-6 text-gray-700">
                    <li>Invitation Card</li>
                    <li>Music</li>
                    <li>Images</li>
                    <li>Videos</li>
                    <li>Reservation</li>
                    <li>Choose your layout</li>
                    <li>We add your Guests</li>
                    <li>End-Date (After 190 days of the wedding)</li>
                </ul>
                <a href="{{ route('checkout.show', ['plan' => 'deluxe']) }}"
                    class="bg-blue-500 text-white py-3 px-4 rounded-full w-full hover:bg-blue-700 text-center block transition-colors">Select</a>
            </div>
        </div>
    </div>

    <!-- Space between plans and info section -->
    <div class="package-info-container mt-20 flex hidden flex-col items-center" id="package-info-section">
        <div class="package-info-content text-center bg-white p-10 rounded-lg shadow-lg max-w-4xl">
            <h2 id="package-info-title" class="text-3xl font-semibold mb-4 text-gray-900"></h2>
            <p id="package-info-description" class="text-lg text-gray-700"></p>
            <div class="w-8/12 mx-auto mt-6">
                <!-- Demo component with dynamic rsvp -->
                <x-demo id="package-demo" rsvp="false" />
                <p class="mt-4 text-sm text-gray-600">Scroll to check the demo</p>
            </div>
        </div>
    </div>

    <div class="mt-20">
        <h2 class="text-3xl font-semibold mb-6 pricing-header">Custom Add-Ons</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <!-- Add-On Cards -->
            @foreach ([['title' => 'Create a new Invitation Card', 'price' => '$70'], ['title' => 'Music', 'price' => '+ $5'], ['title' => 'Images', 'price' => '+ $10'], ['title' => 'Videos', 'price' => '+ $15'], ['title' => 'Reservation', 'price' => '+ $20'], ['title' => 'Each 7 Days Extension', 'price' => '+ $5']] as $addon)
                <div
                    class="bg-white rounded-lg shadow-lg p-6 max-w-xs text-center transition-transform transform hover:scale-105">
                    <h3 class="text-xl font-semibold mb-4 text-gray-900">{{ $addon['title'] }}</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $addon['price'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/pricing.js') }}"></script>
@endsection
