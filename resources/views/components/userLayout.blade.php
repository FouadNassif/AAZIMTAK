<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Jockey One' rel='stylesheet'>
    <title>@yield('title')</title>
    @yield('head')
    @yield('css')
    @vite('resources/css/app.css')
</head>

<body class="flex">
    @if (session('status'))
        <div id="notification"
            class="notification bg-white p-5 border-4 border-primary shadow-lg flex items-center justify-between">
            <h1>{{ session('status') }}</h1>
            <button onclick="closeNotification()">X</button>
            <div class="progress-bar"></div>
        </div>
    @endif
    
    <x-userSideBar />
    
    <div id="content" class="content flex-1 transition-all duration-300 p-4">
        @yield('content')
    </div>
    
    @yield('script')
    <script src="{{ asset('assets/js/user.js') }}"></script>
</body>

</html>
