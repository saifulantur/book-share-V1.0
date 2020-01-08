<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $fillable =['city_name'];
    protected $dates = ['deleted_at'];

    function relationToAreas(){
        return $this->hasMany('App\Area');
    }
}
