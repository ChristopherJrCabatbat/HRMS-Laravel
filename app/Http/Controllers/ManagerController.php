<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Recruitment;
use App\Models\User;

use Carbon\Carbon;

class ManagerController extends Controller
{
    public function content_dashboard()
    {

        $managersCount = User::count();
        $departmentsCount = Department::count();
        $employeesCount = Employee::count();

        $departments = Department::all();
        $employees = Employee::all();
        return view('content-pages.dashboard', compact('departments', 'employees', 'managersCount', 'departmentsCount', 'employeesCount'));
    }

    public function recruitmentDashboard()
    {
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
        return redirect('/recruitment')->with("success", "Application successfully sent!");
    }

    public function payroll()
    {
        $departments = Department::all();
        $employees = Employee::where('status', 'Unpaid')->get();
        return view('content-pages.payroll', compact('departments', 'employees'));
    }

    public function pay($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->status = 'Paid';
            $employee->paid_at = Carbon::now(); // Set the paid_at timestamp
            $employee->save();
        }

        return redirect()->back()->with('success', 'Employee status updated to Paid.');
        // return response()->json(['success' => 'Employee status updated to Paid.']);
    }

    public function resetStatus($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->status = 'Unpaid';
            $employee->save();
        }

        return response()->json(['success' => 'Employee status reset to Unpaid.']);
    }

    public function makeAllUnpaid()
    {
        // Update the status of all employees to 'Unpaid'
        Employee::query()->update(['status' => 'Unpaid']);

        return redirect()->back()->with('success', 'All employees have been set to Unpaid.');
    }
}
