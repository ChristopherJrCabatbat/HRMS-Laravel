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
            <li>
                <a class="dropdown-item" href="/manager/department">BSE</a>
            </li>
            <li>
                <a class="dropdown-item" href="/manager/department">BSN</a>
            </li>
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
        <table class="table table-bordered bg-white rounded">
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
                <tr>
                    <td>
                        <img src="{{ asset('images/employee.png') }}" class="img-fluid rounded-circle" alt="Employee Image"
                            style="width: 40px; height: 40px" />
                    </td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>+1234567890</td>
                    <td>johndoe@gmail.com</td>
                    <td class="position-relative">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manageDropdown1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Manage
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="manageDropdown1">
                                <li>
                                    {{-- <a class="dropdown-item" href="/maanger/employee-view">View</a> --}}
                                    <a class="dropdown-item" href="employee/{id}">View</a>
                                    {{-- employee/{{$employees->id}} --}}
                                </li>
                                <li>
                                    {{-- <a class="dropdown-item" href="employee-edit">Edit</a> --}}
                                    <a class="dropdown-item" href="employee/{id}/edit">Edit</a>
                                    {{-- employee/{{$employees->id}}/edit --}}
                                </li>


                                <li><a class="dropdown-item" href="employee/{id}">Delete</a>
                                    {{-- action="employee/{{$employees->id}}" --}}
                                    {{-- <form action="{{ route('students.destroy', $stud->id) }}"
                                  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="delete" type="submit" name="submit" value="Delete" />
                                </form> --}}
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
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
    </script>
@endsection
