@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Demandes saisies par COAPH')}}</h5>
                    </div>
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('Réf')}}</th>
                                    <th class="text-center">{{__('Demandeur')}}</th>
                                    <th class="text-center">{{__('Aide technique')}}</th>
                                    <th class="text-center">{{__('Délégation')}}</th>
                                    <th class="text-center">{{__('Status Délégué')}}</th>
                                    <th class="text-center">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demands as $demand)
                                <tr>
                                    <td class="text-center">{{$demand->id}}</td>
                                    <td class="text-center">{{$demand->beneficiers->name ?? 'N/A'}}</td>
                                    <td class="text-center">{{$demand->equipements->label ?? 'N/A'}}</td>
                                    <td class="text-center">{{$demand->delegations->label ?? 'N/A'}}</td>
                                    <td class="text-center">
                                        <span class="badge bg-@if($demand->status_delegue == 'En cours de traitement') warning
                                            @elseif($demand->status_delegue == 'Confirmée') success
                                            @elseif($demand->status_delegue == 'Rejetée') danger @endif">
                                            {{$demand->status_delegue}}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group align-top">
                                            <a href="{{ route('delegueprovincial.demand.view', $demand->id) }}" class="btn btn-sm btn-primary badge" type="button">
                                                {{__('Voir')}}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$demands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Injecter les données PHP en JSON dans le script JS --}}
<script>
    var demands = {!! json_encode($demands->items()) !!};

    // Afficher les données dans la console
    console.log(demands);
</script>

@endsection

