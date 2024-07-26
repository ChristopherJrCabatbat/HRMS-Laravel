<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

class ManagerController extends Controller
{
    public function content_dashboard() {
        $departments = Department::all();
        return view('content-pages.dashboard', compact('departments'));
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
