<?php

namespace App\Http\Controllers\ServiceTechnique;

use App\Http\Controllers\Controller;
use App\Models\Typeofcoverage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeCoverageController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Typeofcoverage::class)) {
            abort(403);
        } 
        $typecoverages = Typeofcoverage::paginate(8);
        return view('servicetechnique.typecoverages.index',['typecoverages'=>$typecoverages]);
    }
    public function create()
    {
        return view('servicetechnique.typecoverages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
        ]); 
            $typecoverage = new Typeofcoverage();
            $typecoverage->label = $request->label;
            
            $typecoverage->save();

            return redirect()->route('servicetechnique.TypeCoverage');

    }
    public function edit($id)
    {
        $typecoverage = Typeofcoverage::find($id);
        return view('servicetechnique.typecoverages.edit',['typecoverage'=>$typecoverage]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'label' => 'required',
        ]);
        
        $typecoverage = Typeofcoverage::find($id);
        $typecoverage->label = $request->label;
        $typecoverage->save();
        return redirect()->route('servicetechnique.TypeCoverage');
    }
    public function destroy($id)
    {
        $typecoverage = Typeofcoverage::find($id);
        $typecoverage->delete();
        return redirect()->route('servicetechnique.TypeCoverage');
    }

}
