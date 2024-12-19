@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">


    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('servicetechnique.role.update',$role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <div class="card-title">{{__('ModifierRole')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Nom')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="role" id="role" class="form-control  @error('role') is-invalid @enderror" value="{{$role->role}}">
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
                            <button type="submit" class="btn btn-primary">{{__('Modifier')}}</button>
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

