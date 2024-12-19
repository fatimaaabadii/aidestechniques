<?php

namespace App\Http\Controllers\CoordinationRegionale;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransfertStockController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('transfert', Stock::class)) {
            abort(403);
        } 
        $stocks = Stock::with('equipements','delegations','regions')->where('status','=','Confirmed')->paginate(8);
        return view('coordinationregionale.transfertStock.index',['stocks'=>$stocks]);
    }
    public function transfert($id)
    {
        $regions = Region::all();
        $stock = Stock::with('equipements','delegations')->find($id);
        return view('coordinationregionale.transfertStock.transfert',['stock'=>$stock,'regions'=>$regions]);
    }
    public function update($id,Request $request)
    {
        $stock = Stock::find($id);
        $stock->region_id=$request->region_id;
        $stock->save();
        return redirect()->route('coordinationregionale.stock');
    }

}
