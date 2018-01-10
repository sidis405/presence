<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    use CrudTrait;

    protected $guarded = [];

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
