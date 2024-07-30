@extends('content-pages.layout')

@section('title', 'Payroll')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        <a class="nav-link" href="content_dashboard"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
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
        <a class="nav-link side-active" href="payroll"><i class="me-2 fa-solid fa-dollar-sign"></i> Payroll</a>
    </li>
@endsection

@section('main-content')
    <div class="table-responsive text-center p-3">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <h4 class="mb-0"><i class="me-2 fa-solid fa-dollar-sign"></i> Employee's Payroll System</h4>
        </div>
        <table class="table table-bordered bg-white rounded align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Bank</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Action</th>
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
                    <td>{{ $employees->account_number }}</td>
                    <td>{{ $employees->bank }}</td>
                    <td>₱{{ $employees->salary }}</td>
                    <td class="position-relative">
                        <button class="btn btn-primary">Pay</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
