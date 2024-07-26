<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Employee;

class ManagerController extends Controller
{
    public function content_dashboard() {
        $departments = Department::all();
        $employees = Employee::all();
        return view('content-pages.dashboard', compact('departments', 'employees'));
    }
    
    public function recruitmentDashboard() {
        $departments = Department::all();
        return view('content-pages.recruitment', compact('departments'));
    }

    public function payroll() {
        $departments = Department::all();
        return view('content-pages.payroll', compact('departments'));
    }
}
