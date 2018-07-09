<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Nationality;
use App\Role;
use App\Services\RoleService;
use App\Services\UploadImageService;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $nationalities = Nationality::all();
        $roles = Role::all();
        return view('users.create', compact('nationalities', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->current_password = $request->input("password");
        $user->password = Hash::make($request->input("password"));
        $user->phone_number = $request->input("phone_number");
        $user->job_title = $request->input("job_title");
        $user->day_off = $request->input("day_off");
        $user->section = $request->input("section");
        $user->nationality_id = $request->input("nationality_id");

        if (isset($request->photo) && $request->photo != "") {
            $user->photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/users');
        }
        if (isset($request->active)) {
            $user->active = $request->input("active");
        }

        $user->save();

        // attach role
        RoleService::attachNewUserRole($user, $request->role_id);


        return redirect()->route('users.index')->with('message', 'user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $nationalities = Nationality::all();
        $roles = Role::all();
        return view('users.edit', compact('user', 'nationalities', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditUserRequest|Request $request
     * @param  int $id
     * @return Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");

        if ($request->password != null) {
            $user->password = Hash::make($request->input("password"));
            $user->current_password = $request->input("password");
        }
        $user->phone_number = $request->input("phone_number");
        $user->job_title = $request->input("job_title");
        $user->day_off = $request->input("day_off");
        $user->section = $request->input("section");
        $user->nationality_id = $request->input("nationality_id");
        if (isset($request->photo) && $request->photo != "") {
            $user->photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/users');
        }
        if ($request->active != "") {
            $user->active = $request->input("active");
        }

        RoleService::updateUserRole($user, $request->role_id);
        $user->save();
        return redirect()->route('users.index')->with('message', 'user updated successfully.');
    }

    public function profile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input("name");
        if ($request->password != null) {
            $user->password = Hash::make($request->input("password"));
            $user->current_password = $request->input("password");
        }
        $user->phone_number = $request->input("phone_number");
        if (isset($request->photo) && $request->photo != "") {
            $user->photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/users');
        }
        $user->save();
        return redirect()->route('users.profile')->with('message', 'your data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('message', 'Item deleted successfully.');
    }

}
