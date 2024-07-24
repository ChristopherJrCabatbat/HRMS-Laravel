@extends('start.layout')

@section('title', 'Home Page')

@section('styles-links')

@endsection

@section('navbar')
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/recruitment">Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin">Admin</a>
    </li>
@endsection

@section('main-content')
    <main class="mt-5">
        <div class="container-fluid d-flex justify-content-center border-bottom border-primary">
            <img src="{{ asset('images/hrms.jpg') }}" class="img-fluid custom-img-height mx-2" alt="logo" />
            <img src="{{ asset('images/hrms.jpg') }}" class="img-fluid custom-img-height mx-2" alt="logo" />
            <img src="{{ asset('images/hrms.jpg') }}" class="img-fluid custom-img-height mx-2" alt="logo" />
        </div>
        <div class="container d-flex flex-column align-items-center justify-content-center my-5 px-5">
            <h3 class="mb-5">HRMS SOFTWARE</h3>
            <p class="p-padding">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel sit,
                unde exercitationem cumque eveniet est minima, eum laborum eaque
                perferendis sint dignissimos repellendus quae consequatur repudiandae,
                illo quo iste dolorem eius quos impedit vero rem. Animi voluptatem
                porro aspernatur reiciendis? Iste, quidem ipsum magnam cupiditate rem
                nostrum sequi quisquam doloribus explicabo in repellat corporis atque
                sint omnis nemo veritatis eum.
            </p>
        </div>
    </main>
@endsection
