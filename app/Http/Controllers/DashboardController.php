<?php

namespace App\Http\Controllers;

use App\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::with('lastPresence')->orderBy('name', 'ASC')->get();

        if (request()->wantsJson()) {
            return $employees;
        }

        return view('dashboard', compact('employees'));
    }
}
