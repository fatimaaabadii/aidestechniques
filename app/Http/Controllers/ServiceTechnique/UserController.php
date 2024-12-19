<?php

namespace App\Http\Controllers\ServiceTechnique;

use App\Http\Controllers\Controller;
use App\Models\Delegation;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', User::class)) {
            abort(403);
        }
        $users = User::paginate(8);
        return view('servicetechnique.users.index',['users'=>$users]);
    }


    public function create()
    {
        
        if(auth()->user()->roles->first()->role == 'Directeur Central')
        {
            abort(403);
        }
        $roles = Role::whereNot('role','Directeur Central')->get();
        $delegations = Delegation::all();
        $regions = Region::all();
        return view('servicetechnique.users.create',['roles'=>$roles,'delegations'=>$delegations]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'phone' => 'required',
            'ordinal_number' => 'required',
            'region_id' => 'required',
            'roles' => 'required',
            'password' => 'required|min:8|max:12',
            ]);



        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->region_id = $request->region_id;
        $user->ordinal_number = $request->ordinal_number;
        $user->password = hash::make($request->password);
        // return $request->roles;
        $user->save();

        foreach ($request->roles as $role) {
            $user_role = new RoleUser;

            $user_role->user_id = $user->id;
            $user_role->role_id = $role;
            $user_role->delegation_id = $request->delegation_id;
            $user_role->save();
        }
        return redirect()->route('servicetechnique.user');
    }




    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $delegations = Delegation::all();
        $regions = Region::all();
        return view('servicetechnique.users.edit',['user'=>$user,'roles'=>$roles,'delegations'=>$delegations]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'phone' => 'required',
            'ordinal_number' => 'required',
            'roles' => 'required',
            'delegation_id' => 'required',
            'password' => 'required|min:8|max:12',

        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->ordinal_number = $request->ordinal_number;
        $user->region_id = $request->region_id;
        $user->password = hash::make($request->password);

        $user->save();
        $user_roles = RoleUser::where('user_id',$id)->get();
        foreach ($user_roles as $user_role) {
            # code...
            $user_role->delete();
        }

        foreach ($request->roles as $role) {

            $user_role = new RoleUser;

            $user_role->user_id = $user->id;
            $user_role->role_id = $role;
            $user_role->delegation_id = $request->delegation_id;
            $user_role->save();
        }
        return redirect()->route('servicetechnique.user');
    }




    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('servicetechnique.user');
    }
}
