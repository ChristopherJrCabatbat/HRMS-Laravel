<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css"
        integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM4dNtbm20I6T9gk5z0WloIO3ipD2WS4hpqc5h0" crossorigin="anonymous"> --}}

    @yield('styles-links')

    <style>
        .rotate {
            transform: rotate(180deg);
        }
    </style>

    <script src="https://kit.fontawesome.com/f416851b63.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


</head>

<body class="body">
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                alert('{{ session('success') }}');
            });
        </script>
    @endif
    {{-- @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif --}}

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand mb-0 h1 fs-2 logo" href="/manager/content_dashboard">HRMS</a>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
                <div class="" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo) : asset('images/employee.png') }}"
                                        alt="User Image" class="rounded-circle" style="width: 30px; height: 30px;">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                                class="me-2 fa-solid fa-user"></i> Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i
                                                    class="me-2 fa-solid fa-arrow-right-from-bracket rotate"></i>
                                                {{ __('Log Out') }}</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>

            </div>
        </nav>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-info">
                <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo) : asset('images/employee.png') }}"
                    alt="User Image" />
                <div class="username">{{ Auth::user()->name }}</div>
                <div class="position">Manager</div>
                {{-- <div class="position">{{ Auth::user()->user_type }}</div> --}}
            </div>

            <ul class="nav flex-column">
                @yield('sidebar')
            </ul>
        </div>
    </header>

    <main class="main-content">
        @yield('main-content')
    </main>

    <footer>
        {{-- <div class="footer bg-primary h-40 d-flex justify-content-center">
            <div class="text-white p-2">
                <i class="fas fa-regular fa-copyright"></i> 2024 HRMS
            </div>
        </div> --}}
    </footer>

    @yield('scripts')

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>

</body>

</html>
