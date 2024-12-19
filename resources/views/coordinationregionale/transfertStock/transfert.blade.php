@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Tranfert')}}</h5>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td >{{__('Réf')}}</td>
                                    <td >
                                            {{$stock->id}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Equipement')}}</td>
                                    <td >
                                            {{$stock->equipements->label}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Délégation')}}</td>
                                    <td >
                                            {{$stock->delegations->label}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Quantité')}}</td>
                                    <td >
                                            {{$stock->quantity}}
                                    </td>
                                </tr>
                                <tr>

                                    <td >{{__('Status')}}</td>
                                    <td >
                                            <form action="{{ route('coordinationregionale.stock.transfert.update', $stock->id) }}" method="post" style="display: flex; gap: 15px; max-width: 300px;">
                                            @csrf
                                            <select name="region_id" id="region_id">
                                                @foreach ($regions as $region)
                                                    <option value="{{$region->id}}">{{$region->label}} </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-success">{{__('Confirmer')}}</button>
                                            </form>
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                        {{-- {{$beneficiers->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
