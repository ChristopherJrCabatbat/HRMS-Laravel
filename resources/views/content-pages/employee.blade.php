@extends('content-pages.layout')

@section('title', 'Employee')

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
    <!-- Employees table -->
    <div class="table-responsive text-center p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Employees</h5>
            <form action="employee/create">
                <button class="btn btn-primary" type="submit">
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
                @foreach ($employees as $employees)
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
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manageDropdown1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="manageDropdown1">
                                    <li>
                                        <a class="dropdown-item" href="employee/{{ $employees->id }}">View</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="employee/{{ $employees->id }}/edit">Edit</a>
                                    </li>
                                    
                                    <li>
                                        <form action="employee/{{ $employees->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Delete</button>
                                        </form>
                                        
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
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
    </script>
@endsection
