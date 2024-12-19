<?php

namespace App\Http\Controllers\ServiceTechnique;

use App\Http\Controllers\Controller;
use App\Models\Delegation;
use App\Models\Disabilitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisabilitieController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Disabilitie::class)) {
            abort(403);
        } 
        $disabilities = Disabilitie::with('delegations')->paginate(8);
        return view('servicetechnique.disabilities.index',['disabilities'=>$disabilities]);
    }

    public function create()
    {
        $delegations = Delegation::all();
        return view('servicetechnique.disabilities.create',['delegations'=>$delegations]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'delegation_id' => 'required',
            

        ]);


        $disabilitie = new Disabilitie();
        $disabilitie->label = $request->label;
        $disabilitie->delegation_id = $request->delegation_id;
        $disabilitie->save();
        return redirect()->route('servicetechnique.disabilitie');
    }

    public function edit($id)
    {
        $disabilitie = Disabilitie::find($id);
        $delegations = Delegation::all();
        return view('servicetechnique.disabilities.edit',['disabilitie'=>$disabilitie,'delegations'=>$delegations]);
    }

    public function update(Request $request,$id)
    {
            $disabilitie = Disabilitie::find($id);
            $disabilitie->label = $request->label;
            $disabilitie->delegation_id = $request->delegation_id;
            $disabilitie->save();
            return redirect()->route('servicetechnique.disabilitie');
    }

    public function destroy($id)
    {
        $disabilitie = Disabilitie::find($id);
        
        $disabilitie->delete();
        return redirect()->route('servicetechnique.disabilitie');
    }

}
