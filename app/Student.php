<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $fillable = ['name', 'age', 'gender','teacher_id','student_id'];
    function teacher()
    {
        return $this->belongsTo('App\Teacher')->select(array('id','name'));
    }
}
