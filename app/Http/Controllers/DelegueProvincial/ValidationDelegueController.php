<?php

namespace App\Http\Controllers\DelegueProvincial;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\Delegation;

class ValidationDelegueController extends Controller
{
    
    public function index()
    {
        if (Auth::user()->cannot('viewDemand', Demand::class)) {
            abort(403);
        }

        $user = Auth::user();
        $userRole = RoleUser::where('user_id', $user->id)->first();

        if (!$userRole) {
            session()->flash('error', "L'utilisateur n'a pas de rôle assigné.");
            return redirect()->route('delegueprovincial.validationdemand.index');
        }

        $role = Role::find($userRole->role_id);
        
        if ($role->role == 'Coordinateur régional') {
            if (!$user->region_id) {
                session()->flash('error', "Le coordinateur régional n'a pas de région assignée.");
                return redirect()->route('delegueprovincial.validationdemand.index');
            }
            
           // Log::info("Region ID du coordinateur: " . $user->region_id);
            // Récupérer toutes les demandes dont la délégation correspond à la région du coordinateur
            $demands = Demand::with('beneficiers', 'equipements', 'delegations')
                ->join('delegations', 'demands.delegation_id', '=', 'delegations.id')
                ->where('delegations.region_id', $user->region_id)
                ->where('demands.status', '=', 'Confirmée')
                ->select('demands.*')
                ->paginate(8);

                //Log::info("Nombre de demandes trouvées: " . $demands->count());
                
            
            foreach ($demands as $demand) {
                //Log::info("Demande ID: " . $demand->id . ", Délégation ID: " . $demand->delegation_id . ", Statut: " . $demand->status);
                
            }
        } 
        
        
        else {
            // Logique existante pour les délégués provinciaux
            if (!$userRole->delegation_id) {
                session()->flash('error', "L'utilisateur n'a pas de délégation assignée.");
                return redirect()->route('delegueprovincial.validationdemand.index');
            }

            $delegationId = $userRole->delegation_id;

            $demands = Demand::with('beneficiers', 'equipements', 'delegations')
                ->where('delegation_id', $delegationId)
                ->where('status', '=', 'Confirmée')
                ->paginate(8);

               // dd($demands);
        }

        return view('delegueprovincial.validationdemand.index', ['demands' => $demands]);
    }














    public function view($id)
    {
        $states = ['En cours de traitement','Confirmée','Rejetée'];
        $demand = Demand::with('beneficiers','equipements','delegations')->find($id);
        return view('delegueprovincial.validationdemand.view',['demand'=>$demand,'states'=>$states]);
    }
    
    public function update($id,Request $request)
    {
        $userRole = RoleUser::where('user_id', Auth::user()->id)->first();
    $role = $userRole ? Role::find($userRole->role_id) : null;

    $demand = Demand::find($id); // Trouver la demande

    // Vérifier le rôle pour mettre à jour le bon champ
    if ($role && $role->role == 'Coaph') {
        // Met à jour uniquement le champ 'status'
        $demand->update(['status' => $request->status]);
    } elseif ($role && $role->role == 'Délégué provincial') {
        // Met à jour uniquement le champ 'status_delegue'
        $demand->update(['status_delegue' => $request->status_delegue]);
        return redirect()->route('delegueprovincial.demand');
    }
        //Demand::find($id)->update(['status'=>$request->status]);
       // $demand = Demand::with('beneficiers','equipements','delegations')->find($id);
         $states = ['En cours de traitement','Confirmée','Rejetée'];
       // return view('delegueprovincial.demand',['demand'=>$demand,'states'=>$states]);
       return redirect()->route('agentcoaph.demand');
    }
}
