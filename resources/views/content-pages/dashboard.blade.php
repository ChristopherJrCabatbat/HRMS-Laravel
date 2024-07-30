@extends('content-pages.layout')

@section('title', 'Dashboard')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        <a class="nav-link side-active" href="content_dashboard"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="employee"><i class="me-2 fa-solid fa-user"></i> Employee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="attendance"><i class="me-2 fa-solid fa-clipboard-user"></i> Attendance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="leave"><i class="me-2 fa-solid fa-arrow-right-from-bracket"></i> Leave</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="departmentDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
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
                    </li>
                @endforeach
            @endif
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/department/create"><i class="me-2 fa-solid fa-plus"></i> New Department</a>
    </li>
    <li class="nav-item">
        <hr />
    </li>
    <li class="nav-item">
        <a class="nav-link" href="recruitment-dashboard"><i class="me-2 fa-solid fa-database"></i> Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="payroll"><i class="me-2 fa-solid fa-dollar-sign"></i> Payroll</a>
    </li>
@endsection

@section('main-content')
<div class="row row-cols-1 row-cols-md-3 g-2">
    <div class="col">
        <div class="card h-100 card-min-width">
            <div class="card-body d-flex align-items-center px-4 py-2">
                <i class="fa-solid fa-clipboard-list card-img-icon me-3" style="font-size: 2rem"></i>
                {{-- <img src="{{ asset('images/employee.png') }}" class="card-img-icon me-3" alt="Icon" /> --}}
                <div class="flex-grow-1">
                    <p class="card-text mb-0 text-end fs-5">Managers</p>
                    <h5 class="card-title text-end fs-2">{{ $managersCount }}</h5>
                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted">Managers</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 card-min-width">
            <div class="card-body d-flex align-items-center px-4 py-2">
                <i class="fa-solid fa-folder card-img-icon me-3" style="font-size: 2rem"></i>
                <div class="flex-grow-1">
                    <p class="card-text mb-0 text-end fs-5">Departments</p>
                    <h5 class="card-title text-end fs-2">{{ $departmentsCount }}</h5>
                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted">Available Departments</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 card-min-width">
            <div class="card-body d-flex align-items-center px-4 py-2">
                <i class="fa-solid fa-users card-img-icon me-3" style="font-size: 2rem"></i>
                {{-- <img src="{{ asset('images/employee.png') }}" class="card-img-icon me-3" alt="Icon" /> --}}
                <div class="flex-grow-1">
                    <p class="card-text mb-0 text-end fs-5">Employees</p>
                    <h5 class="card-title text-end fs-2">{{ $employeesCount }}</h5>
                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted">Employee's Total Count</small>
            </div>
        </div>
    </div>
</div>


    <!-- Employees table -->
    <div class="table-responsive mt-4 text-center p-3">
        <h5 class="mb-3"><i class="fa-solid fa-users me-2"></i> Employees</h5>
        <table class="table table-bordered bg-white rounded align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employees)
                    <tr>
                        <td>
                            <img src="{{ $employees->photo ? asset($employees->photo) : asset('images/employee.png') }}"
                                class="img-fluid rounded-circle" alt="Employee Image" style="width: 40px; height: 100%" />

                        </td>
                        <td>{{ $employees->first_name }}</td>
                        <td>{{ $employees->last_name }}</td>
                        <td>{{ $employees->mobile_number }}</td>
                        <td class="position-relative">
                            <a class="btn btn-primary" href="employee/{{ $employees->id }}"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
