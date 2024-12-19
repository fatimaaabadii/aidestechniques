<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Entraide Nationale - Gestion des Aides Techniques</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Système de gestion des aides techniques d'Entraide Nationale, permettant la gestion du stock et des bénéficiaires." />
    <meta name="author" content="Fidiacom" />
    <meta name="keywords" content="Entraide, Aides Techniques, Gestion de Stock, Handicap, Aide Sociale" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App CSS -->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        .welcome-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            letter-spacing: 1px;
            margin-bottom: 0;
            font-family: 'Playfair Display', serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .btn-custom-purple {
            background-color: #8e44ad;
            border-color: #8e44ad;
            color: white;
        }

        .btn-custom-purple:hover {
            background-color: #732d91;
            border-color: #732d91;
            color: white;
        }

        .title-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .title-icon {
            font-size: 2rem;
            color: #8e44ad;
            margin-right: 0.5rem;
        }
    </style>
</head>

<body class="bg-white">

    <div class="auth-bg-basic d-flex align-items-center min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 py-5 px-3">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="text-center text-muted mb-2">
                            <div class="pb-3">
                                <a href="{{ route('home') }}">
                                    <span class="logo-lg d-flex justify-content-center align-items-center">
                                        <!-- Premier logo -->
                                        <img src="{{ asset('assets/beneficiers/logo1.png') }}" class="h-12 me-5" alt="Logo Entraide Nationale" />
                                        <!-- Deuxième logo -->
                                        <img src="{{ asset('assets/beneficiers/logo2.png') }}" class="h-16 ms-5" alt="Logo partenaire" />
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-transparent shadow-none border-0">
                            <div class="card-body">
                                <div class="py-3">
                                    <div class="text-center">
                                        <div class="title-container">
                                            <i class="fas fa-wheelchair title-icon"></i>
                                            <h3 class="welcome-title">{{ __('Gestion des Aides Techniques') }}</h3>
                                        </div>
                                    </div>

                                    <form class="mt-4 pt-2" method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-floating form-floating-custom mb-3">
                                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrez votre email">
                                            @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <label for="email">{{ __('Email') }}</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-users-alt"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-input" name="password" placeholder="Entrez votre mot de passe">
                                            @error('password')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="password-input">{{ __('Mot de passe') }}</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-padlock"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-custom-purple w-100" type="submit">{{ __('Connexion') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="mt-4 mt-md-5 text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Entraide Nationale - Tous droits réservés.</p>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
    </div> <!-- end container fluid -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/pass-addon.init.js') }}"></script>

</body>

</html>
