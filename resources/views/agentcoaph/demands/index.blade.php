@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Demandes')}}</h5>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('Réf')}}</th>
                                    <th class="text-center">{{__('Demandeur')}}</th>
                                    <th class="text-center">{{__('Délégation')}}</th>
                                    <th class="text-center">{{__('Aide technique')}}</th>
                                    
                                    <th class="text-center">{{__('Date de Création')}}</th>
                                    <th class="text-center">{{__('Date de livraison')}}</th>
                                    <th class="text-center">{{__('Status')}}</th>
                                    <th class="text-center">{{__('Status Délégué')}}</th>
                                    <th class="text-center">{{__('Justification')}}</th>
                                    <th class="text-center">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($demands as $demand)
                                <?php
    $backgroundColor = ''; // Aucune couleur appliquée
?>

                                <tr class="" style="{{ $backgroundColor }}">
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$demand->reference}}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$demand->beneficiers->name}}</td>
                                    <td class="text-center">{{$demand->delegations->label}}</td>
                                    <td class="text-center">{{$demand->equipements->label}}</td>
                                    
                                    <td class="text-center">{{\Carbon\Carbon::parse($demand->beneficiers->created_at)->format('d/m/Y H:s')}} </td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($demand->date_livraison)->format('d/m/Y H:s')}} </td>
                                    <td class="text-center"><span class="badge bg-@if($demand->status == 'En cours de traitement')warning
                                        @elseif($demand->status == 'Confirmée')success
                                        @elseif($demand->status == 'Rejetée')danger @endif
                                        ">

                                        @if($demand->status == 'En cours de traitement')
                                            En cours de traitement
                                        @elseif($demand->status == 'Confirmée')
                                            Confirmée
                                        @elseif($demand->status == 'Rejetée')
                                              Rejetée
                                            @endif
                                    </span>
                                        </td>

                                        <td class="text-center">
                                        <span class="badge bg-@if($demand->status_delegue == 'En cours de traitement') warning
                                            @elseif($demand->status_delegue == 'Confirmée') success
                                            @elseif($demand->status_delegue == 'Rejetée') danger @endif">
                                            {{$demand->status_delegue}}
                                        </span>
                                    </td>


                                    <td class="text-center">{{$demand->justification}}</td>
                                    <td class="text-center">
                                            <div class="btn-group align-top">
                                                <a href="{{ route('agentcoaph.demand.view', $demand->id) }}" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">{{__('Voir')}} </a>
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
    <script>
        const demandes = @json($demands); // Convertir les données PHP en JSON
        console.log(demandes); // Afficher les données dans la console du navigateur
    </script>
@endsection
