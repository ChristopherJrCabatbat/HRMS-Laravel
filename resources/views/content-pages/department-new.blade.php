@extends('content-pages.layout')

@section('title', 'Department')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        {{-- <a class="nav-link" href="{{ route('manager.content_dashboard') }}">Dashboard</a> --}}
        <a class="nav-link" href="/manager/content_dashboard"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/employee"><i class="me-2 fa-solid fa-user"></i> Employee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/attendance"><i class="me-2 fa-solid fa-clipboard-user"></i> Attendance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/leave"><i class="me-2 fa-solid fa-arrow-right-from-bracket"></i> Leave</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="departmentDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="me-2 fa-solid fa-folder"></i> Department
        </a>
        <ul class="dropdown-menu" aria-labelledby="departmentDropdown">
            @if ($departments->isEmpty())
                <li>
                    <a class="dropdown-item" href="#">No department available.</a>
                </li>
            @else
                @foreach ($departments as $department)
                    <li>
                        <a class="dropdown-item" 
                        href="{{ url('/manager/department/' . $department->id) }}">{{ $department->department_name }}</a>
                            {{-- href="{{ url('/manager/department/' . $department->id) }}">{{ $department->department_name }}</a> --}}
                    </li>
                @endforeach
            @endif
        </ul>
    </li>
    <li class="nav-item">
        {{-- <a class="nav-link" href="/manager/department-new">New Department</a> --}}
        <a class="nav-link side-active" href="/manager/department/create"><i class="me-2 fa-solid fa-plus"></i> New Department</a>
        {{-- /manager/department/create --}}
    </li>
    <li class="nav-item">
        <hr />
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/recruitment-dashboard"><i class="me-2 fa-solid fa-database"></i> Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/payroll"><i class="me-2 fa-solid fa-dollar-sign"></i> Payroll</a>
    </li>
@endsection

@section('main-content')
    <div class="recruitment-form container border p-4 table-responsive">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <h3 class="me-2"><i class="fas fa-plus"></i> New Department</h3>
        </div>
        <hr />
        {{-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"> --}}
        <form method="POST" action="/manager/department">
            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">Name:</label>
                <input type="text" class="form-control" placeholder="Department name" id="department_name"
                    name="department_name" />
            </div>
            <div class="mb-3">
                <label for="history" class="form-label">History:</label>
                <textarea id="history" rows="4" placeholder="Brief department history" class="form-control" name="history"></textarea>
                <!-- <input type="text" class="form-control" placeholder="Brief department history" id="lastName" /> -->
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Add Department</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownElements = document.querySelectorAll(".dropdown-toggle");

            dropdownElements.forEach(function(dropdown) {
                dropdown.addEventListener("click", function(event) {
                    var dropdownMenu = this.nextElementSibling;
                    var rect = dropdown.getBoundingClientRect();
                    dropdownMenu.style.position = "fixed";
                    dropdownMenu.style.top = rect.bottom - 30 + "px"; // Adjust the top position
                    dropdownMenu.style.left = rect.left - 87 + "px"; // Adjust the left position
                    dropdownMenu.style.width = "200px"; // Adjust as needed
                });
            });
        });
    </script> --}}
@endsection
