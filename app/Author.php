<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Author extends Model
{
    use SoftDeletes;
    protected $fillable =['author_name'];
    protected $dates = ['deleted_at'];
}
