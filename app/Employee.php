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

    public function scopeOut($query)
    {
        return $query->whereHas('lastPresence', function ($innerQuery) {
            return $innerQuery->where('updated_at', '!=', null);
        })->orWhereDoesntHave('lastPresence');
    }

    public function scopeIn($query)
    {
        return $query->whereHas('lastPresence', function ($innerQuery) {
            return $innerQuery->whereNull('updated_at');
        });
    }

    public static function storePresence($employee_id, $type)
    {
        $employee = static::find($employee_id);

        return ($type == 'in') ? $employee->getIn() : $employee->getOut();
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
        return $this->hasMany(Presence::class)->oldest();
    }

    public function getWorkedHoursAttribute()
    {
        return $this->presences->groupBy('date')->map(function ($day) {
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
