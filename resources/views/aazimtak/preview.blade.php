<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Jockey One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet'>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
    <title>Wedding Invitation</title>
</head>

<body>
    <div class="iphone-container">
        <img src="{{ asset('assets/img/Iphone.png') }}" alt="iPhone" class="iphone-image">
        <div class="screen-content">
            <div class="flex w-full h-full flex-col" id="main-con">
                <div class="my-24"></div>

                <div class="bibble-verse w-full text-center flex flex-col justify-center items-center -mt-24">
                    <img src="{{ asset('assets/svg/quote.svg') }}" class="w-10 image-in-front">
                    <p class="text-black w-9/12 my-1">Therefore what God has joined together, let no one separate.</p>
                    <p>Mark 10:9</p>
                </div>

                <p id="formattedDate"></p>

                <x-countdown />

                <div class="my-52"></div>

                <div class="flex w-full flex-col items-center -mt-32">
                    <h2 class="text-2xl mb-7">Wedding Ceremony</h2>

                    <img src="{{ asset('assets/svg/clock.svg') }}" class="w-12 image-in-front" alt="">
                    <p class="text-sm mb-7">Beirut Time (GMT+3)</p>

                    <img src="{{ asset('assets/svg/location.svg') }}" class="w-10 image-in-front" alt="">
                    <p class="text-sm mb-7">Ehden Lebanon</p>
                    <a href="" class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20">LOCATION MAP</a>
                </div>

                <div class="my-52"></div>

                <div class="flex w-full flex-col items-center -mt-32">
                    <h2 class="text-2xl mb-7">Wedding Party</h2>

                    <img src="{{ asset('assets/svg/clock.svg') }}" class="w-12 image-in-front" alt="">
                    <p class="text-sm mb-7">Beirut Time (GMT+3)</p>

                    <img src="{{ asset('assets/svg/location.svg') }}" class="w-10 image-in-front" alt="">
                    <p class="text-sm mb-7">Ehden Lebanon</p>
                    <a href="" class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20">LOCATION MAP</a>
                </div>

                <div class="my-52"></div>

                <div class="flex w-full flex-col items-center -mt-32 text-center">
                    <h2 class="text-xl mb-7">Gift Registry</h2>

                    <img src="{{ asset('assets/svg/gift.svg') }}" class="w-10 mb-5 image-in-front" alt="">
                    <p class="text-xl w-11/12 mb-5">Your Love, Laughter and Presence are all we could wish for on our
                        special day. For those who wish, a Wedding List is available at</p>
                </div>

                <div class="my-52"></div>

                <div class="flex w-full flex-col items-center -mt-32 text-center">
                    <h2 class="text-xl mb-2">Be Our Guest</h2>
                    <p class="mb-1">Please reply before July 18, 2024</p>
                    <p class="text-xs">Number of Persons: 999</p>
                    <p class="text-xl font-semibold my-4">John Doe</p>

                    <p>Are You Attending?</p>
                    <select name="attending" id="" class="w-7/12 bg-gray-300 text-xl p-2 border-2 mb-5">
                        <option value="">Select</option>
                        <option value="yes">Yes Attending</option>
                        <option value="no">Not Attending</option>
                    </select>

                    <p>Share Your Love And Wishes</p>
                    <textarea class="w-7/12 bg-gray-300 text-xl p-2 border-2 mb-5" name="" id="" cols="30"
                        rows="4" placeholder="Write A Message (Optional)"></textarea>

                    <button class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20 w-7/12">RSVP</button>
                </div>
            </div>
        </div>
    </div>
   
    <style>
        .screen-content {
            position: absolute;
            top: 8.5%;
            left: 30.5%;
            width: 45%;
            height: 83%;
            border-radius: 30px;
            overflow-y: scroll;
            z-index: 1;
            background-color: rgba(0, 255, 255, 0.512);
            color: blue;
            pointer-events: auto;
        }

        .iphone-container {
            position: relative;
            width: 500px;
            margin: 0 auto;
        }

        .iphone-image {
            width: 100%;
            display: block;
            z-index: 2;
            position: relative;
        }

        #main-con {
            padding-bottom: 100px;
        }

        .card-preview h1,
        .card-preview p {
            z-index: 2;
            position: relative;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const screenContent = document.querySelector('.screen-content');

            // Optional: Ensure the scroll position is reset on load
            screenContent.scrollTop = 0;
        });
    </script>
</body>

</html>
