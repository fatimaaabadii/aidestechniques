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
                        <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td >{{__('Réf : ')}}</td>
                                    <td >
                                            {{$demand->id}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Nom : ')}}</td>
                                    <td >
                                            {{$demand->beneficiers->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Cin : ')}}</td>
                                    <td >
                                            {{$demand->beneficiers->cin}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Tél :')}}</td>
                                    <td >
                                            {{$demand->beneficiers->phone}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Email :')}}</td>
                                    <td >
                                            {{$demand->beneficiers->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Addresse :')}}</td>
                                    <td >
                                            {{$demand->beneficiers->address}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Equipement : ')}}</td>
                                    <td >
                                            {{$demand->equipements->label}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Délégation :')}}</td>
                                    <td >
                                            {{$demand->delegations->label}}
                                    </td>
                                </tr>

                                @if ($demand->beneficiers->image_cin != null)
<tr>
    <td>{{__('Image CIN :')}}</td>
    <td>
        <a href="{{ route('download.file', ['type' => 'cin', 'beneficiaryId' => $demand->beneficiers->id]) }}">
            Télécharger
        </a>
    </td>
</tr>
@endif

@if ($demand->beneficiers->image != null)
<tr>
    <td>{{__('Image :')}}</td>
    <td>
        <a href="{{ route('download.file', ['type' => 'image', 'beneficiaryId' => $demand->beneficiers->id]) }}">
            Télécharger
        </a>
    </td>
</tr>
@endif

@if ($demand->beneficiers->document != null)
<tr>
    <td>{{__('Document :')}}</td>
    <td>
        <a href="{{ route('download.file', ['type' => 'document', 'beneficiaryId' => $demand->beneficiers->id]) }}">
            Télécharger
        </a>
    </td>
</tr>
@endif




                                <form action="{{ route('agentcoaph.demand.status.update', $demand->id) }}" method="post" style="display: flex; gap: 15px; max-width: 300px;">
                                @csrf


                                <tr>

                                    <td >{{__('Status')}}</td>
                                    <td >

                                            <select name="status">
                                                @foreach ($states as $status)
                                                    <option value="{{$status}}" @if($demand->status == $status) selected @endif>{{$status}} </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-success">{{__('Modifier')}}</button>
                                        </td>
                                </tr>


                                <tr>
                                    <td >{{__('Justification')}}</td>
                                    <td >
                                            <input type="text" name="justification" id="justification">
                                    </td>
                                </tr>

                            </form>



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
