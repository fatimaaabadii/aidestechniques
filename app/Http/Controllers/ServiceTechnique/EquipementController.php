<?php

namespace App\Http\Controllers\ServiceTechnique;

use App\Http\Controllers\Controller;
use App\Models\Equipement;
use App\Models\Typeofequipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipementController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Equipement::class)) {
            abort(403);
        } 
        $equipements = Equipement::with('typeofequipements')->paginate(8);
        return view('servicetechnique.equipements.index',['equipements'=>$equipements]);
    }

    public function create()
    {
        $typeequipements = Typeofequipement::all();
        return view('servicetechnique.equipements.create',['typeequipements'=>$typeequipements]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'barcode' => 'required',
            'image' => 'required',
            'type_id' => 'required',
            

        ]);


        $equipement = new Equipement();
        $equipement->label = $request->label;
        $equipement->barcode = $request->barcode;

        $image_equi = uploadFile($request->image,'equipement/images/');
        $equipement->image = $image_equi;

        $equipement->type_id = $request->type_id;
        $equipement->save();
        return redirect()->route('servicetechnique.equipements');
    }

    public function edit($id)
    {
        $equipement = Equipement::find($id);
        $typeequipements = Typeofequipement::all();
        return view('servicetechnique.equipements.edit',['equipement'=>$equipement,'typeequipements'=>$typeequipements]);
    }

    public function update(Request $request,$id)
    {
            $equipement = Equipement::find($id);
            $equipement->label = $request->label;
            $equipement->barcode = $request->barcode;

            $image_equi = $equipement->image;
                if($request->image)
                {
                    $image_equi = uploadFile($request->image,'equipement/images/');
                    $equipement->image = $image_equi;
                }

            $equipement->type_id = $request->type_id;
            $equipement->save();
            return redirect()->route('servicetechnique.equipements');
    }

    public function destroy($id)
    {
        $equipement = Equipement::find($id);
        
        $equipement->delete();
        return redirect()->route('servicetechnique.equipements');
    }
}
