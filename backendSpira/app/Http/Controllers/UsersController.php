<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Courses;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Profiles;
use App\Models\UsersCourses;

class UsersController extends Controller
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

    public function getAllUsers()
    {
        $users = DB::table('users AS u')
            ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.id_profile', 'p.name as profile_name')
            ->join('profiles AS p', 'p.id', '=', 'u.id_profile')
            ->get();
        $profiles = Profiles::get();
        // $list = Users::get();
        // dd($list);
        return  view('users', ['users' => $users, 'profiles' => $profiles]);
    }

    public  function storeUser(Request $request)
    {
        $user = new Users;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->id_profile = request('id_profile');
        $user->save();
        return $user;
    }

    function editUser($id)
    {
        $user = DB::table('users AS u')
            ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.id_profile')
            ->where('u.id', $id)
            ->get();
        $courses = Courses::get();
        $profiles = Profiles::get();

        $assign_courses = DB::table('users_courses AS uc')
            ->select('uc.id', 'uc.id_user', 'uc.id_course', 'c.name', 'c.hourly_intensity')
            ->join('courses AS c', 'c.id', '=', 'uc.id_course')
            ->join('users AS u', 'u.id', '=', 'uc.id_user')
            // ->where('u.id', $id)
            ->get();
        //dd($assign_courses);
        return view('edit-user', ['user' => $user, 'courses' => $courses, 'profiles' => $profiles, 'assign_courses' => $assign_courses]);
    }

    function updateUser(Request $request, $id)
    {
        $user = Users::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->id_profile = request('id_profile');
        $user->save();

        return redirect()->route('users.list');
    }

    function assignCourse($id)
    {
            $users_courses = new UsersCourses;
            $users_courses->id_user = $id;
            $users_courses->id_course = request('id_course');
            $users_courses->save();
            return redirect()->route('users.list');
    }

    function delateUser($id)
    {
        Users::where('id', $id)->delete();
    }
}
