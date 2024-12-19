<?php

namespace App\Http\Controllers\DirecteurCentrale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delegation;
use App\Models\Stock;
use App\Models\RoleUser;
class DelegationController extends Controller
{
    public function index()
    {

        $delegations = Delegation::with('region')->get();


        return view('directeurcentrale.delegations.index', [
            'delegations'   =>   $delegations
        ]);
    }


    public function detail($id)
    {

        $delegations = Stock::with('equipements')->where('delegation_id',$id)->get();
        // return ($delegations);
        $delegation = Delegation::with('region')->find($id);
        return view('directeurcentrale.delegations.details', ['delegations'  => $delegations,'delegation'  => $delegation]);
    }
}
