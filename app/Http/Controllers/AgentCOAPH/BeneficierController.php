<?php

namespace App\Http\Controllers\AgentCOAPH;

use App\Http\Controllers\Controller;
use App\Models\Beneficier;
use App\Models\Delegation;
use App\Models\Demand;
use App\Models\Disabilitie;
use App\Models\Equipement;
use App\Models\Region;
use App\Models\RoleUser;
use App\Models\Typeofcoverage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Event\Code\Test;
use Illuminate\Support\Facades\File;

class BeneficierController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Beneficier::class)) {
            abort(403);
        }
        $user = RoleUser::where('user_id',Auth::user()->id)->get();
        $beneficiers = Beneficier::with('delegations','user','disabilities','typeofconverages','equipements')
            ->where('delegation_id',$user[0]->delegation_id)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('agentcoaph.beneficiers.index',['beneficiers'=>$beneficiers]);
    }

    public function create()
    {

        $user = RoleUser::where('user_id',Auth::user()->id)->get();
        $disablities = Disabilitie::all();
        $delegations = Delegation::where('id',$user[0]->delegation_id)->get();
        $typeofcoverages = Typeofcoverage::all();
        $equipements = Equipement::all();
        //        dd($typeofcoverages);
        return view('agentcoaph.beneficiers.create',['disablities'=>$disablities,'equipements'=>$equipements,'delegations'=>$delegations,'typeofcoverages'=>$typeofcoverages]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cin' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image_cin' => 'required|image',
            'image' => 'required|image',
            'type_health_coverage' => 'required',
            'delegation_id' => 'required',
            'disabilitie_id' => 'required',
            'sexe' => 'required',
            'milieu' => 'required',
            'date_RDV' => 'required',
            'document' => 'required|file|mimes:pdf,doc,docx',

        ]);
        // dd('test');

        $beneficier = new Beneficier();
        $beneficier->name = $request->name;
        $beneficier->cin = $request->cin;
        $beneficier->email = $request->email;
        $beneficier->phone = $request->phone;
        $beneficier->address = $request->address;

        $cin_path =  uploadFile($request->image_cin,'beneficier/images/');
        $beneficier->image_cin = $cin_path;

        $image_path = uploadFile($request->image,'beneficier/images/');
        $beneficier->image = $image_path;
        // dd('test');

        // $files = uploadFile($request->document,'beneficier/files/');
        // $beneficier->document = $files;

        /*$files = $request->file('document');
        foreach ($files as $file) {
            $beneficier->document = $request->document;
        }*/

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $document_path = uploadFile($file, 'beneficier/files/');
            $beneficier->document = $document_path;
        }
        $beneficier->sexe = $request->sexe;
        $beneficier->milieu = $request->milieu;
        $beneficier->date_RDV = $request->date_RDV;


        $beneficier->type_health_coverage = $request->type_health_coverage;
        $beneficier->delegation_id = $request->delegation_id;
        $beneficier->equipement_id = $request->equipement_id;
        $beneficier->disabilitie_id = $request->disabilitie_id;


        // dd($beneficier);
        // dd($beneficier);
        $beneficier->save();
        $demand = new Demand();
        $demand->beneficier_id = $beneficier->id;
        $demand->equipement_id = $beneficier->equipement_id;
        $demand->delegation_id = $beneficier->delegation_id;
        $demand->save();

        $region_id = Delegation::where('id', $request->delegation_id )->first();
        // return ($region_id);
        $region_id=$region_id->region_id;

        $region = Region::where('id',$region_id)->first();
        $abre=$region->abbreviation;
        $year= Carbon::now()->format('Y');
        $ref = "{$demand->id}/{$abre}/{$year}";
        $demand->reference = $ref;
        $demand->save();
        // dd($ref);

        return redirect()->route('agentcoaph.beneficiers');
        }
        public function edit($id)
        {
            $beneficier = Beneficier::find($id);
            $user = RoleUser::where('user_id',Auth::user()->id)->get();
            $disabilities = Disabilitie::all();
            $delegations = Delegation::where('id',$user[0]->delegation_id)->get();
            $typeofcoverages = Typeofcoverage::all();
            $equipements = Equipement::all();
            //            dd($beneficier);
            return view('agentcoaph.beneficiers.edit',['beneficier'=>$beneficier,'equipements'=>$equipements,'disabilities'=>$disabilities,'delegations'=>$delegations,'typeofcoverages'=>$typeofcoverages]);
        }

        public function update(Request $request,$id)
        {
                $beneficier = Beneficier::find($id);
                $beneficier->name = $request->name;
                $beneficier->cin = $request->cin;
                $beneficier->email = $request->email;
                $beneficier->phone = $request->phone;
                $beneficier->address = $request->address;

                $cin_path = $beneficier->image_cin;
                if($request->image_cin)
                {
                    $cin_path =  uploadFile($request->image_cin,'beneficier/images/');
                    $beneficier->image_cin = $cin_path;
                }


                $image_path = $beneficier->image;
                if($request->image)
                {
                    $image_path = uploadFile($request->image,'beneficier/images/');
                    $beneficier->image = $image_path;
                }
                 if ($request->hasFile('image_cin')) {
        $cin_path = uploadFile($request->image_cin, 'beneficier/images/');
        $beneficier->image_cin = $cin_path;
    }

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $image_path = uploadFile($request->image, 'beneficier/images/');
        $beneficier->image = $image_path;
    }

    // Gestion du document
    if ($request->hasFile('document')) {
        $document_path = uploadFile($request->document, 'beneficier/files/');
        $beneficier->document = $document_path;
    }

                $beneficier->equipement_id = $request->equipement_id;
                $beneficier->type_health_coverage = $request->type_health_coverage;
                $beneficier->delegation_id = $request->delegation_id;
                $beneficier->disabilitie_id = $request->disabilitie_id;
                // dd($beneficier);
                $beneficier->save();

                $demand = Demand::find($id);
                $demand->beneficier_id = $beneficier->id;
                $demand->equipement_id = $beneficier->equipement_id;
                $demand->delegation_id = $beneficier->delegation_id;
                $demand->save();

                $region_id = Delegation::where('id', $request->delegation_id )->first();
                // return ($region_id);
                $region_id=$region_id->region_id;

                $region = Region::where('id',$region_id)->first();
                $abre=$region->abbreviation;
                $year= Carbon::now()->format('Y');
                $ref = "{$demand->id}/{$abre}/{$year}";
                $demand->id = $ref;
                $demand->save();
                return redirect()->route('agentcoaph.beneficiers');
        }


        public function destroy($id)
        {
            $beneficier = Beneficier::find($id);

            $beneficier->delete();
            return redirect()->route('agentcoaph.beneficiers');
        }
        




        public function downloadFile($type, $beneficiaryId)
        {
            $beneficiary = Beneficier::findOrFail($beneficiaryId);
        
            $filePath = '';
            $fileName = '';
        
            switch ($type) {
                case 'cin':
                    $filePath = storage_path('app/public/' . $beneficiary->image_cin);
                    break;
                case 'image':
                    $filePath = storage_path('app/public/' . $beneficiary->image);
                    break;
                case 'document':
                    $filePath = storage_path('app/public/' . $beneficiary->document);
                    break;
                default:
                    abort(404);
            }
        
            // Débogage
            \Log::info('File path: ' . $filePath);
            \Log::info('File exists: ' . (File::exists($filePath) ? 'Yes' : 'No'));
        
            if (!File::exists($filePath)) {
                abort(404);
            }
        
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
            $fileName = $type . '_' . $beneficiary->name . '.' . $extension;
        
            return response()->download($filePath, $fileName);
        }
}
