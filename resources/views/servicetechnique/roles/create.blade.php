@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">


    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('servicetechnique.role.store') }}" method="post">
                @csrf
                <div class="card-header">
                    <div class="card-title">{{__('AjouterRole')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Nom')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="role" id="role" class="form-control  @error('role') is-invalid @enderror" placeholder="{{__('Nom')}} ">
                            @error('role')
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
