@extends('layouts.master')

@section('content')
<div class="main-container container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">{{ __('Profil') }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('agentcoaph.profile.update') }}" method="post">
                            @csrf
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-2 col-form-label">{{ __('Nom et prénom') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $user->name }}" id="name" name="name" required>
                                        @error('name')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{ $user->email }}" id="email" name="email" required>
                                        @error('email')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="phone" class="col-md-2 col-form-label">{{ __('Numéro de téléphone') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" value="{{ $user->phone }}" id="phone" name="phone" required>
                                        @error('phone')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="ordinal_number" class="col-md-2 col-form-label">{{ __('Matricule') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('ordinal_number') is-invalid @enderror" type="text" value="{{ $user->ordinal_number }}" id="ordinal_number" name="ordinal_number" required>
                                        @error('ordinal_number')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->

                                <div class="mb-3 text-center">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </form>
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">{{ __('Changer le mot de passe') }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('agentcoaph.profile.update.password') }}" method="post">
                            @csrf
                            <div class="col-xl-12">

                                <div class="mb-3 row">
                                    <label for="current_password" class="col-md-2 col-form-label">{{ __('Mot de passe actuel') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('current_password') is-invalid @enderror" type="password" value="" id="current_password" name="current_password">
                                        @error('current_password')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="new_password" class="col-md-2 col-form-label">{{ __('Nouveau Mot de passe') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('new_password') is-invalid @enderror" type="password" value="" id="new_password" name="new_password">
                                        @error('new_password')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="new_password_confirmation" class="col-md-2 col-form-label">{{ __('Confirmer le nouveau mot de passe') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" value="" id="new_password_confirmation" name="new_password_confirmation" >
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 text-center">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">{{ __('Changer le mot de passe') }}</button>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </form>
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end row -->

@endsection
