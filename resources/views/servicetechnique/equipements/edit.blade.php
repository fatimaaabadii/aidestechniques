@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">


    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('servicetechnique.equipements.update',$equipement->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <div class="card-title">{{__('Modifier Aide Technique')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Nom de l\'équipement')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="label" id="label" class="form-control  @error('label') is-invalid @enderror" value="{{$equipement->label}}">
                            @error('label')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Code barres')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="barcode" id="barcode" class="form-control  @error('barcode') is-invalid @enderror" value="{{$equipement->barcode}}">
                            @error('barcode')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="image">{{__('Image de l\'équipement')}}</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{$equipement->image}}">
                            
                        @error('image')
                        <span class="invalid-feedback">
                            <strong>{{$message}} </strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                   
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="type_id">{{__('Type Aide Technique')}}</label>
                        <div class="col-md-9">
                        <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                            <option value="">-- {{__('SelectTypeEquipement')}} --</option>
                            @foreach ($typeequipements as $typeequipement)
                                <option value="{{$typeequipement->id}} " {{$equipement->id == $typeequipement->id ? 'Selected' : ''}}>{{$typeequipement->label}}</option>
                            @endforeach
                        </select>
                        @error('type_id')
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

