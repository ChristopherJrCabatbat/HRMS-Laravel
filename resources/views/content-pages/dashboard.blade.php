@extends('content-pages.layout')

@section('title', 'Dashboard')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        <a class="nav-link side-active" href="content_dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="employee">Employee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="attendance">Attendance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="leave">Leave</a>
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
        <a class="nav-link" href="recruitment-dashboard">Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="payroll">Payroll</a>
    </li>
@endsection

@section('main-content')
    <div class="row row-cols-1 row-cols-md-3 g-2">
        <div class="col">
            <div class="card h-100 card-min-width">
                <div class="card-body d-flex align-items-center px-4 py-2">
                    <img src="{{ asset('images/employee.png') }}" class="card-img-icon me-3" alt="Icon" />
                    <div class="flex-grow-1">
                        <p class="card-text mb-0 text-end fs-5">Managers</p>
                        <h5 class="card-title text-end fs-2">3</h5>
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
                    <img src="{{ asset('images/employee.png') }}" class="card-img-icon me-3" alt="Icon" />
                    <div class="flex-grow-1">
                        <p class="card-text mb-0 text-end fs-5">Departments</p>
                        <h5 class="card-title text-end fs-2">5</h5>
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
                    <img src="{{ asset('images/employee.png') }}" class="card-img-icon me-3" alt="Icon" />
                    <div class="flex-grow-1">
                        <p class="card-text mb-0 text-end fs-5">Employees</p>
                        <h5 class="card-title text-end fs-2">5</h5>
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
        <h5 class="mb-3">Employees</h5>
        <table class="table table-bordered bg-white rounded">
            <thead class="table-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('images/employee.png') }}" class="img-fluid rounded-circle" alt="Employee Image"
                            style="width: 40px; height: 40px" />
                    </td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>+1234567890</td>
                    <td><button class="btn btn-primary btn-sm">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
