<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To MyShop Ro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{ route('home.index') }}" class="navbar-brand me-5"><h3>MyShop  <span style="font-size:30px; color: #f8b806e5;"> RO</span></h3></a>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li>
                        <div>
                            <form action="{{ route('home.search') }}" method="get" class="d-flex">
                                @csrf
                                <input class="form-control me-3" name="search" style="width: 520px;" type="search" aria-label="Search" placeholder="Search for product you want">
                                    <button class="btn btn-warning me-5 mt-1" style="font-weight: 600;" value="search" type="submit">Search</button>
                            </form>
                        </div>
                    </li>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link ms-5" href="{{ route('login') }}"><h5>{{ __('Login') }}</h5></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link  ms-3" href="{{ route('register') }}"><h5>{{ __('Register') }}</h5></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ms-5">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} {{Auth::user()->lname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    <li class="nav-item mx-4">
                        {{-- <a href="{{ route('authors.index') }}" class="nav-link">Library Management</a> --}}
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    <footer style="text-align:center; background:#f8b806e5; color:black; margin-top:30px; height:69px;">
        <p style="padding-top: 15px; font-size: 22px;">جميع الحقوق محفوظة &copy; 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>