<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use CrudTrait;

    protected $guarded = [];
    protected $appends = ['workedHours'];

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    public function getWorkedHoursAttribute()
    {
        return $this->movements->groupBy('date')->map(function ($day) {
            return gmdate("H:i", $day->values()->reverse()->chunk(2)->map(function ($move) {
                $times = $move->pluck('created_at');

                $diff = $times[0]->diffInSeconds($times[1]);

                return $diff;
            })->sum());
        });
    }

    public function lastMovement()
    {
        return $this->belongsTo(Movement::class, 'last_movement_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
