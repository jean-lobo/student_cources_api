<?php

namespace App\Http\Controllers;

use App\Models\Student_detail;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getAllStudents() {
        $student = Student_detail::get()->toJson(JSON_PRETTY_PRINT);
    return response($student, 200);
      }
  
      public function createStudents(Request $request) {
        $student = new Student_detail();
    $student->first_name = $request->first_name;
    $student->last_name = $request->last_name;
    $student->date_of_joining = $request->date_of_joining;
    $student->course_id=$request->course_id;
    $student->save();
    return response()->json([
        "message" => "student record created"
    ], 201);
      }
  
      public function getStudents($id) {
        if (Student_detail::where('student_id', $id)->exists()) {
            $student = Student_detail::where('student_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }
      }
  
      public function updateStudents(Request $request, $id) {
        if (Student_detail::where('student_id', $id)->exists()) {
            $student = Student_detail::find($id);
            $student->first_name = is_null($request->first_name) ? $student->first_name : $request->first_name;
            $student->last_name = is_null($request->last_name) ? $student->last_name : $request->last_name;
            $student->date_of_joining = is_null($request->date_of_joining) ? $student->date_of_joining : $request->date_of_joining;
            $student->course_id = is_null($request->course_id) ? $student->course_id : $request->course_id;
            $student->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
            
        }
      }
  
      public function deleteStudents($id) {
        // logic to delete a student record goes here
        if(Student_detail::where('student_id', $id)->exists()) {
            $student = Student_detail::find($id);
            $student->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }
      }
}
