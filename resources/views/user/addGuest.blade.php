@extends('components.userLayout')
@section('title', 'User - Add Guest')

@section('content')
    <div class="w-full flex justify-center items-center min-h-screen bg-gray-100">
        <form action="{{ route('user.dashboard.addGuest') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            @csrf
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add a New Guest</h2>
            <div class="mb-4">
                <label for="name" class="block text-gray-600 mb-2">Guest Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="num_of_people" class="block text-gray-600 mb-2">Number of People</label>
                <input type="number" name="num_of_people" id="num_of_people"
                    class="w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="num_of_kids" class="block text-gray-600 mb-2">Number of Kids</label>
                <input type="number" name="num_of_kids" id="num_of_kids"
                    class="w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition duration-300">Add
                Guest</button>
        </form>
    </div>
@endsection
