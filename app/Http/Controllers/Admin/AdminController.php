<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Presence;
use Carbon\Carbon;
use Backpack\Base\app\Http\Controllers\Controller;
use ConsoleTVs\Charts\Facades\Charts;

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
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['in'] = Employee::in()->get();
        $this->data['out'] = Employee::out()->get();
        $this->data['dirty'] = Presence::dirtyClose();


        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W');

<<<<<<< HEAD
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['in'] = Presence::whosIn();
        
        $chart = Charts::multi('bar', 'material')
            // Setup the chart settings
            ->title("My Cool Chart")
            // A dimension of 0 means it will take 100% of the space
            ->dimensions(0, 400) // Width x Height
            // This defines a preset of colors already done:)
            ->template("material")
            // You could always set them manually
            // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // Setup the diferent datasets (this is a multi chart)
            ->dataset('Element 1', [5,20,100])
            ->dataset('Element 2', [15,30,80])
            ->dataset('Element 3', [25,10,40])
            // Setup what the values mean
            ->labels(['One', 'Two', 'Three']);
        // dd($this->data);
=======
        $date = Carbon::now();
        $date->setISODate($year, $week);

        $startDate = $date->startOfWeek()->toDateString();
        $endDate = $date->endOfWeek()->toDateString();

        $dateRange = $this->getDateRange($startDate, $endDate);

        // return $dateRange;

        $employees = collect(Employee::with(['presences' => function ($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate])->get();
        }])->get())->map(function ($employee) use ($dateRange) {
            $employee = $employee->toArray();

            $employee['workedHours'] = array_merge($dateRange, $employee['workedHours']);

            unset($employee['presences']);
            return $employee;
        });

        $this->data['reportDates'] = $dateRange;
        $this->data['reportData'] = $employees;
>>>>>>> 354f5de96d0c2e07dcb95497f42484d338ca7e67

        return view('backpack::dashboard', $this->data, [ 'chart' => $chart]);
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

    protected function getDateRange($startDate, $endDate)
    {
        $begin = new \DateTime($startDate);
        $end = new \DateTime($endDate);
        $end = $end->modify('+1 day');

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($begin, $interval, $end);

        $dates = [];

        foreach ($daterange as $date) {
            $dates[$date->format("Y-m-d")] = '00:00';
        }

        return $dates;
    }
}
