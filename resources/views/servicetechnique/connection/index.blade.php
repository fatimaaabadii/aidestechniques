@extends('layouts.master')

@section('content')
<div class="container">
<div class="row">

    <div class="card">
        <div class="card-body pb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-2">{{__('Connexion')}}</h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="page-options ms-auto" style="margin: 10% 0;">
                        {{-- <a href="{{ route('servicetechnique.equipements.create') }}" class="btn btn-primary">+ {{__('Ajouter')}} </a> --}}
                    </div>
                </div>
            </div>

            <div class="">
                <div class="table-responsive">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">{{__('Id')}}</th>
                                <th class="text-center">{{__('Nom ')}}</th>
                                <th class="text-center">{{__('Status')}}</th>
                                <th class="text-center">{{__('Date')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loginHistoriques as $loginHistorique)
                                
                            <tr>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1">{{$loginHistorique->id}}</div>
                                    </div>
                                </td>
                                <td class="text-center">{{$loginHistorique->user->name}}</td>
                                <td class="text-center">{{$loginHistorique->loginstatus->name}}</td>
                                <td class="text-center">{{$loginHistorique->created_at}}</td>                            
                                
                            </tr>
                            
                            @endforeach
                            

                        </tbody>
                    </table>
                    {{-- {{$equipements->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection