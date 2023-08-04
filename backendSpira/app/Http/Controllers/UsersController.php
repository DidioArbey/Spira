use Illuminate\Support\Facades\Hash;
use App\Models\Courses;
use App\Models\;

class UsersController extends Controller
{
    public function getAllUsers (){
            $users = DB::table('users AS u')
                    ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.id_profile' )
                    ->get();
            return  view('users',['users'=> $users]);

        }

    public  function storeUser(Request $request) {
        $user = new Users;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->id_profile = 2;
        $user->save();
        return $user;
    }

    function editUser($id) {
		$user = DB::table('users AS u')
                ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.id_profile' )
				->where('u.id',$id)
                ->get();
        $courses = Courses::get();
        return view('edit-user', ['user' => $user, 'courses' => $courses]);
    }

    function updateUser(Request $request, $id) {
        $user = Users::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->id_profile = 2;
        $user->save();

        /*users courses*/
        $users_courses = new UsersCourse;
        $users_courses->user_id = $user->id;
        $users_courses->course_id = request('course_id');
        $users_courses->save();
        return $user;
    }

    function delete($id) {
        Users::where('id', $id)->delete();
    }

}