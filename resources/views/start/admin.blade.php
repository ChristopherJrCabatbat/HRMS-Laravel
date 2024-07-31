@extends('start.layout')

@section('title', 'Admin Page')

@section('styles-links')

@endsection

@section('navbar')
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/recruitment">Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/login">Admin</a>
    </li>
@endsection

@section('main-content')
    <main class="mt-5 w-50 container">
        <div class="container d-flex flex-column justify-content-center align-items-center border-bottom text-center">
            <img src="images/hrms.jpg" class="img-fluid recruitment-logo mt-5 mb-2 rounded-circle" alt="logo" />
            <p class="text-center fs-3">Log in</p>
        </div>
        <div class="recruitment-form container border p-5 rounded-3 mt-3">
            {{-- <form action="/manager/content_dashboard"> --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3 form-floating">
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                        autofocus required autocomplete="username" placeholder="" />
                    <label for="exampleInputEmail1" class="form-label">Email:</label>
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>

                @if ($errors->has('email'))
                    <div class="mb-3 form-control alert alert-danger p-2"><i class="fa-solid fa-triangle-exclamation me-1"></i> {{ $errors->first('email') }}</div>
                @endif

                {{-- Password --}}
                <div class="mb-3 form-floating">
                    <input type="password" id="password" name="password" class="form-control"
                        aria-describedby="passwordHelpBlock" required autocomplete="current-password" placeholder="" />
                    <label for="inputPassword5" class="form-label">Password:</label>
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and
                        numbers, and must not contain spaces, special characters, or
                        emoji.
                    </div>
                </div>
                @if ($errors->has('password'))
                    <div class="mb-3 form-control alert alert-danger p-2"><i class="fa-solid fa-triangle-exclamation me-1"></i> {{ $errors->first('password') }}</div>
                @endif

                <div class="d-grid my-3">
                    <button class="btn btn-primary" type="submit">Log in</button>
                </div>
                <div class="container d-flex justify-content-center align-items-center mb-0">
                    <p class="mb-0">Don't have an account yet? <a href="/register">Sign up</a></p>
                </div>
            </form>
        </div>
    </main>
@endsection
