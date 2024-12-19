@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body pb-3">
                <!-- ... Autres parties du code ... -->
                <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                <tbody>
                <tr>
                                    <td>{{__('Réf')}}</td>
                                    <td>{{$stock->id}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Equipement')}}</td>
                                    <td>{{$stock->equipements->label}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Délégation')}}</td>
                                    <td>{{$stock->delegations->label}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Quantité')}}</td>
                                    <td>{{$stock->quantity}}</td>
                                </tr>
                                <tr>
   
        @php
            use App\Models\RoleUser;
            use App\Models\Role;  // Assurez-vous que le modèle est importé
            $userRole = RoleUser::where('user_id', Auth::user()->id)->first();
            $role = $userRole ? Role::find($userRole->role_id) : null;
        @endphp

        @if ($role && !in_array($role->role, ['Coordinateur régional', 'Directeur Central']))
        <td>{{ __('Status') }}</td>
        <td>
            <form action="{{ route('agentcoaph.stock.status.update', $stock->id) }}" method="post" style="display: flex; gap: 15px; max-width: 300px;">
                @csrf
                <select name="status">
                    @foreach ($states as $status)
                        <option value="{{ $status }}" @if(is_array($stock->status) ? in_array($status, $stock->status) : $stock->status == $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success">{{ __('Modifier') }}</button>
            </form>
        @else
            <span>N/A</span> <!-- Ou un autre message pour indiquer que la modification n'est pas possible -->
        @endif
    </td>
</tr>

                </tbody>
                        </table>
                <!-- ... Reste du code ... -->
            </div>
        </div>
    </div>
</div>
@endsection