@extends('components.userLayout')
@section('title', 'User - Wedding')

@section('content')
    <div class="ml-20 mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6">Edit Wedding Details</h2>
        <form action="{{ route('user.wedding.edit') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input name="groom_name" type="text" label="Groom's Name" value="{{ $wedding->groom_name }}"
                    img="{{ asset('assets/svg/groom.svg') }}" />
                <x-input name="groom_lastname" type="text" label="Groom's Last Name"
                    value="{{ $wedding->groom_lastname }}" />
                <x-input name="bride_name" type="text" label="Bride's Name" value="{{ $wedding->bride_name }}"
                    img="{{ asset('assets/svg/bride.svg') }}" />
                <x-input name="bride_lastname" type="text" label="Bride's Last Name"
                    value="{{ $wedding->bride_lastname }}" />
            </div>

            <x-input name="wedding_date" type="date" label="Wedding Date" value="{{ $weddingDetail->wedding_date }}"
                img="{{ asset('assets/svg/date.svg') }}" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input name="ceremony_time" type="time" label="Ceremony Time"
                    value="{{ $weddingDetail->ceremony_time }}" img="{{ asset('assets/svg/clock.svg') }}" />
                <x-input name="ceremony_place" type="text" label="Ceremony Place"
                    value="{{ $weddingDetail->ceremony_place }}" img="{{ asset('assets/svg/location.svg') }}" />
                <x-input name="ceremony_city" type="text" label="Ceremony City"
                    value="{{ $weddingDetail->ceremony_city }}" img="{{ asset('assets/svg/city.svg') }}" />
                <x-input name="ceremony_maps" type="text" label="Ceremony Maps"
                    value="{{ $weddingDetail->ceremony_maps }}" img="{{ asset('assets/svg/maps.svg') }}" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input name="party_time" type="time" label="Party Time" value="{{ $weddingDetail->party_time }}"
                    img="{{ asset('assets/svg/clock.svg') }}" />
                <x-input name="party_place" type="text" label="Party Place" value="{{ $weddingDetail->party_place }}"
                    img="{{ asset('assets/svg/location.svg') }}" />
                <x-input name="party_city" type="text" label="Party City" value="{{ $weddingDetail->party_city }}"
                    img="{{ asset('assets/svg/city.svg') }}" />
                <x-input name="party_maps" type="text" label="Party Maps" value="{{ $weddingDetail->party_maps }}"
                    img="{{ asset('assets/svg/maps.svg') }}" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input name="gift_type" type="text" label="Gift Type" value="{{ $weddingDetail->gift_type }}" />
                <x-input name="gift_details" type="text" label="Gift Details"
                    value="{{ $weddingDetail->gift_details }}" />
            </div>

            <button type="submit"
                class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150">Change</button>
        </form>

        <div>
            <form action="">
                
            </form>
        </div>
    </div>
@endsection
