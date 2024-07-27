@extends('start.layout')

@section('title', 'Recruitment Page')

@section('styles-links')

@endsection

@section('navbar')
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/recruitment">Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/login">Admin</a>
    </li>
@endsection

@section('main-content')
<main class="mt-5 container">
    <div
      class="container d-flex flex-column justify-content-center align-items-center border-bottom text-center"
    >
      <img
        src="images/hrms.jpg"
        class="img-fluid recruitment-logo mt-5 mb-2 rounded-circle"
        alt="logo"
      />
      <p class="text-center fs-3">Candidate Application Form</p>
    </div>
    <div class="recruitment-form container border p-5 rounded-3 mt-3">
      <form method="POST" action="{{ route('storeRecruitment') }}">
        @csrf
        <div class="mb-3 form-floating">
          <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder=""
            name="first_name"
          />
          <label for="exampleInputEmail1" class="form-label"
            >First name:</label
          >
        </div>
        <div class="mb-3  form-floating">
          <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder=""
            name="last_name"
          />
          <label for="exampleInputEmail1" class="form-label"
            >Last name:</label
          >
        </div>
        <div class="mb-3  form-floating">
          <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder=""
            name="position"
          />
          <label for="exampleInputEmail1" class="form-label">Position:</label>
        </div>
        <div class="mb-3  form-floating">
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder=""
            name="email"
          />
          <label for="exampleInputEmail1" class="form-label">Email:</label>
          <div id="emailHelp" class="form-text">
            We'll never share your email with anyone else.
          </div>
        </div>
        <div class="mb-3  form-floating">
          <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder=""
            name="mobile_number"
          />
          <label for="exampleInputEmail1" class="form-label">Mobile Number:</label>
        </div>

        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <div class="d-grid">
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </main>
@endsection
