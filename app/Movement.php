<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use CrudTrait;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::created(function ($movement) {
            $movement->employee->last_movement_id = $movement->id;
            $movement->employee->save();
        });
    }

    public function door()
    {
        return $this->belongsTo(Door::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
