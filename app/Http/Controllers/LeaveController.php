<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Leave;
use App\Models\Department;
use App\Models\Employee;


class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::all();
        $departments = Department::all();
        $employees = Employee::all();
        
        return view('content-pages.leave', compact('departments', 'employees', 'leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required|string|max:255',
        ]);

        $leaves = new Leave;
        $leaves->start_date = $request->input('start_date');
        $leaves->end_date = $request->input('end_date');
        $leaves->status = $request->input('status');
        $leaves->name = $request->input('name');

        $leaves->save();
        return redirect('/manager/leave')->with("message", "Leave managed successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
