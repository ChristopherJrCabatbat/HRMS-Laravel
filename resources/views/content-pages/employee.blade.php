@extends('content-pages.layout')

@section('title', 'Employee')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        <a class="nav-link" href="content_dashboard"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link side-active" href="employee"><i class="me-2 fa-solid fa-user"></i> Employee</a>
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
    <!-- Employees table -->
    <div class="table-responsive text-center p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0"><i class="fa-solid fa-users me-2"></i> Employees</h5>
            <form action="employee/create">
                <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i>
                    Add Employee
                </button>
            </form>
        </div>
        <table class="table table-bordered bg-white rounded align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employees)
                    <tr>
                        <td>
                            <img src="{{ $employees->photo ? asset($employees->photo) : asset('images/employee.png') }}"
                                class="img-fluid rounded-circle" alt="Employee Image" style="width: 40px; height: 100%" />
                        </td>
                        <td>{{ $employees->first_name }}</td>
                        <td>{{ $employees->last_name }}</td>
                        <td>{{ $employees->mobile_number }}</td>
                        <td>{{ $employees->email }}</td>
                        <td class="position-relative">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle manageDropdown1" type="button"
                                    id="manageDropdown1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-gear"></i>
                                    Manage
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end manageDropdown1" aria-labelledby="manageDropdown1" style="max-height: 16vh">
                                    <li>
                                        <a class="dropdown-item" href="employee/{{ $employees->id }}"><i class="fas fa-eye" style="color: green"></i> View</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="employee/{{ $employees->id }}/edit"><i class="fas fa-pen-to-square" style="color: blue"></i> Edit</a>
                                    </li>

                                    <li>
                                        <form action="employee/{{ $employees->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="fa-solid fa-trash" style="color: red"></i> Delete</button>
                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">There are no employees.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownElement = document.getElementById("manageDropdown1");

            dropdownElement.addEventListener("click", function(event) {
                var dropdownMenu = this.nextElementSibling;
                var rect = dropdownElement.getBoundingClientRect();
                dropdownMenu.style.position = "fixed";
                dropdownMenu.style.top = rect.bottom - 30 + "px"; // Adjust the top position
                dropdownMenu.style.left = rect.left - 87 + "px"; // Adjust the left position
                dropdownMenu.style.width = "200px"; // Adjust as needed
            });
        });
    </script> --}}

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownElements = document.querySelectorAll(".manageDropdown1");

            dropdownElements.forEach(function(dropdown) {
                dropdown.addEventListener("click", function(event) {
                    var dropdownMenu = this.nextElementSibling;
                    var rect = dropdown.getBoundingClientRect();
                    dropdownMenu.style.position = "fixed";
                    dropdownMenu.style.bottom = rect.bottom - 270 + "px"; // Adjust the top position
                    dropdownMenu.style.left = rect.left - 87 + "px"; // Adjust the left position
                    dropdownMenu.style.width = "200px"; // Adjust as needed
                });
            });
        });
    </script> --}}
@endsection
