@props(['rsvp' => 'true'])
<div class="mobile-container">
    <div class="flex w-full flex-col" id="main-con">
        <x-imagesLayout.5images image1="{{ asset('assets/img/img1.jpg') }}" image2="{{ asset('assets/img/Welcome.jpg') }}"
            image3="{{ asset('assets/img/support.jpg') }}" image4="{{ asset('assets/img/Welcome2.jpg') }}"
            image5="{{ asset('assets/img/Welcome3.jpg') }}" />

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
            <p class="text-xl font-bold">16:00:00</p>
            <p class="text-sm mb-7">Beirut Time (GMT+3)</p>

            <img src="{{ asset('assets/svg/location.svg') }}" class="w-10" alt="">
            <p class="text-xl font-bold">Church Saint Charbel</p>
            <p class="text-sm mb-7">Ehden - Zgharta</p>
            <a href="" class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20">LOCATION
                MAP</a>
        </div>

        <x-imagesLayout.2images image1="{{ asset('assets/img/Welcome.jpg') }}"
            image2="{{ asset('assets/img/Welcome3.jpg') }}" />

        <div class="flex w-full flex-col items-center my-32">
            <h2 class="text-2xl mb-7">Wedding Party</h2>

            <img src="{{ asset('assets/svg/clock.svg') }}" class="w-12" alt="">
            <p class="text-xl font-bold">18:00:00</p>
            <p class="text-sm mb-7">Beirut Time (GMT+3)</p>

            <img src="{{ asset('assets/svg/location.svg') }}" class="w-10" alt="">
            <p class="text-xl font-bold">Splendor</p>
            <p class="text-sm mb-7">Sereel - Zgharta</p>
            <a href="" class="cursor-pointer border-2 px-6 py-2 border-gray-600 mb-20">LOCATION
                MAP</a>
        </div>

        <x-imagesLayout.3images image1="{{ asset('assets/img/img1.jpg') }}"
            image2="{{ asset('assets/img/img1.jpg') }}" image3="{{ asset('assets/img/img1.jpg') }}" />

        <div class="flex w-full flex-col items-center my-32 text-center">
            <h2 class="text-xl mb-7">Gift Registery</h2>

            <img src="{{ asset('assets/svg/gift.svg') }}" class="w-10 mb-5" alt="">
            <p class="text-xl w-11/12  mb-5">Your Love, Laughter and Presence are all we could wish for on our
                special
                day.
                For
                those who
                wish, a Wedding List is available at</p>
            <p class="text-xl font-bold">Bank Libanais</p>
            <p class="text-sm mb-7 w-8/12">AUC-043-24-fo-22252</p>

        </div>

        <x-imagesLayout.4images image1="{{ asset('assets/img/img1.jpg') }}"
            image2="{{ asset('assets/img/img1.jpg') }}" image3="{{ asset('assets/img/img1.jpg') }}"
            image4="{{ asset('assets/img/img1.jpg') }}" />
        @if ($rsvp == 'true')
            <div class="flex w-full flex-col items-center mt-32 mb-20 text-center">
                <h2 class="text-xl mb-2">Be Our Guest</h2>
                <p class="mb-1">Please reply before July 18, 2024</p>
                <div>
                    <p class="text-base"> Number of Persons: 5</p>
                    <p class="text-base"> Number of Kids: 1</p>
                </div>
                <p class="text-xl font-semibold my-4">John Doe</p>

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
            <x-imagesLayout.5images image1="{{ asset('assets/img/img1.jpg') }}"
                image2="{{ asset('assets/img/Welcome.jpg') }}" image3="{{ asset('assets/img/support.jpg') }}"
                image4="{{ asset('assets/img/Welcome2.jpg') }}" image5="{{ asset('assets/img/Welcome3.jpg') }}" />
        @endif
        <p class="text-center text-lg font-medium text-gray-600 mt-10 mb-5 flex items-center w-full justify-center">
            Powered by <span class="font-semibold text-blue-600 flex items-center"><img
                    src="{{ asset('assets/img/Alogo.png') }}" class="w-10">AAZIMTAK</span>
        </p>
        <script>
            window.weddingDate = "2024-12-25";
            window.ceremonyTime = "16:00:00";
        </script>
    </div>
</div>
