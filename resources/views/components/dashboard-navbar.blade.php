<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
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
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
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


                <li class="nav-item dropdown-hover">
                    <a class="nav-link" href="">Medicines</a>
                    <div class="dropdown-menu dropdown-menu-hover" >
                        <a class="dropdown-item" href="{{route('medicine.index')}}" >
                            {{ __('All Medicines') }}
                        </a>

                        <a class="dropdown-item" href="{{route('medicine.create')}}" >
                            {{ __('Create Medicine') }}
                        </a>

                    </div>
                </li>


                <li class="nav-item dropdown-hover">
                    <a class="nav-link" href="">Posts</a>
                    <div class="dropdown-menu dropdown-menu-hover" >
                        <a class="dropdown-item" href="{{route('post.index')}}" >
                            {{ __('All Posts') }}
                        </a>

                        <a class="dropdown-item" href="{{route('post.create')}}" >
                            {{ __('Create Post') }}
                        </a>

                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('symptom.index')}}">Symptoms</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('salt.index')}}">Salt</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </div>
    </div>
</nav>
