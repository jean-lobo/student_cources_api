<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_detail extends Model
{
    use HasFactory;


    protected $table = 'student_details';
    protected $primaryKey = 'student_id';
    protected $foreignKey = 'course_id';

protected $fillable = ['first_name','last_name','date_of_joining','course_id'];



public function course()
{
    return $this->belongsTo('App\Models\Courses','course_id');
} 
}