<?php

namespace App\Http\Controllers\DelegueProvincial;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidationRegionController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Stock::class)) {
            abort(403);
        } 
        $stocks = Stock::with('equipements','delegations','regions')->whereNot('region_id','=',null)->paginate(8);
        return view('delegueprovincial.validationregion.index',['stocks'=>$stocks]);
    }

    public function view($id)
    {
        $states = ['En cours de traitement','Confirmé','Rejeté'];
        $stock = Stock::with('equipements','delegations','regions')->find($id);
        return view('delegueprovincial.validationregion.view',['stock'=>$stock,'states'=>$states]);
    }
    
    public function update($id,Request $request)
    {
        $stock = Stock::find($id);
        $stock->status_region = $request->status_region;
        $stock->save();
        return redirect()->route('delegueprovincial.region');
    }
}
