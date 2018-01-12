<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Events\MovementWasMade;

class PresencesController extends Controller
{
    public function store()
    {
        request()->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'type' => 'required|string',
        ]);

        $presence = Employee::storePresence(request('employee_id'), request('type'));

        event(new MovementWasMade());
    }
}
