<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function getAllCourses() {
        $course = Courses::get()->toJson(JSON_PRETTY_PRINT);
        return response($course, 200); 
      }
  
      public function createCourses(Request $request) {
        
        $course = new Courses();
        $course->course_name = $request->course_name;
        $course->save();
  return response()->json([
            "message" => "course created"
        ], 201);
      }
  
      public function getCourses($id) {
        // logic to get a student record goes here
        if (Courses::where('courses_id', $id)->exists()) {
            $course = Courses::where('courses_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($course, 200);
          } else {
            return response()->json([
              "message" => "Course not found"
            ], 404);
          }
      }
  
      public function updateCourses(Request $request,$id) {
        if (Courses::where('courses_id', $id)->exists()) {
            $course = Courses::find($id);
            $course->course_name = is_null($request->course_name) ? $course->course_name : $request->course_name;
            $course->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Course not found"
            ], 404);
            
        }
      }
  
      public function deleteCourses($id) {
        // logic to delete a student record goes here
        if(Courses::where('courses_id', $id)->exists()) {
            $course = Courses::find($id);
            $course->delete();
    
            return response()->json([
              "message" => "course deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Course not found"
            ], 404);
          }
      }
}
