@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">


    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('servicetechnique.user.update',$user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <div class="card-title">{{__('ModifierUser')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Nom et prénom ')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" value="{{$user->name}}">
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
                            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{$user->email}}">
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Nom d\'utilisateur')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="username" id="username" class="form-control  @error('username') is-invalid @enderror" value="{{$user->username}}">
                            @error('username')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Téléphone')}} :</label>
                        <div class="col-md-9">
                            <input type="number" name="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{$user->phone}}">
                            @error('phone')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Matricule')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="ordinal_number" id="ordinal_number" class="form-control  @error('ordinal_number') is-invalid @enderror" value="{{$user->ordinal_number}}">
                            @error('ordinal_number')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                            <label class="col-md-3 form-label" for="roles">{{__('Rôle')}} :</label>
                            <div class="col-md-9">
                                @foreach ($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="roles[]" class="form-check-input @error('roles') is-invalid @enderror" id="role" value="{{$role->id}} " {{in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : ''}}>
                                        <label for="{{$role->role}} " class="form-check-label">{{$role->role}}</label>
                                    </div>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="invalid-feedback">
                                <strong>{{$message}} </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Mot de passe')}} :</label>
                        <div class="col-md-9">
                            <input type="password" name="password" id="name" class="form-control  @error('password') is-invalid @enderror" >
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="delegation_id">{{__('Délégation')}} :</label>
                        <div class="col-md-9">
                        <select name="delegation_id" id="delegation_id" class="form-control @error('delegation_id') is-invalid @enderror">
                            <option value="">-- {{__('SelectDelegation')}} --</option>
                            @foreach ($delegations as $delegation)
                                <option value="{{$delegation->id}} " {{$user->id == $delegation->id ? 'Selected' : ''}}>{{$delegation->label}}</option>
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

