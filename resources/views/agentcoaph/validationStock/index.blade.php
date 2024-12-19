@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Validation du Stock aide technique')}}</h5>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('Réf')}}</th>
                                    <th class="text-center">{{__('Délégation')}}</th>
                                    <th class="text-center">{{__('aide technique')}}</th>
                                    <th class="text-center">{{__('Quantité')}}</th>
                                    <th class="text-center">{{__('Status')}}</th>
                                    <th class="text-center">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)

                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$stock->id}}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$stock->delegations->label}}</td>
                                    <td class="text-center">{{$stock->equipements->label}}</td>
                                    <td class="text-center">{{$stock->quantity}}</td>
                                    <td class="text-center"><span class="badge bg-@if($stock->status == 'En cours de traitement')warning
                                        @elseif($stock->status == 'Confirmé')success
                                        @elseif($stock->status == 'Rejeté')danger @endif
                                        ">
                                        {{$stock->status}}
                                    </span>
                                        </td>
                                    <td class="text-center">
                                            <div class="btn-group align-top">
                                                <a href="{{ route('agentcoaph.stock.view', $stock->id) }}" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">{{__('Voir')}} </a>
                                            </div>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                        {{$stocks->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
