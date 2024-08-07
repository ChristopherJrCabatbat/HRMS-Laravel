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
        <a class="nav-link" href="/login">Admin</a>
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
                HRMS software, or human resources management system, is a suite of software applications used to manage human resources and related processes throughout the employee lifecycle. It enables a company to fully understand its workforce while staying compliant with changing tax laws and labor regulations. HRMS software helps HR professionals manage the modern workforce by providing features such as recruitment and onboarding, secure data management, training, compliant payroll, attendance, leaves, performance, rewards, offboarding, help desk, analytics and reporting, etc.
            </p>
        </div>
    </main>
@endsection
