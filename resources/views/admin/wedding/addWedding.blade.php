@extends('components.adminLayout')
@section('title', 'Admin - Add Wedding')

@section('content')
    <div class="w-full min-h-screen flex items-center justify-center p-8 bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Add a New Wedding</h2>
            <form action="{{ route('admin.addWedding') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <div class="w-full">
                        <label for="groom_name" class="block text-lg font-medium text-gray-700">Groom's First Name</label>
                        @error('groom_name')
                            <span class="text-red-600 text-sm font-semibold">*{{ $message }}</span>
                        @enderror
                        <input type="text" id="groom_name" name="groom_name" value="{{ old('groom_name') }}"
                            class="mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter groom's first name">
                    </div>

                    <div class="w-full">
                        <label for="groom_lastname" class="block text-lg font-medium text-gray-700">Groom's Last Name</label>
                        @error('groom_lastname')
                            <span class="text-red-600 text-sm font-semibold">*{{ $message }}</span>
                        @enderror
                        <input type="text" id="groom_lastname" name="groom_lastname" value="{{ old('groom_lastname') }}"
                            class="mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter groom's last name">
                    </div>

                    <div class="w-full">
                        <label for="bride_name" class="block text-lg font-medium text-gray-700">Bride's First Name</label>
                        @error('bride_name')
                            <span class="text-red-600 text-sm font-semibold">*{{ $message }}</span>
                        @enderror
                        <input type="text" id="bride_name" name="bride_name" value="{{ old('bride_name') }}"
                            class="mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter bride's first name">
                    </div>

                    <div class="w-full">
                        <label for="bride_lastname" class="block text-lg font-medium text-gray-700">Bride's Last Name</label>
                        @error('bride_lastname')
                            <span class="text-red-600 text-sm font-semibold">*{{ $message }}</span>
                        @enderror
                        <input type="text" id="bride_lastname" name="bride_lastname" value="{{ old('bride_lastname') }}"
                            class="mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter bride's last name">
                    </div>

                    <div class="w-full">
                        <label for="username" class="block text-lg font-medium text-gray-700">Username</label>
                        @error('username')
                            <span class="text-red-600 text-sm font-semibold">*{{ $message }}</span>
                        @enderror
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            class="mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter username for the couple">
                    </div>

                    <div class="w-full">
                        <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                        @error('password')
                            <span class="text-red-600 text-sm font-semibold">*{{ $message }}</span>
                        @enderror
                        <input type="password" id="password" name="password"
                            class="mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter a secure password">
                    </div>

                    <div class="w-full">
                        <label for="confirm_password" class="block text-lg font-medium text-gray-700">Confirm Password</label>
                        @error('confirm_password')
                            <span class="text-red-600 text-sm font-semibold">*{{ $message }}</span>
                        @enderror
                        <input type="password" id="confirm_password" name="confirm_password"
                            class="mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Confirm the password">
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition duration-150">
                        Add Wedding
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
