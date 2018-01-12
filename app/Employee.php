<?php

namespace App;

use Carbon\Carbon;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use CrudTrait;

    protected $guarded = [];
    protected $appends = ['workedHours'];

    public static function storePresence($employee_id, $type)
    {
        $employee = static::with('lastPresence')->find($employee_id);

        if ($type == 'in') {
            return $employee->getIn();
        } else {
            return $employee->getOut();
        }
    }

    public function getIn()
    {
        return $this->presences()->create();
    }

    public function getOut()
    {
        return $this->lastPresence->touch();
    }

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }

    public function getWorkedHoursAttribute()
    {
        return $this->presences()->get()->groupBy('date')->map(function ($day) {
            return gmdate("H:i", $day->pluck('worked')->sum());
        });
    }

    public function lastPresence()
    {
        return $this->belongsTo(Presence::class, 'last_presence_id')
        ->whereDate('created_at', '=', Carbon::today()->toDateString());
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
