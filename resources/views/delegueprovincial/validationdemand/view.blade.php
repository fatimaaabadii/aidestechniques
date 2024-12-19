@extends('layouts.master')


@section('content')
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Demande Saisie par COAPH')}}</h5>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td >{{__('Réf')}}</td>
                                    <td >
                                            {{$demand->id}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Demandeur')}}</td>
                                    <td >
                                            {{$demand->beneficiers->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('CIN')}}</td>
                                    <td >
                                            {{$demand->beneficiers->cin}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Tél')}}</td>
                                    <td >
                                            {{$demand->beneficiers->phone}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Email')}}</td>
                                    <td >
                                            {{$demand->beneficiers->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Adresse')}}</td>
                                    <td >
                                            {{$demand->beneficiers->address}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Equipement')}}</td>
                                    <td >
                                            {{$demand->equipements->label}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Délégation')}}</td>
                                    <td >
                                            {{$demand->delegations->label}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >{{__('Status(agentCOAPH)')}}</td>
                                    <td >
                                            {{__('Demande Saisie par COAPH')}}
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
                                <tr>

                                   
    @php
        use App\Models\RoleUser; 
        use App\Models\Role;

        $userRole = RoleUser::where('user_id', Auth::user()->id)->first();
        $role = $userRole ? Role::find($userRole->role_id) : null;
    @endphp

    @if ($role)
    <td>{{ __('Status') }}</td>
    <td>
        <form action="{{ route('delegueprovincial.demand.status.update', $demand->id) }}" method="post" style="display: flex; gap: 15px; max-width: 300px;">
            @csrf
            
            @if ($role->role == 'Coaph')
                <!-- Champ pour Agent COAPH (mise à jour du champ 'status') -->
                <select name="status">
                    @foreach ($states as $status)
                        <option value="{{ $status }}" @if($demand->status == $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success">{{ __('Modifier') }}</button>

            @elseif ($role->role == 'Délégué provincial')
                <!-- Champ pour Délégué provincial (mise à jour du champ 'status_delegue') -->
                <select name="status_delegue">
                    @foreach ($states as $status_delegue)
                        <option value="{{ $status_delegue }}" @if($demand->status_delegue == $status_delegue) selected @endif>{{ $status_delegue }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success">{{ __('Modifier') }}</button>

            @else
                <!-- Aucun champ à modifier -->
                <span>{{ __('Aucun statut à modifier') }}</span>
            @endif

        </form>
    </td>
@endif
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
