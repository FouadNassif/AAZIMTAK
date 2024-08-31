<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Jockey One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
    <title>@yield('title')</title>
    @yield('head')
    @yield('css')
    @vite('resources/css/app.css')
</head>

<body>
    @if (session('status'))
        <div id="notification"
            class="notification bg-white p-5 border-4 border-primary shadow-lg flex items-center justify-between">
            <h1>{{ session('status') }}</h1>
            <button onclick="closeNotification()">X</button>
            <div class="progress-bar"></div>
        </div>
    @endif

    <div class="navbar">
        <a href="/" class="flex items-center"><img src="{{ asset('assets/img/Alogo.png') }}" class="w-10">
            AAZIMTAK</a>
        <div>
            <a href="/">Home</a>
            <a href="/pricing">Pricing & Preview</a>
            @if (auth()->user())
                <a href="{{ route('user.dashboard') }}" class="text-blue-500">Dashboard</a>
                <a href="{{ route('logout') }}" class="text-red-500">Logout</a>
            @else
                <a href="/login" class="text-blue-500">Login</a>
            @endif
        </div>
    </div>

    @yield('content')
    <p class="text-center text-lg font-medium text-gray-600 mt-10 mb-5 flex items-center w-full justify-center">
        Powered by <span class="font-semibold text-blue-600 flex items-center"><img src="{{ asset('assets/img/Alogo.png') }}"
                class="w-10">AAZIMTAK</span>
    </p>
    @yield('script')
</body>

</html>
