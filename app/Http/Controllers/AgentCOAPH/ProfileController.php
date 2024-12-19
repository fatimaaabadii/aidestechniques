<?php

namespace App\Http\Controllers\AgentCOAPH;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('agentcoaph.profile', ['user'  =>  $user]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'phone' => 'required',
            'ordinal_number' => 'required',
            
        ]);
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->ordinal_number = $request->ordinal_number;
            $user->save();

            return back();

    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return back();
        } else {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
    }
}
