@extends('layouts.master')

@section('content')
<div class="container">
<div class="row">

    <div class="card">
        <div class="card-body pb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-2">{{__('Aides Technique')}}</h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="page-options ms-auto" style="margin: 10% 0;">
                        <a href="{{ route('servicetechnique.equipements.create') }}" class="btn btn-primary">+ {{__('Ajouter')}} </a>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="table-responsive">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">{{__('Id')}}</th>
                                <th class="text-center">{{__('Nom de l\'équipement')}}</th>
                                <th class="text-center">{{__('Code barres')}}</th>
                                <th class="text-center">{{__('Type')}}</th>
                                <th class="text-center">{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipements as $equipement)
                                
                            <tr>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1">{{$equipement->id}}</div>
                                    </div>
                                </td>
                                <td class="text-center">{{$equipement->label}}</td>
                                <td class="text-center">{{$equipement->barcode}}</td>
                                <td class="text-center">{{$equipement->typeofequipements->label}}</td>                            
                                <td class="text-center">
                                        <div class="btn-group align-top">
                                            <a href="{{ route('servicetechnique.equipements.edit', $equipement->id) }}" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">{{__('Modifier')}} </a> 
                                                <a data-bs-target="#modaldemo{{$equipement->id}}" data-bs-toggle="modal" class="btn btn-sm btn-primary badge" ><i class="fa fa-trash"></i></a>
                                        </div>
                                </td>
                            </tr>
                            
                            @endforeach
                            

                        </tbody>
                    </table>
                    {{$equipements->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@foreach ($equipements as $equipement)
    <div class="modal fade" id="modaldemo{{$equipement->id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger">{{__('VoulezSupprimer')}} : {{$equipement->label}} </h4>
                <form action="{{ route('servicetechnique.equipements.destroy', $equipement->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal">{{__('Supprimer')}} !</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection