@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('servicetechnique.coordinateur.store') }}" method="post">
                @csrf
                <div class="card-header">
                    <div class="card-title">{{__('AjouterCoordinateur')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Nom')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="{{__('Nom')}} ">
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Email')}} :</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Gmail@gmail.com ">
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Phone')}} :</label>
                        <div class="col-md-9">
                            <input type="number" name="phone" id="phone" class="form-control  @error('name') is-invalid @enderror" placeholder="0600000000 ">
                            @error('phone')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Ordinal_number')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="ordinal_number" id="ordinal_number" class="form-control  @error('ordinal_number') is-invalid @enderror" placeholder="{{__('Nom')}} ">
                            @error('ordinal_number')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Password')}} :</label>
                        <div class="col-md-9">
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="*********** ">
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="delegation_id">{{__('Region')}}</label>
                        <div class="col-md-9">
                        <select name="delegation_id" id="delegation_id" class="form-control @error('delegation_id') is-invalid @enderror">
                            <option value="">-- {{__('Select Region')}} --</option>
                            @foreach ($delegations as $delegation)
                                <option value="{{$delegation->id}} " {{old('delegation_id') == $delegation->id ? 'Selected' : '' }}>{{$delegation->label}}</option>
                            @endforeach
                        </select>
                        @error('delegation_id')
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
                            <button type="submit" class="btn btn-primary">{{__('Ajouter')}}</button>
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

