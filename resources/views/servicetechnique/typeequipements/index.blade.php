@extends('layouts.master')

@section('content')
<div class="container">
<div class="row">

    <div class="card">
        <div class="card-body pb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-2">{{__('Type Aide Technique')}}</h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="page-options ms-auto" style="margin: 10% 0;">
                        <a href="{{ route('servicetechnique.TypeEquipement.create') }}" class="btn btn-primary">+ {{__('Ajouter')}} </a>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="table-responsive">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">{{__('Id')}}</th>
                                <th class="text-center">{{__('Type d\'aide technique')}}</th>
                                <th class="text-center">{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($typeequipements as $typeequipement)
                                
                            <tr>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1">{{$typeequipement->id}}</div>
                                    </div>
                                </td>
                                <td class="text-center">{{$typeequipement->label}}</td>                              
                                <td class="text-center">
                                        <div class="btn-group align-top">
                                            <a href="{{ route('servicetechnique.TypeEquipement.edit',$typeequipement->id) }}" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">{{__('Modifier')}} </a> 
                                                <a data-bs-target="#modaldemo{{$typeequipement->id}}" data-bs-toggle="modal" class="btn btn-sm btn-primary badge" ><i class="fa fa-trash"></i></a>
                                        </div>
                                </td>
                            </tr>
                            
                            @endforeach
                            

                        </tbody>
                    </table>
                    {{$typeequipements->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@foreach ($typeequipements as $typeequipement)
    <div class="modal fade" id="modaldemo{{$typeequipement->id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger">{{__('VoulezSupprimer')}} : {{$typeequipement->label}} </h4>
                <form action="{{ route('servicetechnique.TypeEquipement.destroy', $typeequipement->id) }}" method="post">
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