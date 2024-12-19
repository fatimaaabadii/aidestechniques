@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Demandeurs')}}</h5>
                    </div>
                    <div class="flex-shrink-0" >
                        <div class="page-options ms-auto" style="margin: 10% 0;">
                            {{-- <a href="{{ route('agentcoaph.beneficiers.create') }}" class="btn btn-primary">+ {{__('Ajouter')}} </a> --}}
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('Réf')}}</th>
                                    <th class="text-center">{{__('Demandeur')}}</th>
                                    <th class="text-center">{{__('CIN')}}</th>
                                    <th class="text-center">{{__('Email')}}</th>
                                    <th class="text-center">{{__('Tél')}}</th>
                                    <th class="text-center">{{__('Adresse')}}</th>
                                    <th class="text-center">{{__('Sexe')}}</th>
                                    <th class="text-center">{{__('Milieu')}}</th>
                                    <th class="text-center">{{__('Date de rendez vous')}}</th>
                                    {{-- <th class="text-center">{{__('Délégation')}}</th> --}}
                                    <th class="text-center">{{__('Type de handicap')}}</th>
                                    <th class="text-center">{{__('Couverture Sociale')}}</th>
                                    <th class="text-center">{{__('Aide technique')}}</th>
                                    {{-- <th class="text-center">{{__('Phone')}}</th> --}}
                                    <th class="text-center">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beneficiers as $beneficier)

                                
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$beneficier->id}}</div>
                                        </div>
                                    </td>
                                        <td class="text-center">{{$beneficier->name}}</td>
                                    <td class="text-center">{{$beneficier->cin}}</td>
                                    <td class="text-center">{{$beneficier->email}}</td>
                                    <td class="text-center">{{$beneficier->phone}}</td>
                                    <td class="text-center">{{$beneficier->address}}</td>
                                    <td class="text-center">
                                        @if($beneficier->sexe == 1)
                                        {{__('Homme')}}
                                        @else
                                        {{__('Femme')}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($beneficier->milieu == 1)
                                        {{__('Urbain')}}
                                        @else
                                        {{__('Rurale')}}
                                        @endif
                                    </td>
                                    <td class="text-center">{{$beneficier->date_RDV}}</td>
                                    {{-- <td class="text-center">{{$beneficier->delegations->label}}</td>                                --}}
                                    <td class="text-center">{{$beneficier->disabilities->label}}</td>
                                    <td class="text-center">{{$beneficier->typeofconverages->label}}</td>
                                    <td class="text-center">{{$beneficier->equipements->label}}</td>
                                    <td class="text-center">
                                            <div class="btn-group align-top">
                                                <a href="{{ route('agentcoaph.beneficiers.edit', $beneficier->id) }}" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">{{__('Modifier')}} </a>
                                                    <a data-bs-target="#modaldemo{{$beneficier->id}}" data-bs-toggle="modal" class="btn btn-sm btn-primary badge" ><i class="fa fa-trash"></i></a>
                                            </div>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                        {{$beneficiers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @foreach ($beneficiers as $beneficier)
    <div class="modal fade" id="modaldemo{{$beneficier->id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger">{{__('VoulezSupprimer')}} : {{$beneficier->name}} </h4>
                <form action="{{ route('agentcoaph.beneficiers.delete', $beneficier->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal">{{__('Deleted')}} !</button>
                </form>
            </div>
        </div>
    </div>
</div>
    @endforeach
@endsection
