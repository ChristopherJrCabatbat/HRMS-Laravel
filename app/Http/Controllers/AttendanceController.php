<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;

use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        // Get names of employees who have signed in today
        $signedInEmployees = Attendance::where('date', $currentDate)
            ->pluck('name')
            ->toArray();

        // Get employees who have not signed in today
        $employees = Employee::whereNotIn(DB::raw("CONCAT(first_name, ' ', last_name)"), $signedInEmployees)->get();

        // Get attendance records with status 'Present' for the current day
        $attendances = Attendance::where('date', $currentDate)
            ->where('status', 'Present')
            ->get()
            ->map(function ($attendance) {
                $attendance->formatted_date = Carbon::parse($attendance->date)->format('F j, Y');
                $attendance->formatted_arrival = Carbon::parse($attendance->arrival)->format('g:i A');
                $attendance->formatted_departure = $attendance->departure ? Carbon::parse($attendance->departure)->format('g:i A') : '--';
                return $attendance;
            });

        // Get all departments
        $departments = Department::all();

        // Pass the data to the view
        return view('content-pages.attendance', compact('departments', 'employees', 'attendances'));
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

        // Set the timezone to Asia/Manila
        date_default_timezone_set('Asia/Manila');

        // Get current date and time in MySQL format
        $currentDate = Carbon::now()->toDateString(); // MySQL format: YYYY-MM-DD
        $currentTime = Carbon::now()->toTimeString(); // MySQL format: HH:MM:SS

        $attendance = new Attendance;
        $attendance->name = $request->input('name');
        $attendance->status = $request->input('status');
        $attendance->date = $currentDate; // Store current date in MySQL format
        $attendance->arrival = $currentTime; // Store current time in MySQL format

        $attendance->save();

        return redirect('/manager/attendance')->with("success", "Employee signed-in successfully!");
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
        // Find the attendance record
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return redirect('/manager/attendance')->with('error', 'Attendance record not found.');
        }

        // Set the timezone to Asia/Manila
        date_default_timezone_set('Asia/Manila');

        // Get the current time in MySQL format
        $currentTime = Carbon::now()->toTimeString(); // MySQL format: HH:MM:SS

        // Update the departure field and set is_signed_out to true
        $attendance->departure = $currentTime;
        $attendance->is_signed_out = true; // Set the sign-out status to true

        $attendance->save();

        return redirect('/manager/attendance')->with('success', 'Employee signed-out successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
