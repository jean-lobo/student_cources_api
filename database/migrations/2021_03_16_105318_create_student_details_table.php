<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
           
            $table->increments('student_id');
            $table->string('first_name');
            $table->string('last_name');
           $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')->references('courses_id')->on('courses')->onDelete('cascade');
            $table->date('date_of_joining');
            $table->timestamps();
           
        }); 
     
        
    

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
}
