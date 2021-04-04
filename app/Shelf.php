<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $fillable = ['title'];

    public function comics()
    {
        return $this->hasMany('App\Comic', 'shelf_id', 'id');
    }
}
