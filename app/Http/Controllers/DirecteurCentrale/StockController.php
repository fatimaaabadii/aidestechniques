<?php

namespace App\Http\Controllers\DirecteurCentrale;

use App\Http\Controllers\Controller;
use App\Models\Delegation;
use App\Models\Equipement;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUser;
use App\Models\Role;


class StockController extends Controller
{
   


    public function index()
{
    // Vérifier les permissions pour la gestion des stocks
    if (Auth::user()->cannot('viewAny', Stock::class) && Auth::user()->cannot('viewAnyStock', Stock::class)) {
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

    if ($role->role === 'Directeur Central') {
        // Si l'utilisateur est Directeur Central, récupérer tous les stocks
        $stocks = Stock::with('equipements', 'delegations', 'regions')
            ->orderBy('created_at', 'desc') // Optionnel: trier par date de création
            ->paginate(8);

        // Optionnel: récupérer également les stocks par région si nécessaire
        $stocksregions = Stock::with('equipements', 'delegations', 'regions')
            ->whereNotNull('region_id')
            ->paginate(8);
    } elseif ($role->role === 'Coordinateur régional') {
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

        // Optionnel: récupérer également les stocks par région pour d'autres cas (si nécessaire)
        $stocksregions = Stock::with('equipements', 'delegations', 'regions')
            ->where('region_id', $user->region_id)
            ->paginate(8);
    } else {
        // Logique pour les délégués provinciaux
        if (!$userRole->delegation_id) {
            //session()->flash('error', "L'utilisateur n'a pas de délégation assignée.");
            return redirect()->route('directeurcentrale.stock');
        }

        $delegationId = $userRole->delegation_id;

        // Récupérer les stocks par délégation
        $stocks = Stock::with('equipements', 'delegations', 'regions')
            ->where('delegation_id', $delegationId)
            ->paginate(8);

        // Optionnel: récupérer les stocks par région associés à cette délégation
        $stocksregions = Stock::with('equipements', 'delegations', 'regions')
            ->where('delegation_id', $delegationId)
            ->whereNotNull('region_id')
            ->paginate(8);
    }

    // Passer les deux variables à la vue
    return view('directeurcentrale.stocks.index', ['stocks' => $stocks, 'stocksregions' => $stocksregions]);
}

    
    






    public function create()
    {
        $equipements = Equipement::all();
        $delegations = Delegation::all();
        return view('directeurcentrale.stocks.create',['equipements'=>$equipements,'delegations'=>$delegations]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'equipement_id' => 'required',
            'delegation_id' => 'required',
            'quantity' => 'required',
        ]);

        $stock= Stock::where('equipement_id', $request->input('equipement_id'))->where('delegation_id' , $request->input('delegation_id'))->first();
        // dd($stock) ;
        if (!$stock == null)
        {
            session()->flash("error","Ce stock existe déjà");
            return redirect()->route('directeurcentrale.stock');
        }else
        {
                $stock = new Stock();
                $stock->equipement_id=$request->input('equipement_id');
                $stock->delegation_id=$request->input('delegation_id');
                $stock->quantity=$request->input('quantity');
                $stock->save();
                session()->flash("success","Le stock a été ajouté avec succès ! ");
                return redirect()->route('directeurcentrale.stock');
        }
    }
    public function edit($id)
    {
        $stock = Stock::find($id);
        $equipements = Equipement::all();
        $delegations = Delegation::all();
        return view('directeurcentrale.stocks.edit',['stock'=>$stock,'equipements'=>$equipements,'delegations'=>$delegations]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'equipement_id' => 'required',
            'delegation_id' => 'required',
            'quantity' => 'required',
            ]);
            $stock =Stock::find($id);


            $stock->equipement_id = $request->equipement_id;
            $stock->delegation_id = $request->delegation_id;
            $stock->quantity = $request->quantity;

           $stock->save();
           session()->flash("success","Le stock a été modifié avec succès ! ");
           return redirect()->route('directeurcentrale.stock');
    }
    public function destroy($id)
    {
        $stock = Stock::find($id);

        $stock->delete();
        return redirect()->route('directeurcentrale.stock');
    }


}
