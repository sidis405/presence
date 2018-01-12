<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Presence;
use Backpack\Base\app\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        // $employees = Employee::all();

        // return $employees;

        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['in'] = Presence::whosIn();

        // dd($this->data);

        return view('backpack::dashboard', $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(config('backpack.base.route_prefix').'/dashboard');
    }
}
