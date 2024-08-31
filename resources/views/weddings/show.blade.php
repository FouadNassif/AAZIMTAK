@extends('components.weddingCardLayout')
@section('title', "{$wedding->bride_name} & {$wedding->groom_name} ")

@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('assets/img/img1.jpg') }}");
        }
    </style>
@endsection

@section('content')
    <div class="all">
        <div class="invitation-card-start " id="inv-card-start">
            <h1>{{ $wedding->groom_name }} & {{ $wedding->bride_name }}</h1>
            <p>{{ $weddingDetail->wedding_date }}</p>

            <button onclick="start()">TAP TO START</button>
        </div>

        <div class="flex w-full h-full flex-col hidden" id="main-con">
            <x-imagesLayout.5images image1="{{ asset('assets/img/img1.jpg') }}"
                image2="{{ asset('assets/img/Welcome.jpg') }}" image3="{{ asset('assets/img/support.jpg') }}"
                image4="{{ asset('assets/img/Welcome2.jpg') }}" image5="{{ asset('assets/img/Welcome3.jpg') }}" />

            <div class="my-32">
                <div class="bibble-verse w-full text-center flex flex-col justify-center items-center">
                    <img src="{{ asset('assets/svg/quote.svg') }}" class="w-10">
                    <p class="text-black w-9/12 my-1">Therefore what God has joined together, let no one separate.</p>
                    <p>Mark 10:9</p>
                </div>

                <p id="formattedDate" class="text-center my-5 text-xl"></p>
                <x-countdown />
            </div>

            <x-imagesLayout.5images image4="{{ asset('assets/img/img1.jpg') }}"
                image5="{{ asset('assets/img/Welcome.jpg') }}" image3="{{ asset('assets/img/support.jpg') }}"
                image2="{{ asset('assets/img/Welcome2.jpg') }}" image1="{{ asset('assets/img/Welcome3.jpg') }}" />


            <div class="flex w-full flex-col items-center my-32">
                <h2 class="text-2xl mb-7">Wedding Ceremony</h2>

                <img src="{{ asset('assets/svg/clock.svg') }}" class="w-12" alt="">
                <p class="text-xl font-bold">{{ $weddingDetail->ceremony_time }}</p>
                <p class="text-sm mb-7">Beirut Time (GMT+3)</p>

                <img src="{{ asset('assets/svg/location.svg') }}" class="w-10" alt="">
                <p class="text-xl font-bold">{{ $weddingDetail->ceremony_place }}</p>
                <p class="text-sm mb-7">{{ $weddingDetail->ceremony_city }}</p>
                <a href="{{ $weddingDetail->ceremony_maps }}"
                    class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20">LOCATION
                    MAP</a>
            </div>

            <x-imagesLayout.2images image1="{{ asset('assets/img/Welcome.jpg') }}"
                image2="{{ asset('assets/img/Welcome3.jpg') }}" />

            <div class="flex w-full flex-col items-center my-32">
                <h2 class="text-2xl mb-7">Wedding Party</h2>

                <img src="{{ asset('assets/svg/clock.svg') }}" class="w-12" alt="">
                <p class="text-xl font-bold">{{ $weddingDetail->party_time }}</p>
                <p class="text-sm mb-7">Beirut Time (GMT+3)</p>

                <img src="{{ asset('assets/svg/location.svg') }}" class="w-10" alt="">
                <p class="text-xl font-bold">{{ $weddingDetail->party_place }}</p>
                <p class="text-sm mb-7">{{ $weddingDetail->party_city }}</p>
                <a href="{{ $weddingDetail->party_maps }}"
                    class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20">LOCATION
                    MAP</a>
            </div>

            <x-imagesLayout.3images image1="{{ asset('assets/img/img1.jpg') }}"
                image2="{{ asset('assets/img/img1.jpg') }}" image3="{{ asset('assets/img/img1.jpg') }}" />

            <div class="flex w-full flex-col items-center my-32 text-center">
                <h2 class="text-xl mb-7">Gift Registery</h2>

                <img src="{{ asset('assets/svg/gift.svg') }}" class="w-10 mb-5" alt="">
                <p class="text-xl w-11/12  mb-5">Your Love, Laughter and Presence are all we could wish for on our special
                    day.
                    For
                    those who
                    wish, a Wedding List is available at</p>
                <p class="text-xl font-bold">{{ $weddingDetail->gift_type }}</p>
                <p class="text-sm mb-7 w-8/12">{{ $weddingDetail->gift_details }}</p>

            </div>

            <x-imagesLayout.4images image1="{{ asset('assets/img/img1.jpg') }}"
                image2="{{ asset('assets/img/img1.jpg') }}" image3="{{ asset('assets/img/img1.jpg') }}"
                image4="{{ asset('assets/img/img1.jpg') }}" />

            <form action="" method="POST">
                <div class="flex w-full flex-col items-center mt-32 mb-20 text-center">
                    <h2 class="text-xl mb-2">Be Our Guest</h2>
                    <p class="mb-1">Please reply before July 18, 2024</p>
                    <div>
                        <p class="text-base"> Number of Persons: {{ $guest->number_of_people }}</p>
                        <p class="text-base"> Number of Kids: {{ $guest->number_of_kids }}</p>
                    </div>
                    <p class="text-xl font-semibold my-4">{{ $guest->name }}</p>

                    <p>Are You Attending?</p>
                    <select name="attending" id="" class="w-7/12 bg-gray-300 text-xl p-2 border-2 mb-5">
                        <option value="">Select</option>
                        <option value="yes">Yes Attending</option>
                        <option value="no">Not Attending</option>
                    </select>

                    <p>Share Your Love And Wishes</p>
                    <textarea class="w-7/12 bg-gray-300 text-xl p-2 border-2 mb-5" name="" id="" cols="30"
                        rows="4" placeholder="Write A Message (Optimal)"></textarea>

                    <button class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20 w-7/12">RSVP</button>
                </div>
            </form>
            <x-imagesLayout.5images image1="{{ asset('assets/img/img1.jpg') }}"
                image2="{{ asset('assets/img/Welcome.jpg') }}" image3="{{ asset('assets/img/support.jpg') }}"
                image4="{{ asset('assets/img/Welcome2.jpg') }}" image5="{{ asset('assets/img/Welcome3.jpg') }}" />
            <!-- Add this at the end of your content section -->
            {{-- <div class="popup-container" id="popup">
                <div class="popup-overlay"></div>
                <img src="{{ asset('assets/img/popup-image.jpg') }}" alt="Popup Image" class="popup-image">
            </div> --}}


            <p class="text-center text-lg font-medium text-gray-600 mt-10 mb-5 flex items-center w-full justify-center">
                Powered by <span class="font-semibold text-blue-600 flex items-center"><img
                        src="{{ asset('assets/img/Alogo.png') }}" class="w-10">AAZIMTAK</span>
            </p>
            <script>
                window.weddingDate = @json($weddingDetail->wedding_date);
                window.ceremonyTime = @json($weddingDetail->ceremony_time);
            </script>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/wedding.js') }}"></script>
@endsection
