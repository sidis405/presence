<?php

namespace App\Http\Controllers;

use App\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Employee::with('movements')->find(10);

        return $employee;

        return $employee->movements->groupBy('date')->map(function ($day) {
            return gmdate("H:i", $day->values()->reverse()->chunk(2)->map(function ($move) {
                $times = $move->pluck('created_at');

                $diff = $times[0]->diffInSeconds($times[1]);

                return $diff;
            })->sum());
        });

        $employees = Employee::with('lastMovement')->orderBy('name', 'ASC')->get();

        // return $employees;

        if (request()->wantsJson()) {
            return $employees;
        }

        return view('dashboard', compact('employees'));
    }
}
