<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use CrudTrait;

    protected $guarded = [];
    protected $appends = ['date', 'status', 'worked'];
    protected $dates = ['date'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($presence) {
            $presence->employee->last_presence_id = $presence->id;
            $presence->employee->save();
            $presence->timestamps = false;
            $presence->updated_at = null;
            $presence->save();
        });
    }

    public static function whosIn()
    {
        return static::whereNull('updated_at')->with('employee')->get()->pluck('employee.name');
    }

    public function getStatusAttribute()
    {
        return (is_null($this->updated_at)) ? 'in' : 'out';
    }

    public function getWorkedAttribute()
    {
        return (is_null($this->updated_at)) ? 0 : $this->updated_at->diffInSeconds($this->created_at);
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
