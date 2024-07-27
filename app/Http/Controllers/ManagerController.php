<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Recruitment;
use App\Models\User;

class ManagerController extends Controller
{
    public function content_dashboard() {

        $managersCount = User::count();
        $departmentsCount = Department::count();
        $employeesCount = Employee::count();    

        $departments = Department::all();
        $employees = Employee::all();
        return view('content-pages.dashboard', compact('departments', 'employees', 'managersCount','departmentsCount','employeesCount'));
    }
    
    public function recruitmentDashboard() {
        $departments = Department::all();
        return view('content-pages.recruitment', compact('departments'));
    }

    public function storeRecruitment(Request $request)
    {
        $request->validate([
            // 'first_name' => 'required|string|max:255',
            // 'photo' => 'nullable|file|image|max:10240', 
        ]);

        $recruitments = new Recruitment;
        $recruitments->first_name = $request->input('first_name');
        $recruitments->last_name = $request->input('last_name');
        $recruitments->position = $request->input('position');
        $recruitments->email = $request->input('email');
        $recruitments->mobile_number = $request->input('mobile_number');

        $recruitments->save();
        return redirect('/recruitment')->with("message", "Application successfully sent!");
    }

    public function payroll() {
        $departments = Department::all();
        return view('content-pages.payroll', compact('departments'));
    }
}
