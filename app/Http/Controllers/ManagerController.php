<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function content_dashboard() {
        return view('content-pages.dashboard');
    }
    
    public function recruitment() {
        return view('content-pages.recruitment');
    }

    public function payroll() {
        return view('content-pages.payroll');
    }
}
