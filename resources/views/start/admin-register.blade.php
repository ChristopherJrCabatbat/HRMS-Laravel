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
        <a class="nav-link active" href="/admin">Admin</a>
    </li>
@endsection

@section('main-content')
    <main class="mt-5 w-50 container">
        <div class="container d-flex flex-column justify-content-center align-items-center border-bottom text-center">
            <img src="images/hrms.jpg" class="img-fluid recruitment-logo mt-5 mb-2 rounded-circle" alt="logo" />
            <p class="text-center fs-3">Sign up</p>
        </div>
        <div class="recruitment-form container border p-5 rounded-3 mt-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-3 form-floating">
                    <input required type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                        placeholder="" />
                    <label for="exampleInputEmail1" class="form-label">Name:</label>
                </div>

                {{-- Email --}}
                <div class="mb-3 form-floating">
                    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="" />
                    <label for="exampleInputEmail1" class="form-label">Email:</label>
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-3 form-floating">
                    <input required type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock"
                        placeholder="" />
                    <label for="inputPassword5" class="form-label">Password:</label>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3 form-floating">
                    <input required type="password" id="password_confirmation" name="password_confirmation" class="form-control" aria-describedby="passwordHelpBlock"
                        placeholder="" />
                    <label for="inputPassword5" class="form-label">Confirm Password:</label>
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and
                        numbers, and must not contain spaces, special characters, or
                        emoji.
                    </div>
                </div>

                {{-- Picture --}}
                <div class="mb-3">
                    <label for="userImage" class="form-label">Upload Picture:</label>
                    <input type="file" class="form-control" id="userImage" name="photo" accept="image/*" />
                </div>

                <div class="d-grid my-3">
                    <button class="btn btn-primary" type="submit">Sign up</button>
                </div>
                <div class="container d-flex justify-content-center align-items-center mb-0">
                    <p class="mb-0">
                        Already have an account? <a href="/login">Log in</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
@endsection
