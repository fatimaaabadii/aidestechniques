<?php

namespace App\Http\Controllers\AgentCOAPH;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUser;
use App\Models\Role;
class ValidationStockController extends Controller
{
    public function index()
    {
        // Vérifier les permissions
        if (Auth::user()->cannot('viewAny', Stock::class)) {
            abort(403);
        }
    
        $user = Auth::user();
        $userRole = RoleUser::where('user_id', $user->id)->first();
    
        // Vérifier si l'utilisateur a un rôle assigné
        if (!$userRole) {
            session()->flash('error', "L'utilisateur n'a pas de rôle assigné.");
            return redirect()->route('directeurcentrale.stock');
        }
    
        // Récupérer le rôle de l'utilisateur
        $role = Role::find($userRole->role_id);
    
        if ($role->role == 'Coordinateur régional') {
            // Si l'utilisateur est un coordinateur régional, filtrer par région
            if (!$user->region_id) {
                session()->flash('error', "Le coordinateur régional n'a pas de région assignée.");
                return redirect()->route('directeurcentrale.stock');
            }
    
            // Récupérer les stocks dont la délégation correspond à la région du coordinateur
            $stocks = Stock::with('equipements', 'delegations', 'regions')
                ->join('delegations', 'stocks.delegation_id', '=', 'delegations.id')
                ->where('delegations.region_id', $user->region_id)
                ->select('stocks.*')
                ->paginate(8);
    
        } else {
            // Logique pour les délégués provinciaux
            if (!$userRole->delegation_id) {
                session()->flash('error', "L'utilisateur n'a pas de délégation assignée.");
                return redirect()->route('directeurcentrale.stock');
            }
    
            $delegationId = $userRole->delegation_id;
    
            // Récupérer les stocks par délégation
            $stocks = Stock::with('equipements', 'delegations', 'regions')
                ->where('delegation_id', $delegationId)
                ->paginate(8);
        }
    
        // Passer les stocks à la vue
        return view('agentcoaph.validationStock.index', ['stocks' => $stocks]);
    }
    



    public function view($id)
    {
        $states = ['En cours de traitement','Confirmé','Rejeté'];
        $stock = Stock::with('equipements','delegations')->find($id);
        return view('agentcoaph.validationStock.view',['stock'=>$stock,'states'=>$states]);
    }
    public function update($id,Request $request)
    {
        Stock::find($id)->update(['status'=>$request->status]);
        //  dd($request->status);
        return redirect()->route('agentcoaph.stock');
    }
}
