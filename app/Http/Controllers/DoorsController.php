<?php

namespace App\Http\Controllers;

use App\Door;

class DoorsController extends Controller
{
    public function index()
    {
        $doors = Door::all();

        return view('doors.index', compact('doors'));
    }

    public function store()
    {
        request()->validate([
            'door_id' => 'required|integer|exists:doors,id'
        ]);

        $door = Door::find(request('door_id'));

        session()->put('door_id', $door->id);
        session()->put('door_name', $door->name);

        return redirect('/');
    }
}
