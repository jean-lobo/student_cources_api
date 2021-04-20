<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'courses_id';



    protected $fillable = ['course_name'];

    public function student()
    {
        return $this->hasOne('App/Models/Student_detail','course_id');
    }
}
