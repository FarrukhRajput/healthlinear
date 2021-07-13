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

        <header class="blog-header py-3 bg-dark">
            <div class="container">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1 d-flex align-items-center">
                        <button class="hamburger hamburger--slider js-hamburger " type="button">
                            <span class="hamburger-box ">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                        <a class="d-md-none d-block" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mx-3">
                                <circle cx="10.5" cy="10.5" r="7.5"></circle>
                                <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                            </svg>
                        </a>
                        <a class="ml-4 text-uppercase text-white d-none d-md-block">Subscribe</a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="{{url('/blog')}}" >
                            <img src="https://www.healthlinear.com/wp-content/uploads/2020/01/cropped-Healthlinear-1.png"
                            height="38" width="155" alt="Health Linear" class="lazyloaded" data-ll-status="loaded">
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <form action="">
                            <div class="icon-input d-none d-md-block">
                                <input type="text" class="form-control" placeholder="Search">
                                <button type="submit" class="icon btn ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="mx-3">
                                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <a class="ml-4 text-uppercase text-white d-block d-md-none">Subscribe</a>
                    </div>
                </div>
            </div>

        </header>

        <main>
            @yield('content')
        </main>

    </div>

    <x-footer />


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    @yield('script')
</body>

</html>
