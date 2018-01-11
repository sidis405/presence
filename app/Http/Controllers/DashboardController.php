<?php

namespace App\Http\Controllers;

use App\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::with('lastMovement')->orderBy('name', 'ASC')->get();

        // return $employees;

        if (request()->wantsJson()) {
            return $employees;
        }

        return view('dashboard', compact('employees'));
    }
}
