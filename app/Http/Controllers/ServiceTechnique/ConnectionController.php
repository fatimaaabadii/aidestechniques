<?php

namespace App\Http\Controllers\ServiceTechnique;

use App\Http\Controllers\Controller;
use App\Models\Loginhistorique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Loginhistorique::class)) {
            abort(403);
        }
        $loginHistoriques = Loginhistorique::with('user')->with('loginstatus')->get();
// return ($loginHistorique);
        return view('servicetechnique.connection.index',['loginHistoriques'=>$loginHistoriques]);
    }
}
