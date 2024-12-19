@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('directeurcentrale.stock.update', $stock->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <div class="card-title">{{__('Modifier Stock')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="delegation_id">{{__('Délégation')}}</label>
                        <div class="col-md-9">
                        <select name="delegation_id" id="delegation_id" class="form-control @error('delegation_id') is-invalid @enderror">
                            <option value="">-- {{__('SelectDelegation')}} --</option>
                            @foreach ($delegations as $delegation)
                                <option value="{{$delegation->id}} " {{$stock->delegation_id == $delegation->id ? 'Selected' : '' }}>{{$delegation->label}}</option>
                            @endforeach
                        </select>
                        @error('delegation_id')
                        <span class="invalid-feedback">
                            <strong>{{$message}} </strong>
                        </span>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="equipement_id">{{__('Aide technique')}}</label>
                        <div class="col-md-9">
                        <select name="equipement_id" id="equipement_id" class="form-control @error('equipement_id') is-invalid @enderror">
                            <option value="">-- {{__('Select Aide Technique')}} --</option>
                            @foreach ($equipements as $equipement)
                                <option value="{{$equipement->id}} " {{$stock->equipement_id == $equipement->id ? 'Selected' : '' }}>{{$equipement->label}}</option>
                            @endforeach
                        </select>
                        @error('equipement_id')
                        <span class="invalid-feedback">
                            <strong>{{$message}} </strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Quantité')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="quantity" id="phone" class="form-control  @error('quantity') is-invalid @enderror" value="{{$stock->quantity}}">
                            @error('quantity')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!--Row-->
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">{{__('Modifier')}}</button>
                            {{-- <a href="javascript:void(0)" class="btn btn-default float-end">Discard</a> --}}
                        </div>
                    </div>
                    <!--End Row-->
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /ROW-1 CLOSED -->
</div>
@endsection
