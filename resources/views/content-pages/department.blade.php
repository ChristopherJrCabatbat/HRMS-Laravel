@extends('content-pages.layout')

@section('title', 'Department')

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
        <a class="nav-link" href="/manager/attendance">Attendance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manager/leave">Leave</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle side-active" href="#" id="departmentDropdown" role="button" data-bs-toggle="dropdown"
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
        {{-- <a class="nav-link" href="/manager/department-new">New Department</a> --}}
        <a class="nav-link" href="department/create">New Department</a>
        {{-- department/create --}}
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
    <div class="table-responsive text-center p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">BSE Department</h5>
            <form action="employee-add.html">
                <button class="btn btn-primary rounded-pill px-4" type="submit">
                    Update Info
                </button>
            </form>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
            <div class="me-5">
                <div class="d-flex flex-column justify-content-start align-items-start border-start px-4 py-5">
                    <div class="fs-3 mb-3 text-start">Brief History</div>
                    <div class="text-start">Bachelor of Secondary Education</div>
                </div>
            </div>
            <div class="border-end px-4 py-5">
                <div class="fs-3 mb-3">Associated Employees</div>
                <hr />
                <div class="container text-center">
                    <div class="row row-cols-2">
                        <div class="col d-flex justify-content-center">
                            <div class="card border-0" style="width: 8rem">
                                <div
                                    class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                    <img src="{{ asset('images/employee.png') }}" class="img-fluid rounded-circle text-center"
                                        alt="Employee Image" style="width: 70px; height: 70px; margin-right: 0" />
                                    <h5 class="card-title">Kumar.S</h5>
                                    <p class="card-text">(123182973)</p>
                                    <a href="#" class="btn btn-primary btn-sm">View profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="card border-0" style="width: 8rem">
                                <div
                                    class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                    <img src="{{ asset('images/employee.png') }}" class="img-fluid rounded-circle text-center"
                                        alt="Employee Image" style="width: 70px; height: 70px; margin-right: 0" />
                                    <h5 class="card-title">Kumar.S</h5>
                                    <p class="card-text">(123182973)</p>
                                    <a href="#" class="btn btn-primary btn-sm">View profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="card border-0" style="width: 8rem">
                                <div
                                    class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                    <img src="{{ asset('images/employee.png') }}" class="img-fluid rounded-circle text-center"
                                        alt="Employee Image" style="width: 70px; height: 70px; margin-right: 0" />
                                    <h5 class="card-title">Kumar.S</h5>
                                    <p class="card-text">(123182973)</p>
                                    <a href="#" class="btn btn-primary btn-sm">View profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="card border-0" style="width: 8rem">
                                <div
                                    class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                    <img src="{{ asset('images/employee.png') }}" class="img-fluid rounded-circle text-center"
                                        alt="Employee Image" style="width: 70px; height: 70px; margin-right: 0" />
                                    <h5 class="card-title">Kumar.S</h5>
                                    <p class="card-text">(123182973)</p>
                                    <a href="#" class="btn btn-primary btn-sm">View profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
