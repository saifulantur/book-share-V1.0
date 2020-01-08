<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;
    protected $fillable =['area_name', 'city_id'];
    protected $dates = ['deleted_at'];

    function relationToCities(){
//        return $this->belongsTo('App\City', 'city_id', 'id');
        return $this->belongsTo('App\City', 'city_id');
    }
}
