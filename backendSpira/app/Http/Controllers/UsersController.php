use Illuminate\Support\Facades\Hash;
use App\Models\Courses;
use App\Models\;

class UsersController extends Controller
{
    public function getAllUsers (){
            $users = DB::table('users AS u')
                    ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.id_profile', 'p.name as profile_name' )
                    ->join('profiles AS p', 'p.id', '=', 'u.id_profile')
                    ->get();
            $pprifiles = Profiles::get();
            return  view('users',['users'=> $users]);

        }

    public  function storeUser(Request $request) {
        $user = new Users;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->id_profile = request('id_profile');
        $user->save();
        return $user;
    }

    function editUser($id) {
		$user = DB::table('users AS u')
                ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.id_profile' )
				->where('u.id',$id)
                ->get();
        $courses = Courses::get();

        $assign_courses = DB::table('user_courses AS uc')
                ->select('uc.id', 'uc.id_user', 'uc.id_course', 'c.name', 'c.hourly_intensity' )
				->join('courses AS c', 'c.id', '=', 'uc.id_course')
                ->join('users AS u', 'u.id', '=', 'uc.id_user')
                ->where('u.id', $id)
                ->get();
        return view('edit-user', ['user' => $user, 'courses' => $courses, 'assign_courses' => $assign_courses]);
    }

    function updateUser(Request $request, $id) {
        $user = Users::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->id_profile = request('id_profile');
        $user->save();

        /*users courses*/
        $users_courses = new UsersCourse;
        $users_courses->id_user = $user->id;
        $users_courses->id_course = request('id_course');
        $users_courses->save();
        return $user;
    }

    function delete($id) {
        Users::where('id', $id)->delete();
    }

}