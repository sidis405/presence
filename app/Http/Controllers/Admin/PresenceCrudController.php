<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Requests\MovementRequest as StoreRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\MovementRequest as UpdateRequest;

class PresenceCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Presence');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/presences');
        $this->crud->setEntityNameStrings('movement', 'presences');

        $this->crud->setFromDb();

        $this->crud->removeFields(['dirty_close', 'employee_id']);

        // $this->crud->addField([
        //    // 1-n relationship
        //    'label' => "Got Out", // Table column heading
        //    'type' => "datetime",
        //    'name' => 'updated_at'
        // ]);

        $this->crud->addField([  // DateTime
            'name' => 'updated_at',
            'label' => 'Got Out',
            'type' => 'datetime_picker',
            // optional:
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY HH:mm',
                'language' => 'en'
            ]
        ]);

        $this->crud->addField([   // Hidden
          'name' => 'override',
          'value' => '1',
          'type' => 'hidden'
        ]);

        $this->crud->addColumn([ // select_from_array
            'name' => 'dirty_close',
            'label' => "Closed By",
            'type' => 'select_from_array',
            'options' => ['1' => 'System', '0' => 'User'],
        ]);

        $this->crud->addColumn([ // select_from_array
            'name' => 'override',
            'label' => "Override",
            'type' => 'select_from_array',
            'options' => ['1' => 'Yes', '0' => 'No'],
        ]);

        $this->crud->addColumn([
           // 1-n relationship
           'label' => "Time", // Table column heading
           'type' => "timestamp",
           'name' => 'workedFormatted'
        ]);

        $this->crud->addColumn([
           // 1-n relationship
           'label' => "Employee", // Table column heading
           'type' => "select",
           'name' => 'employee_id', // the column that contains the ID of that connected entity;
           'entity' => 'employee', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Employee", // foreign key model
        ]); // add a single column, at the end of the stack

        $this->crud->addColumn([
           // 1-n relationship
           'label' => "Got In", // Table column heading
           'type' => "datetime",
           'name' => 'created_at'
        ]); // add a single column, at the end of the stack

        $this->crud->addColumn([
           // 1-n relationship
           'label' => "Got Out", // Table column heading
           'type' => "datetime",
           'name' => 'updated_at'
        ]); // add a single column, at the end of the stack

        // $this->crud->removeAllButtons();
        $this->crud->removeButtonFromStack('delete', 'line');
        // $this->crud->removeAllButtons();
        $this->crud->removeAllButtonsFromStack('top');


        $this->crud->enableExportButtons();

        $this->crud->orderBy('created_at', 'DESC');

        $this->crud->addFilter(
            [
              'name' => 'employee_id',
              'type' => 'select2_ajax',
              'label'=> 'Filter By Employee',
              'placeholder' => 'Filter by employee'
            ],
            url('admin/presences/ajax-employee-options'), // the ajax route
            function ($value) {
                $this->crud->addClause('where', 'employee_id', $value);
            }
        );

        $this->crud->addFilter(
            [ // date filter
                  'type' => 'date',
                  'name' => 'created_at',
                  'label'=> 'Date'
                ],
            false,
            function ($value) {
                $this->crud->addClause('where', 'created_at', 'LIKE', '%' . $value . '%');
            }
        );
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function employeeOptions()
    {
        $term = $this->request->input('term');
        $options = Employee::where('name', 'like', '%'.$term.'%')->get();
        return $options->pluck('name', 'id');
    }
}
