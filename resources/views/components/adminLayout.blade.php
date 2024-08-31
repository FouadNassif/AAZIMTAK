<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('head')
    @vite('resources/css/app.css')
</head>

<body>
    @if (session('status'))
        <div id="notifications" class="fixed top-5 right-5 z-50 space-y-3 w-full max-w-xs">
            <div id="notification"
                class="notification bg-white p-5 border-4 border-primary shadow-lg flex items-center justify-between rounded-lg animate-slide-in">
                <h1 class="text-gray-800 font-semibold">{{ session('status') }}</h1>
                <button onclick="closeNotification(this)" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="progress-bar bg-primary h-1 w-full absolute bottom-0 left-0"></div>
            </div>
        </div>
    @endif

    <x-admin.adminSideBar />
    @yield('content')
    @yield('script')
</body>

</html>
