@extends('components.userLayout')
@section('title', 'User - Settings')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6">Account Settings</h2>

        <form action="{{ route('user.account.settings') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-bold mb-2">Username</label>
                <input type="text" name="username" id="name" value="{{ old('username', Auth::user()->username) }}"
                    class="border border-gray-300 p-2 w-full rounded" required>
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="old_password" class="block text-gray-700 font-bold mb-2">Old Password</label>
                <input type="password" name="old_password" id="old_password"
                    class="border border-gray-300 p-2 w-full rounded" required>
                @error('old_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-bold mb-2">New Password</label>
                <input type="password" name="password" id="password" class="border border-gray-300 p-2 w-full rounded">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="border border-gray-300 p-2 w-full rounded">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Update Settings</button>
            </div>
        </form>
    </div>
@endsection
