<x-supperadmin.app>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">{{ __('Profile') }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('supperadmin.profile.update') }}" method="post">
                            @csrf
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>
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
                                    <label for="email" class="col-md-2 col-form-label">{{ __('email') }}</label>
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
                                    <label for="phone" class="col-md-2 col-form-label">{{ __('Phone number') }}</label>
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
                                    <label for="ordinalNumber" class="col-md-2 col-form-label">{{ __('Ordinal number') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('ordinalNumber') is-invalid @enderror" type="text" value="{{ $user->ordinal_number }}" id="ordinalNumber" name="ordinalNumber" required>
                                        @error('ordinalNumber')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->

                                <div class="mb-3 text-center">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </form>
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">{{ __('Change password') }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('supperadmin.profile.change.password') }}" method="post">
                            @csrf
                            <div class="col-xl-12">

                                <div class="mb-3 row">
                                    <label for="current_password" class="col-md-2 col-form-label">{{ __('current password') }}</label>
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
                                    <label for="password" class="col-md-2 col-form-label">{{ __('password') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" value="" id="password" name="password">
                                        @error('password')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="password_confirmation" class="col-md-2 col-form-label">{{ __('repeat password') }}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" value="" id="password_confirmation" name="password_confirmation" >
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 text-center">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </form>
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</x-supperadmin.app>
