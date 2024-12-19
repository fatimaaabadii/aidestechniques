<?php

namespace App\Http\Controllers\DirecteurCentrale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipement;
use App\Models\Delegation;
use App\Models\Region;
use App\Models\Transfert;
use Illuminate\Support\Facades\Auth;

class TransferStockController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('transfert', Stock::class)) {
            abort(403);
        } 
        $transferts = Transfert::with('delegationTo','delegationFrom','equipements')->get();
        return view('directeurcentrale.transfer_stock.index',['transferts' => $transferts]);
    }

    public function create()
    {
        $equipements = Equipement::all();
        $delegations = Delegation::all();
        $regions = Region::all();


        return view('directeurcentrale.transfer_stock.create', [
            'equipements'   =>  $equipements,
            'delegations'   =>  $delegations,
            'regions'       =>  $regions
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'delegation_from' => 'required',
            'delegation_to' => 'required',
            'equipement_id' => 'required',
            'quantity' => 'required',
        ]);

        $transfert = new Transfert();
        $transfert->delegation_from     = $request->delegation_from;
        $transfert->delegation_to     = $request->delegation_to;
        $transfert->equipement_id     = $request->equipement_id;
        $transfert->quantity     = $request->quantity;
        $transfert->save();
        return redirect()->route('directeurcentrale.stock.treansfer');

        

    }
}
