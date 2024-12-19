<?php

namespace App\Http\Controllers\ServiceTechnique;

use App\Http\Controllers\Controller;
use App\Models\Typeofequipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeEquipementController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Typeofequipement::class)) {
            abort(403);
        } 
        $typeequipements = Typeofequipement::paginate(8);
        return view('servicetechnique.typeequipements.index',['typeequipements'=>$typeequipements]);
    }
    public function create()
    {
        return view('servicetechnique.typeequipements.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
        ]); 
            $typeequipement = new Typeofequipement();
            $typeequipement->label = $request->label;
            
            $typeequipement->save();

            return redirect()->route('servicetechnique.TypeEquipement');

    }
    public function edit($id)
    {
        $typeequipement = Typeofequipement::find($id);
        return view('servicetechnique.typeequipements.edit',['typeequipement'=>$typeequipement]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'label' => 'required',
        ]);
        
        $typeequipement = Typeofequipement::find($id);
        $typeequipement->label = $request->label;
        $typeequipement->save();
        return redirect()->route('servicetechnique.TypeEquipement');
    }
    public function destroy($id)
    {
        $typeequipement = Typeofequipement::find($id);
        $typeequipement->delete();
        return redirect()->route('servicetechnique.TypeEquipement');
    }

}
