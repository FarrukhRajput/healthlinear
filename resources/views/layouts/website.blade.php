<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        {{-- {{dd(Route::currentRouteName())}} --}}

        @if (Route::currentRouteName() !== "login"
                && Route::currentRouteName() !== "register"
                && Route::currentRouteName() !== "password.request"
                && Route::currentRouteName() !== "password.reset"
            )
            <x-website-navbar/>
        @endif


        <main>
            @yield('content')
        </main>

    </div>

    {{-- <x-footer /> --}}


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    @yield('script')
</body>
</html>
