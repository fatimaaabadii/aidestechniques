<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Equipement;
use App\Models\RoleUser;
use App\Models\Demand;
use App\Models\Delegation;
use App\Models\Region;
use Auth;
use DB;
class GlobalController extends Controller
{


    public function coaph($role)
    {

        if (Auth::user()->cannot('viewAny', Demand::class)) {
            // dd("hh");
            // abort(403);
        }
        $user = RoleUser::where('user_id',Auth::user()->id)->first();
        //dd($user);
        $demands = Demand::with('beneficiers','equipements','delegations')->where('delegation_id', '=', $user->delegation_id)
        ->orderBy('created_at', 'desc')->paginate(8);

        $user = RoleUser::where('user_id',Auth::user()->id)->first();
        $equipements = Equipement::with(['stocks' => function($q) use ($user) {
            $q->where('stocks.delegation_id', '=', $user->delegation_id);
        }])->get();

        $demmands = Demand::all();

        return view('agentcoaph.dashboard.index', [
            'equipements'   =>  $equipements,
            'demmands'      =>  $demmands,
            'demands'   => $demands
        ]);
    }


    public function coordinateur()
    {
        $user = RoleUser::where('user_id',Auth::user()->id)->first();
        $delegation = Delegation::with('region')->where('id', '=', $user->delegation_id)->first();



        $equipements = Equipement::with(['stocks' => function($q) use ($delegation) {
            $q->where('stocks.region_id', '=', $delegation->region->id);

        }, 'stocks.delegations'])->get();




        $demmands = Demand::all();


        $d = Demand::with(['delegations' => function($q) use ($delegation){

            $q->where('delegations.region_id', '=', $delegation->region->id);

        }, 'equipements', 'beneficiers']);





        return view('coordinationregionale.dashboard.index', [
            'equipements'   =>  $equipements,
            'demmands'      =>  $d->get()
        ]);
    }


    // public function directeur($filters = null)
    // {
    //     $regions = Region::all();

    //     $equipements = Equipement::with(['stocks', 'stocks.delegations'])->get();


    //     $demands = Demand::with('delegations','delegations.region')->select(
    //             '*',
    //             DB::raw('DATEDIFF(updated_at, created_at) as time_difference_days')
    //         )
    //         ->get();
    //     $confirmedDemands = $demands->where('status', 'Confirmed');


    //     // ->select(
    //     //     'id',
    //     //     'status',
    //     //     'created_at',
    //     //     'updated_at',
    //     //     DB::raw('DATEDIFF(updated_at, created_at) as time_difference_days')
    //     // )
    //     // ->get();


    //     // Count demands based on different statuses
    //     $standByDemands = $demands->where('status', 'In processing')->count();
    //     $satisfiedDemands = $demands->where('status', 'Confirmed')->count();
    //     $notSatisfiedDemands = $demands->where('status', 'Rejected')->count();



    //     $sumTimeDifferenceDays = $confirmedDemands->sum('time_difference_days');
    //     $averageDate = $sumTimeDifferenceDays / $confirmedDemands->count();



    //     // Pass data to the view
    //     return view('directeurcentrale.dashboard.index', [
    //         'regions'             => $regions,
    //         'equipements'         => $equipements,
    //         'standByDemands'      => $standByDemands,
    //         'satisfiedDemands'    => $satisfiedDemands,
    //         'notSatisfiedDemands' => $notSatisfiedDemands,
    //         'average' => $averageDate,
    //     ]);
    // }


    public function directeur($filters = null)
    {
        $regions = Region::all();
        $equipements = Equipement::with(['stocks', 'stocks.delegations'])->get();

        $demandsQuery = Demand::with(['delegations', 'delegations.region'])
            ->select('*')
            ->addSelect(DB::raw('DATEDIFF(updated_at, created_at) as time_difference_days'));

        // Apply filters if provided
        if ($filters && isset($filters['region'])) {
            $demandsQuery->whereHas('delegations.region', function ($query) use ($filters) {
                $query->where('id', $filters['region']);
            });
        } elseif ($filters && isset($filters['delegation'])) {
            $demandsQuery->whereHas('delegations', function ($query) use ($filters) {
                $query->where('id', $filters['delegation']);
            });
        }

        $demands = $demandsQuery->get();
        $confirmedDemands = $demands->where('status', 'Confirmée');

        // Count demands based on different statuses
        $standByDemands = $demands->where('status', 'En cours de traitement')->count();
        $satisfiedDemands = $demands->where('status', 'Confirmée')->count();
        $notSatisfiedDemands = $demands->where('status', 'Rejetée')->count();

        $sumTimeDifferenceDays = $confirmedDemands->sum('time_difference_days');
        $averageDate = $confirmedDemands->count() > 0 ? $sumTimeDifferenceDays / $confirmedDemands->count() : 0;

        // Pass data to the view
        return view('directeurcentrale.dashboard.index', [
            'regions'             => $regions,
            'equipements'         => $equipements,
            'standByDemands'      => $standByDemands,
            'satisfiedDemands'    => $satisfiedDemands,
            'notSatisfiedDemands' => $notSatisfiedDemands,
            'average'             => round($averageDate,2),
        ]);
    }

    public function home(Request $request)
    {
        $user = User::with('roles')->find(auth()->id());
        $role = $user->roles->first();




        switch ($role->role) {
            case 'Directeur Central':
                return $this->Directeur($request->all());
            case 'Technicien':
                return $this->Directeur($request->all());
            case 'Délégué provincial':
                return $this->Coaph($role);
            case 'Coaph':
                return $this->Coaph($role);
            case 'Coordinateur régional':
                return $this->Coordinateur();
        }
    }

    public function getRegions(Request $request)
    {


        $delegations = Delegation::where('region_id', '=', intval($request['region_id']))->get();

        return response()->json(array('delegations'=> $delegations), 200);
    }
}
