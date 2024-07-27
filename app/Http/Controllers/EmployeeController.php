<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $employees = Employee::all();
        return view('content-pages.employee', compact('departments', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('content-pages.employee-add', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'first_name' => 'required|string|max:255',
            // 'photo' => 'nullable|file|image|max:10240', 
        ]);

        $employees = new Employee;
        $employees->first_name = $request->input('first_name');
        $employees->last_name = $request->input('last_name');
        $employees->mobile_number = $request->input('mobile_number');
        $employees->email = $request->input('email');
        $employees->salary = $request->input('salary');
        $employees->gender = $request->input('gender');
        $employees->department = $request->input('department');

        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $employees->photo = '/storage/' . $path;
        }

        $employees->save();
        return redirect('/manager/employee')->with("message", "Employee added successfully!");
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $departments = Department::all();
    //     $employees = Employee::find($id);
    //     return view('content-pages.employee-view', compact('departments'))
    //     ->with('employees', $employees)
    //     ;
    // }

    public function show($id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();

        if (!$employee) {
            return redirect('/manager/employee')->with('error', 'Employee not found.');
        }

        return view('content-pages.employee-view', compact('employee', 'departments'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = Department::all();
        $employees = Employee::find($id);

        if (!$employees) {
            return redirect('/manager/employee')->with('error', 'Employee not found.');
        }
        
        return view('content-pages.employee-edit', compact('departments'))
            ->with('employees', $employees);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'first_name' => 'required|string|max:255',
            // 'photo' => 'nullable|file|image|max:10240', 
        ]);

        $employees = Employee::find($id);
        $employees->first_name = $request->input('first_name');
        $employees->last_name = $request->input('last_name');
        $employees->mobile_number = $request->input('mobile_number');
        $employees->email = $request->input('email');
        $employees->salary = $request->input('salary');
        $employees->gender = $request->input('gender');
        $employees->department = $request->input('department');
       
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $employees->photo = '/storage/' . $path;
        }

        $employees->save();
        return redirect('/manager/employee')->with("message", "Employee updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = Employee::findOrFail($id);
        $employees->delete();
        return redirect('/manager/employee')->with("message", "Employee deleted successfully!");
    }
}
