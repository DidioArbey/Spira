<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Courses;
use App\Models\UsersCourses;
use Illuminate\Support\Facades\DB;


class CoursesController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getAllCourses (){
        $courses = DB::table('courses AS c')
                ->select('c.id', 'c.name', 'c.hourly_intensity', )
                ->get();
        return  view('courses',['courses'=> $courses]);

    }

    public  function storeCourse(Request $request) {
        $course = new Courses;
        $course->name = request('name');
        $course->hourly_intensity = request('hourly_intensity');
        $course->save();
        return $course;
    }

    function editCourse($id) {
		$course = DB::table('courses AS c')
                ->select('c.id', 'c.name', 'c.hourly_intensity' )
				->where('c.id',$id)
                ->get();
        return view('edit-course', ['course' => $course]);
    }

    function updateCourse(Request $request, $id) {
        $course = Courses::findOrFail($id);
        $course->name = request('name');
        $course->hourly_intensity = request('hourly_intensity');

        $course->save();
        return redirect()->route('courses.list');

    }

    function delateCourse($id) {
        Courses::where('id', $id)->delete();
    }

    function deleteAssignCourse($id) {
        UsersCourses::where('id', $id)->delete();
    }



}