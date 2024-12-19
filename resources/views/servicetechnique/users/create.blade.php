@extends('layouts.master')
<script>
    var roles = @json($roles);
    console.log(roles);
</script>
@section('content')
<div class="main-container container-fluid">

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('servicetechnique.user.store') }}" method="post">
                @csrf
                <div class="card-header">
                    <div class="card-title">{{__('AjouterUser')}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Nom et prénom')}} :</label>
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
                        <label class="col-md-3 form-label"> {{__('Nom d\'utilisateur')}} :</label>
                        <div class="col-md-9">
                            <input type="text" name="username" id="username" class="form-control  @error('username') is-invalid @enderror" placeholder="UserName">
                            @error('username')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> {{__('Tél')}} :</label>
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
                        <label class="col-md-3 form-label"> {{__('Matricule')}} :</label>
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
                                <label class="col-md-3 form-label" for="roles">{{__('Rôle')}} :</label>
                                <div class="col-md-9">
                                    @foreach ($roles as $role)
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="roles[]" class="form-check-input @error('roles') is-invalid @enderror" id="role" value="{{$role->id}} ">
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
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="*********** ">
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="delegation_id">{{__('Délégation')}}</label>
                        <div class="col-md-9">
                        <select name="delegation_id" id="delegation_id" class="form-control @error('delegation_id') is-invalid @enderror">
                            <option value="">-- {{__('SelectDelegation')}} --</option>
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
