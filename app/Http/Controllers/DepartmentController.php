<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Employee;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('content-pages.department', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('content-pages.department-new', compact(
            'departments'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departments = new Department;
        $departments->department_name = $request->input('department_name');
        $departments->history = $request->input('history');
        $departments->save();
        return redirect('/manager/department/' . $departments->id)->with("success", "Department added successfully!");
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $departments = Department::all();
    //     $departmentss = Department::find($id);

    //     if (!$departmentss) {
    //         return redirect()->back()->with('error', 'Department not found.');
    //     }

    //     return view('content-pages.department', compact('departments', 'departmentss'))
    //     ;
    // }


    public function show(string $id)
    {
        $departments = Department::all();
        $departmentss = Department::find($id);

        if (!$departmentss) {
            return redirect()->back()->with('error', 'Department not found.');
        }

        // Fetch employees associated with the selected department
        $employees = Employee::where('department', $departmentss->department_name)->get();

        return view('content-pages.department', compact('departments', 'departmentss', 'employees'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
