@extends('content-pages.layout')

@section('title', 'Attendance')

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
        <a class="nav-link side-active" href="attendance"><i class="me-2 fa-solid fa-clipboard-user"></i> Attendance</a>
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
    <div class="recruitment-form container border p-4 table-responsive">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <h3 class="me-2"><i class="me-2 fa-solid fa-clipboard-user"></i> Employee Attendance</h3>
        </div>
        <hr />
        <form method="POST" action="/manager/attendance">
            @csrf
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
                        <td class="align-middle">{{ \Carbon\Carbon::now()->format('F j, Y') }}</td>
                        <td>
                            <select class="form-select" id="name" name="name" required>
                                <option selected disabled>Select Employee</option>
                                @if ($employees->isEmpty())
                                    <option value="No employee available." disabled>No employee available.</option>
                                @else
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->first_name }} {{ $employee->last_name }}">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                        <td>
                            <select class="form-select" id="status" name="status" required>
                                <option selected disabled>Select Status</option>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-outline-primary rounded-pill px-4" type="submit">
                    Sign in <i class="fa-solid fa-right-to-bracket"></i>
                </button>
            </div>
        </form>

        <div class="d-flex justify-content-center align-items-center mb-3 mt-4">
            <h5 class="me-2"><i class="me-2 fa-solid fa-clipboard-user"></i> Signed in Employee/s</h5>
        </div>
        <hr />
        <p>Only present employees are displayed here.</p>
        <table class="table table-bordered bg-white rounded text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Departure Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->formatted_date }}</td>
                        <td>{{ $attendance->name }}</td>
                        <td class="fw-bold">{{ $attendance->formatted_arrival }}</td>
                        <td class="fw-bold">
                            {{ $attendance->formatted_departure }}
                        </td>
                        <td>
                            <form action="{{ route('manager.attendance.update', $attendance->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary btn-sm" type="submit">Sign-out <i class="fa-solid fa-arrow-right-from-bracket ms-1"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">There is no signed-in employee today.</td>
                    </tr>
                @endforelse
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
