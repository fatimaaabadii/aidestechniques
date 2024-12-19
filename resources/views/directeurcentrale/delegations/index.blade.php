@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">Les Délégations</h4>


                </div><!-- end card header -->
                <div class="card-body">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th>
                                    Délégation
                                </th>
                                <th>Région</th>
                                <th>Téléphone</th>
                                <th>Téléphone Fix</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($delegations as $delagation)
                            <tr>
                                <td>
                                    <a href="{{ route('directeurcentrale.delegations.detail', $delagation->id) }}">
                                        {{ $delagation->label }}
                                    </a>
                                </td>
                                <td>{{ $delagation->region->label }}</td>
                                <td>{{ $delagation->phone_1 }}</td>
                                <td>{{ $delagation->fix ?? '--------' }}</td>
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
