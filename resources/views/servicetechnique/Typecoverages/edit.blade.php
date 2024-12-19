@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">


    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('servicetechnique.TypeCoverage.update',$typecoverage->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <div class="card-title">{{__('Modifier le type de couverture')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Type de couverture')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="label" id="label" class="form-control  @error('label') is-invalid @enderror" value="{{$typecoverage->label}}">
                            @error('label')
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

