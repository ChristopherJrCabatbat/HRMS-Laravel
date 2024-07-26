@extends('content-pages.layout')

@section('title', 'Add Employee')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        {{-- <a class="nav-link" href="{{ route('manager.content_dashboard') }}">Dashboard</a> --}}
        <a class="nav-link" href="/manager/content_dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link side-active" href="/manager/employee">Employee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/attendance">Attendance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/leave">Leave</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="departmentDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Department
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
                    </li>
                @endforeach
            @endif
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="department/create">New Department</a>
    </li>
    <li class="nav-item">
        <hr />
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/recruitment-dashboard">Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/payroll">Payroll</a>
    </li>
@endsection

@section('main-content')
    <div class="recruitment-form container border p-4 table-responsive">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <h3 class="me-2"><i class="fas fa-plus"></i> New Employee</h3>
        </div>
        <hr />
        <form action="manager/employee">
            <div class="mb-3">
                <label for="firstName" class="form-label">First name:</label>
                <input type="text" class="form-control" id="firstName" placeholder="e.g. John" />
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last name:</label>
                <input type="text" class="form-control" id="lastName" placeholder="e.g. Doe"/>
            </div>
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile number:</label>
                <input type="text" class="form-control" id="mobileNumber" placeholder="e.g. 09876543210"/>
            </div>
            <div class="mb-3">
                <label for="emailAddress" class="form-label">Email address:</label>
                <input type="email" class="form-control" id="emailAddress" placeholder="e.g. my@email.com"/>
                <div id="emailHelp" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary:</label>
                <input type="text" class="form-control" id="salary" placeholder="e.g. 10000"/>
            </div>
            {{-- <div class="mb-3">
                <label for="bank" class="form-label">Bank:</label>
                <input type="text" class="form-control" id="bank" />
            </div> --}}
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select class="form-select" id="gender">
                    <option selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department:</label>
                <select class="form-select" id="department">
                    <option selected>Select Department</option>
                    <option value="hr">HR</option>
                    <option value="engineering">Engineering</option>
                    <option value="sales">Sales</option>
                    <option value="marketing">Marketing</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="userImage" class="form-label">Photo:</label>
                <input type="file" class="form-control" id="userImage" accept="image/*" />
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Add Employee</button>
            </div>
        </form>
    </div>
@endsection
