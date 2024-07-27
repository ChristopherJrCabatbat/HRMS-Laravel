@extends('content-pages.layout')

@section('title', 'Attendace')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        {{-- <a class="nav-link" href="{{ route('manager.content_dashboard') }}">Dashboard</a> --}}
        <a class="nav-link" href="/manager/content_dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/employee">Employee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link side-active" href="/manager/attendance">Attendance</a>
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
        <a class="nav-link" href="/manager/department/create">New Department</a>
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
            <h3 class="me-2"><i class="fas fa-plus"></i> Employee Attendance</h3>
        </div>
        <hr />
        <table class="table text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>Date</th>
                    <th>Employees</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">July 23, 2024</td>
                    <form action="">
                        @csrf
                        <td>
                            <select class="form-select" id="employee" name="employee">
                                <option selected disabled>Select Employee</option>
                                @if ($departments->isEmpty())
                                    <option value="No department available" disabled>No employee available.</option>
                                @else
                                    @foreach ($employees as $employees)
                                        <option value="{{ $employees->first_name }} {{ $employees->last_name }}">
                                            {{ $employees->first_name }} {{ $employees->last_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                        <td>
                            <select class="form-select" id="employee" name="employee">
                                <option selected disabled>Select Status</option>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-outline-primary rounded-pill px-4" type="submit">
                Sign in
            </button>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 mt-4">
            <h5 class="me-2"><i class="fas fa-plus"></i> Signed in Employee/s</h5>
        </div>
        <hr />
        <table class="table table-bordered bg-white rounded text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Arrival</th>
                    <th scope="col">Departure</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>July 23, 2024</td>
                    <td class="fw-bold">6:56 p.m.</td>
                    <td class="fw-bold">8:00 p.m.</td>
                    <td>John Doe</td>
                    <td><button class="btn btn-primary btn-sm">Sign-out</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownElements = document.querySelectorAll(".dropdown-toggles");

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
    </script>
@endsection
