@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">Stock Aide Technique Transféré</h4>

                    <a href="{{ route('directeurcentrale.transfer.create') }}" class="btn btn-primary w-md">Nouveau Transfert</a>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th>Aide technique</th>
                                <th>Quantité</th>
                                <th>délégation de</th>
                                <th>délégation à</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($transferts as $transfert)
                            <tr>
                                <td>{{$transfert->equipements->label}}</td>
                                <td>{{$transfert->quantity}}</td>
                                <td>{{$transfert->delegationFrom->label}}</td>
                                <td>{{$transfert->delegationTo->label}}</td>
                                <td>{{$transfert->created_at}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</div>
@endsection
