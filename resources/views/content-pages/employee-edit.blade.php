@extends('content-pages.layout')

@section('title', 'Edit Employee')

@section('styles-links')

@endsection

@section('sidebar')
    <li class="nav-item">
        <a class="nav-link" href="/manager/content_dashboard"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link side-active" href="/manager/employee"><i class="me-2 fa-solid fa-user"></i> Employee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/attendance"><i class="me-2 fa-solid fa-clipboard-user"></i> Attendance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/leave"><i class="me-2 fa-solid fa-arrow-right-from-bracket"></i> Leave</a>
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
        <a class="nav-link" href="/manager/recruitment-dashboard"><i class="me-2 fa-solid fa-database"></i> Recruitment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/payroll"><i class="me-2 fa-solid fa-dollar-sign"></i> Payroll</a>
    </li>
@endsection

@section('main-content')
    <div class="recruitment-form container border p-4 table-responsive">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <h3 class="me-2"><i class="fas fa-plus"></i> Edit Employee</h3>
        </div>
        <hr />
        
        <form method="POST" action="{{ url('/manager/employee/' . $employees->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ $employees->first_name }}" placeholder="e.g. John" autofocus />
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="last_name"
                    value="{{ $employees->last_name }}" placeholder="e.g. Doe" />
            </div>
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Number:</label>
                <input type="text" class="form-control" id="mobileNumber" name="mobile_number"
                    value="{{ $employees->mobile_number }}" placeholder="e.g. 09876543210" />
            </div>
            <div class="mb-3">
                <label for="emergency_mobile_number" class="form-label">Emergency Contact Mobile Number:</label>
                <input type="text" class="form-control" id="emergency_mobile_number" name="emergency_mobile_number" value="{{ $employees->emergency_mobile_number }}"
                    placeholder="e.g. 09876543210" />
            </div>
            <div class="mb-3">
                <label for="bank" class="form-label">Bank:</label>
                <input type="text" class="form-control" id="bank" name="bank" value="{{ $employees->bank }}" placeholder="e.g. GCash" />
            </div>
            <div class="mb-3">
                <label for="account_number" class="form-label">Account Number:</label>
                <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $employees->account_number }}" placeholder="e.g. 09876543210" />
            </div>
            <div class="mb-3">
                <label for="emailAddress" class="form-label">Email Address:</label>
                <input type="email" class="form-control" id="emailAddress" name="email" value="{{ $employees->email }}"
                    placeholder="e.g. my@email.com" />
                <div id="emailHelp" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary(₱):</label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $employees->salary }}"
                    placeholder="e.g. 10000" />
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select class="form-select" id="gender" name="gender">
                    <option selected>Select Gender</option>
                    <option value="Male" {{ $employees->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $employees->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $employees->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department:</label>
                <select class="form-select" id="department" name="department">
                    <option selected>Select Department</option>
                    @if ($departments->isEmpty())
                        <option value="No department available">No department available.</option>
                    @else
                        @foreach ($departments as $department)
                            <option value="{{ $department->department_name }}"
                                {{ $employees->department == $department->department_name ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="userImage" class="form-label">Current Photo:</label>
                @if ($employees->photo)
                    <div>
                        <img src="{{ asset($employees->photo) }}" alt="Employee Photo" class="img-fluid"
                            style="max-width: 200px;">
                    </div>
                @else
                    <div class="form-control" style="background-color: #e9ecef">No photo.</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="userImage" class="form-label">Update Photo:</label>
                <input type="file" class="form-control" id="userImage" name="photo" accept="image/*" />
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Update Employee</button>
            </div>
        </form>


    </div>
@endsection
