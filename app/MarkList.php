<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkList extends Model
{
    protected $fillable = ['student_id','maths', 'science', 'history','term'];
    function student()
    {
        return $this->belongsTo('App\Student')->select(array('id','name','student_id'));
    }
}
