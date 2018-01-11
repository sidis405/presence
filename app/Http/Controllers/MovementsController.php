<?php

namespace App\Http\Controllers;

use App\Movement;

class MovementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('door-must-be-selected');
    }

    public function store()
    {
        request()->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'type' => 'required|string',
        ]);

        $movement = new Movement;
        $movement->employee_id = request('employee_id');
        $movement->type = request('type');
        $movement->door_id = session('door_id');
        $movement->save();

        if (request()->wantsJson()) {
            return $movement->load('employee', 'door');
        }

        return back();
    }
}