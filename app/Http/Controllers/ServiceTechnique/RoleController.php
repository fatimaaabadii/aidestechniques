<?php

namespace App\Http\Controllers\ServiceTechnique;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('servicetechnique.roles.index',['roles'=>$roles]);
    }
    public function create(){
        return view('servicetechnique.roles.create');
        }
        public function store(Request $request){
            $request->validate([
                'role'=> 'required|max:255'
            ]);

            $role = new Role();
            $role->role = $request->role;
            $role->save();
            return redirect()->route('servicetechnique.role');
            
        }
        public function edit($id){
            $role=Role::Find($id);
            return view('servicetechnique.roles.edit',['role'=>$role]);
        }
        public function update(Request $request,$id){
            $request->validate([
                'role'=> 'required|max:255'
            ]);

            $role = Role::find($id);
            $role->role = $request->role;
            $role->save();
            return redirect()->route('servicetechnique.role');
        }



        public function destroy($id){
            $role=Role::Find($id)->delete();
        return back();
        }
}
