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
                @forelse ($employees as $employees)
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
                            <form action="{{ route('manager.pay', $employees->id) }}" method="POST" class="pay-form">
                                @csrf
                                <button class="btn btn-primary pay-button" type="submit"
                                    data-id="{{ $employees->id }}">Pay</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">There are no payable employees.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="text-end">
            <form action="{{ route('manager.make-all-unpaid') }}" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to make all employees unpaid?')">Make all employees unpaid</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const payButtons = document.querySelectorAll('.pay-button');

            payButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const employeeId = this.getAttribute('data-id');

                    // Update the status to 'Paid' via an AJAX request
                    axios.post(`/manager/pay/${employeeId}`)
                        .then(response => {
                            // Show a message or update the UI to reflect the 'Paid' status
                            alert('Employee status updated to Paid.');

                            // Reset the status to 'Unpaid' after 2 minutes for testing
                            setTimeout(() => {
                                axios.post(`/manager/reset-status/${employeeId}`)
                                    .then(response => {
                                        alert('Employee status reset to Unpaid.');
                                        location
                                    .reload(); // Reload the page to reflect changes
                                    })
                                    .catch(error => {
                                        console.error(
                                            'Error resetting employee status:',
                                            error);
                                    });
                            }, 1 * 60 * 1000); // 2 minutes in milliseconds for testing
                        })
                        .catch(error => {
                            console.error('Error updating employee status:', error);
                        });
                });
            });
        });
    </script> --}}

@endsection
