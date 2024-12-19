@extends('layouts.master')
@php
    use App\Models\RoleUser;
    use App\Models\Role;  // Assurez-vous que le modèle est importé
@endphp
@section('content')
<div class="container">
    <div class="row">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
                <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Stock Aide Technique')}}</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="page-options ms-auto" style="margin: 10% 0;">
                            <a href="{{ route('directeurcentrale.stock.create') }}" class="btn btn-primary">+ {{__('Ajouter')}} </a>
                        </div>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('Réf')}}</th>
                                    <th class="text-center">{{__('Délégation')}}</th>
                                    <th class="text-center">{{__('Aide technique')}}</th>

                                    <th class="text-center">{{__('Quantité')}}</th>
                                    <th class="text-center">{{__('Status')}}</th>
                                    @php
            $hiddenRoles = ['Coordinateur régional', 'Directeur Central'];
            $userRole = App\Models\RoleUser::where('user_id', Auth::user()->id)->first();
            $role = $userRole ? App\Models\Role::find($userRole->role_id) : null;
        @endphp
        @if (!$role || !in_array($role->role, $hiddenRoles))
            <th class="text-center">{{ __('Actions') }}</th>
        @endif
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
                                    
    @php
        
        $userRole = RoleUser::where('user_id', Auth::user()->id)->first();
        $role = $userRole ? Role::find($userRole->role_id) : null;
    @endphp

    @if ($role && !in_array($role->role, ['Coordinateur régional', 'Directeur Central']))
    <td class="text-center">
        <div class="btn-group align-top">
            <a href="{{ route('directeurcentrale.stock.edit', $stock->id) }}" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">{{ __('Modifier') }}</a>
            <a data-bs-target="#modaldemo{{ $stock->id }}" data-bs-toggle="modal" class="btn btn-sm btn-primary badge"><i class="fa fa-trash"></i></a>
        </div>
    @else
        
        </td><!-- Ou un autre message pour indiquer que la modification ou la suppression n'est pas possible -->
    @endif


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
    <div class="row">
        <div class="col-xl-6">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Stock Aide Technique Par Délégation')}}</h5>
                    </div>

                </div>

                {{-- <div class=""> --}}
                    <div class="table-responsive">
                        <table id="trans1" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('Réf')}}</th>
                                    <th class="text-center">{{__('Aide Technique')}}</th>
                                    <th class="text-center">{{__('Délégation')}}</th>

                                    <th class="text-center">{{__('Quantité')}}</th>
                                    
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
                                    <td class="text-center">{{$stock->equipements->label}}</td>
                                    <td class="text-center">{{$stock->delegations->label}}</td>

                                    <td class="text-center">{{$stock->quantity}}</td>
                                    
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                        {{$stocks->links()}}
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <div class="col-xl-6">

        
        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2">{{__('Stock Aide Technique Par Région')}}</h5>
                    </div>
               

                </div>

                {{-- <div class=""> --}}
                    <div class="table-responsive">
                        <table id="trans2" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('Réf')}}</th>
                                    <th class="text-center">{{__('Aide technique')}}</th>
                                    <th class="text-center">{{__('Région')}}</th>

                                    <th class="text-center">{{__('Quantité')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocksregions as $stocksregion)
                                
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$stocksregion->id}}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$stocksregion->equipements->label}}</td>
                                    <td class="text-center">{{$stocksregion->regions->label}}</td>

                                    <td class="text-center">{{$stocksregion->quantity}}</td>
                                    
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                        {{$stocks->links()}}
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
    </div>
    @foreach ($stocks as $stock)
    <div class="modal fade" id="modaldemo{{$stock->id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger">{{__('VoulezSupprimer')}} : {{$stock->equipements->label}} </h4>
                <form action="{{ route('directeurcentrale.stock.delete', $stock->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal">{{__('Deleted')}} !</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
