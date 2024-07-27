<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Recruitment;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $recruitments = Recruitment::all();
        return view('content-pages.recruitment', compact('departments', 'recruitments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('start.recruitment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $recruitments = Recruitment::findOrFail($id);
        $recruitments->delete();
        return redirect('/manager/recruitment-dashboard')->with("message", "Recruitment application deleted successfully!");
    }
}
