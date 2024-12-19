<?php

namespace App\Http\Controllers\Beneficier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Region;
use App\Models\Typeofcoverage;
use App\Models\Delegation;
use App\Models\Equipement;
use App\Models\Beneficier;
use App\Models\Demand;
use App\Models\Disabilitie;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class BeneficierController extends Controller
{
    public function home()
    {
        return view('home');
    }


    public function demmand()
    {
        $coverageTypes = Typeofcoverage::all();
        $delegations = Delegation::all();
        $equipements = Equipement::with('typeofequipements')->get();
        $disabilities = Disabilitie::all();


        return view('demmand', [
            // 'regions'       =>  $regions,
            'coverageTypes' =>  $coverageTypes,
            'delegations'   =>  $delegations,
            'equipements'   =>  $equipements,
            'disabilities'  =>  $disabilities
        ]);
    }


    public function store(Request $request)
    {
        $rules = [
            'fullName' => 'required|string|max:255',
            'cin' => 'required|string|max:255|unique:beneficiers,cin',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'sexe' => ['required', Rule::in(['male', 'female'])],
            'birthday' => 'required|date',
            // 'region' => 'required|exists:regions,id',
            'delegation' => 'required|exists:delegations,id',
            'coverage' => 'required|exists:type_of_coverages,id',
            'handicap' => 'required|exists:disabilities,id',
            'equipement' => 'required|exists:equipements,id',
            // Add more rules as needed
        ];

        // Validate the request
        $validatedData = $request->validate($rules);
        // dd($request->all());

        $beneficier = new Beneficier;
        $beneficier->name                   =   $request->fullName;
        $beneficier->cin                    =   $request->cin;
        $beneficier->email                  =   $request->email;
        $beneficier->phone                  =   $request->phone;
        $beneficier->address                =   $request->adress;
        $beneficier->type_health_coverage   =   $request->coverage;
        $beneficier->delegation_id          =   $request->delegation;
        $beneficier->disabilitie_id         =   $request->handicap;
        $beneficier->equipement_id          =   $request->equipement;
        $beneficier->sexe                   =   $request->sexe;
        $beneficier->image                  =   uploadFile($request->handcapImage, 'beneficier');
        $beneficier->document               =   uploadFile($request->hanciapCertificate, 'beneficier');
        $beneficier->equipement_id          =   $request->equipement;
        $beneficier->save();


        $region_id = Delegation::where('id', $request->delegation )->first();
        // return ($region_id);
        // dd($region_id);
        $region_id=$region_id->region_id;

        $region = Region::where('id',$region_id)->first();
        $abre=$region->abbreviation;
        $year= Carbon::now()->format('Y');

        $demmand = new Demand;
        $demmand->beneficier_id =   $beneficier->id;
        $demmand->equipement_id =   $beneficier->equipement_id ;
        $demmand->delegation_id =   $beneficier->delegation_id;
        $demmand->by_platform = 1;
        $demmand->save();

        $ref = "{$demmand->id}/{$abre}/{$year}";
        $demmand->reference = $ref;
        $demmand->save();

        $d = Demand::find($demmand->id);
        return view('track', [
            'demmand' => $d
        ]);
    }


    public function suivi()
    {
        return view('suivi');
    }


    public function track(Request $request)
    {
        $rules = [
            'trackNumber' => 'required',
            'cin' => 'required',
        ];

        // Validate the request
        $validatedData = $request->validate($rules);


        $demmand = Demand::with('beneficiers')->where('reference', $request->trackNumber)->first();


        if($demmand)
        {
            if($demmand->beneficiers->cin == $request->cin)
            {
                return view('track', [
                    'demmand' => $demmand
                ]);
            }else{
                return redirect()->route('demand.suivi')
                    ->with('message', 'C.I.N incorrect');
            }
        }
        return redirect()->route('demand.suivi')
            ->with('message', "Code de suivi n existe pas");
    }



    public function downloadFile($type, $beneficiaryId)
{
    $beneficiary = Beneficier::findOrFail($beneficiaryId);

    $filePath = '';
    $fileName = '';

    switch ($type) {
        case 'cin':
            $filePath = $this->fixFilePath($beneficiary->image_cin);
            break;
        case 'image':
            $filePath = $this->fixFilePath($beneficiary->image);
            break;
        case 'document':
            $filePath = $this->fixFilePath($beneficiary->document);
            break;
        default:
            abort(404, 'File type not found');
    }

    

    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    $fileName = $type . '_' . $beneficiary->name . '.' . $extension;

    return response()->download($filePath, $fileName);
}

private function fixFilePath($filePath)
{
    // Supprime la première occurrence de 'storage/' pour éviter la répétition
    $correctedFilePath = preg_replace('/^storage\//', '', $filePath);

    // Ajoute le chemin correct vers le répertoire de stockage
    return storage_path('app/public/' . $correctedFilePath);
}


}
