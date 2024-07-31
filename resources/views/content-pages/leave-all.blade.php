@extends('content-pages.layout')

@section('title', 'Leave')

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
        <a class="nav-link side-active" href="leave"><i class="me-2 fa-solid fa-arrow-right-from-bracket"></i> Leave</a>
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
            <h3 class="me-2">
                <i class="me-2 fa-solid fa-arrow-right-from-bracket"></i> Employee Leave Management
            </h3>
        </div>
        <hr />
        <form method="POST" action="/manager/leave" id="leaveForm">
            @csrf
            <table class="table text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Employee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input required type="date" name="start_date" class="form-control" id="start_date"
                                aria-describedby="emailHelp" />
                        </td>
                        <td>
                            <input required type="date" class="form-control" name="end_date" id="end_date"
                                aria-describedby="emailHelp" />
                        </td>
                        <td>
                            <select required class="form-select" id="status" name="status" required>
                                <option selected disabled>Select Status</option>
                                <option value="Approved">Approved</option>
                                <option value="Disapproved">Disapproved</option>
                            </select>
                        </td>
                        <td>
                            <select required class="form-select" id="name" name="name" required>
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
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-outline-primary rounded-pill px-4" id="submitLeave" type="submit">
                    Submit <i class="fa-solid fa-right-to-bracket"></i>
                </button>
            </div>
        </form>

        <div class="d-flex justify-content-center align-items-center mb-3 mt-4">
            <h5 class="me-2">
                <i class="me-2 fa-solid fa-arrow-right-from-bracket"></i>Leave Application/s
            </h5>
        </div>
        <hr />
        <table class="table table-bordered bg-white rounded text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Employee</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leaves as $leaves)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($leaves->start_date)->format('F j, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($leaves->end_date)->format('F j, Y') }}</td>
                        <td>{{ $leaves->status }}</td>
                        <td>{{ $leaves->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">There is currently no leave application to be managed.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="text-end">
            <a href="/manager/leave" class="btn btn-primary">Show only the recent leave applications.</a>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.getElementById('submitLeave');
            const startDate = document.getElementById('start_date');
            const endDate = document.getElementById('end_date');
            const statusSelect = document.getElementById('status');
            const nameSelect = document.getElementById('name');
            const form = document.getElementById('leaveForm');

            form.addEventListener('submit', function(event) {
                if (!startDate.value || !endDate.value || !statusSelect.value || !nameSelect.value) {
                    event.preventDefault();
                    alert('Please fill in all fields before submitting.');
                }
            });
        });
    </script>

@endsection
