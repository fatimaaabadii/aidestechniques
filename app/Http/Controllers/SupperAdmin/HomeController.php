<?php

namespace App\Http\Controllers\SupperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('supperadmin.profile', ['user'  =>  $user]);
    }
}
