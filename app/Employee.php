<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use CrudTrait;

    protected $guarded = [];

    public function movements()
    {
        return $this->hasMany(Movement::class);
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
