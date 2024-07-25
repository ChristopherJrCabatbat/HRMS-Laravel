<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employees = Employee::all();
        return view('content-pages.employee')
        // ->with('employees', $employees)
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content-pages.employee-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employees = new Employee;
        $employees->save();
        return redirect('/manager/employee')->with("message", "Employee added successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $employees = Employee::find($id);
        return view('content-pages.employee-view')
        // ->with('employees', $employees)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $employees = Employee::find($id);
        return view('content-pages.employee-edit')
        // ->with('employees', $employees)
        ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employees = Employee::find($id);
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
