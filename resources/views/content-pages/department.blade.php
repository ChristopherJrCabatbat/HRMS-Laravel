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
        <a class="nav-link dropdown-toggle side-active" href="#" id="departmentDropdown" role="button"
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
        <a class="nav-link" href="/manager/department/create"><i class="me-2 fa-solid fa-plus"></i> New Department</a>
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
    <div class="table-responsive text-center p-3">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @else
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">{{ $departmentss->department_name }}</h3>
                <form action="employee-add.html">
                    <button class="btn btn-primary rounded-pill px-4" type="submit">
                        <i class="fas fa-pen-to-square"></i> Edit Info
                    </button>
                </form>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="me-5" style="max-width: 29vw">
                    <div class="d-flex flex-column justify-content-start align-items-start border-start px-4 py-5">
                        <div class="fs-3 mb-3 text-start">Brief History</div>
                        <div class="text-start">{{ $departmentss->history }}</div>
                    </div>
                </div>
                <div class="border-end px-4 py-5">
                    <div class="fs-3 mb-3">Associated Employees</div>
                    <hr />
                    <div class="container text-center">
                        <div class="row row-cols-2">
                            @forelse ($employees as $employee)
                                <div class="col d-flex justify-content-center">
                                    <div class="card border-0" style="width: 9rem">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                            <img src="{{ $employee->photo ? asset($employee->photo) : asset('images/employee.png') }}"
                                                class="img-fluid rounded-circle text-center border-primary border border-primary" alt="Employee Image"
                                                style="width: 70px; height: 70px; margin-right: 0; object-fit: cover" />
                                            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}
                                            </h5>
                                            <p class="card-text">({{ $employee->id }})</p>
                                            <a href="/manager/employee/{{ $employee->id }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View
                                                profile</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center w-100">
                                    <p>No employees associated with this department.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection

@section('scripts')
@endsection
