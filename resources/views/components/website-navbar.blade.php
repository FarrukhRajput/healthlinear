<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container navbar-box">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-lg-auto">

                <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link text-center" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-center" href="{{route('blog')}}"> Blog </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-center" href="#"> Photos & Graphics </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-center" href="#"> Games </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-center" href="#"> OS & Utilities </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-center" href="#"> Lists </a>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                    <li class="nav-item dropdown text-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{route('dashboard')}}" >
                                {{ __('Dashboard') }}
                            </a>


                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>


                    @endguest


                </ul>

            </ul>
        </div>
    </div>
</nav>
