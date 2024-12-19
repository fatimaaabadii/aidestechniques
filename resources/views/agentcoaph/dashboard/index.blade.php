@extends('layouts.master')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        {{-- <div class="card-body pb-3">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-2">Stock</h5>
                                </div>


                                equiepement
                            </div>

                            <div class="">
                                <div class="table-responsive">
                                    <table id="tableDash"
                                        class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 210px">Equipement</th>
                                                <th scope="col">Barre code</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Date de Creation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($equipements as $e)

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-3">
                                                            <img src="{{ $e->image == null ? asset('assets/ann.jpg') : asset($e->image) }}" alt=""
                                                                class="avatar rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1">{{ $e->label }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0">

                                                        <div class="flex-grow-1">{{ $e->barcode }}</div>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0">

                                                        {{ $e->stocks->first() ? $e->stocks->first()->quantity : 0 }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <span>
                                                        {{ $e->created_at }}
                                                    </span>
                                                </td>

                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}



                        <div class="">
                            <div class="table-responsive">
                                <table id="trans" class="display">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{__('Réf')}}</th>
                                            <th class="text-center">{{__('Demandeur')}}</th>
                                            <th class="text-center">{{__('Délégation')}}</th>
                                            <th class="text-center">{{__('Équipement')}}</th>
                                            
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
                                                    Refusée
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


                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body" style="position: relative;">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    {{-- <h5 class="card-title mb-2">Modèle Diag 2</h5> --}}
                                </div>

                            </div>
                             <h2 class="font-size-15 me-2 mb-8"> Répartition des demandes par statut </h2>
                           
                            <div id="chart-donut"
    data-colors='["#D7BDE2", "#A9DFBF", "#F5B7B1"]'
     class="apex-charts" dir="ltr" style="min-height: 265.7px;">
    <canvas id="chartId" aria-label="chart" style="width: 100%; height:100%"></canvas>
</div>

                            <div class="mt-4">
                            <h2 class="font-size-15 me-2"> Résumé des demandes par origine </h2>
                               
                                <div class="order-wid-list d-flex justify-content-between">
                                    <p class="mb-0"><i
                                            class="mdi mdi-square-rounded font-size-10 text-danger me-2"></i>
                                            Demandes totales
                                    </p>
                                    <div>
                                        <span class="pe-5">
                                            {{ $demmands->count() }}
                                        </span>

                                    </div>
                                </div>
                            </div>

                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 516px; height: 461px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        <i class="mdi mdi-heart text-danger"></i> 
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>

// tableDash

        $(document).ready(function(){
            $('#tableDash').DataTable({
                processing: true,
                "pageLength": 8,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json',
                },

            });
        })
        var chrt = document.getElementById("chartId").getContext("2d");

        var enregistrer = {{ $demmands->where('status', '=', 'En cours de traitement')->count() }};
        var validee  = {{ $demmands->where('status', '=', 'Confirmée')->count() }};
        var rejetee = {{ $demmands->where('status', '=', 'Rejetée')->count() }};


        var chartId = new Chart(chrt, {
            type: 'doughnut',
            data: {
                labels: ["Enregistrées", "Validées", "Rejetées"],
                datasets: [{
                    label: "online tutorial subjects",
                    data: [enregistrer, validee, rejetee],
                    backgroundColor: ['#38A89D', '#6C63FF', '#E74C3C'],
                    hoverOffset: 5
                }],
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                }
            }
        });
    </script>
</div>
@endsection
