<?php

namespace App\Http\Controllers\agentCOAPH;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Stock;
use App\Models\RoleUser;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandController extends Controller
{
    public function index() 
{
    if (Auth::user()->cannot('viewAny', Demand::class)) {
        abort(403);
    }

    $userRole = RoleUser::where('user_id', Auth::user()->id)->first();

    // Vérifier si l'utilisateur est un Directeur Central
    if ($userRole && $userRole->role_id) {
        $role = Role::find($userRole->role_id);

        if ($role->role === 'Directeur Central') {
            // Si l'utilisateur est Directeur Central, récupérer toutes les demandes
            $demands = Demand::with('beneficiers', 'equipements', 'delegations')
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        } else {
            // Pour d'autres rôles, récupérer les demandes selon la délégation
            if (!$userRole->delegation_id) {
                session()->flash('error', "L'utilisateur n'a pas de délégation assignée.");
                return redirect()->route('agentcoaph.demands.index');
            }

            $demands = Demand::with('beneficiers', 'equipements', 'delegations')
                ->where('delegation_id', '=', $userRole->delegation_id)
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        }
    } else {
        session()->flash('error', "L'utilisateur n'a pas de rôle assigné.");
        return redirect()->route('agentcoaph.demands.index');
    }

    return view('agentcoaph.demands.index', ['demands' => $demands]);
}



public function view($id)
    {
        $states = ['En cours de traitement','Confirmée','Rejetée'];
        $demand = Demand::with('beneficiers','equipements','delegations')->find($id);
        return view('delegueprovincial.validationdemand.view',['demand'=>$demand,'states'=>$states]);
    }
    
    public function update($id,Request $request)
    {
       // dd('Méthode update exécutée', $id, $request->status);
        Demand::find($id)->update(['status'=>$request->status]);
        return redirect()->route('agentcoaph.demands.index');
    }
}