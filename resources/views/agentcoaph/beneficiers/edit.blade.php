@extends('layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">{{__('Modifier demandeur')}}</h3>
                </div>
                <form action="{{ route('agentcoaph.beneficiers.update', $beneficier->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">{{ __('Nom') }}</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $beneficier->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cin" class="form-label">{{ __('CIN') }}</label>
                                <input type="text" name="cin" id="cin" class="form-control @error('cin') is-invalid @enderror" value="{{ $beneficier->cin }}">
                                @error('cin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $beneficier->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">{{ __('Tél') }}</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $beneficier->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __('Adresse') }}</label>
                            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $beneficier->address }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="delegation_id" class="form-label">{{ __('Délégation') }}</label>
                                <select name="delegation_id" id="delegation_id" class="form-select @error('delegation_id') is-invalid @enderror">
                                    <option value="">-- {{ __('Sélectionnez Délégation') }} --</option>
                                    @foreach ($delegations as $delegation)
                                        <option value="{{ $delegation->id }}" {{ $beneficier->delegation_id == $delegation->id ? 'selected' : '' }}>
                                            {{ $delegation->label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('delegation_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="disabilitie_id" class="form-label">{{ __('Handicap') }}</label>
                                <select name="disabilitie_id" id="disabilitie_id" class="form-select @error('disabilitie_id') is-invalid @enderror">
                                    <option value="">-- {{ __('Sélectionnez Handicap') }} --</option>
                                    @foreach ($disabilities as $disabilitie)
                                        <option value="{{ $disabilitie->id }}" {{ $beneficier->disabilitie_id == $disabilitie->id ? 'selected' : '' }}>
                                            {{ $disabilitie->label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('disabilitie_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="equipement_id" class="form-label">{{ __('Equipement') }}</label>
                                <select name="equipement_id" id="equipement_id" class="form-select @error('equipement_id') is-invalid @enderror">
                                    <option value="">-- {{ __('Sélectionnez Equipement') }} --</option>
                                    @foreach ($equipements as $equipement)
                                        <option value="{{ $equipement->id }}" {{ $beneficier->equipement_id == $equipement->id ? 'selected' : '' }}>
                                            {{ $equipement->label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('equipement_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_health_coverage" class="form-label">{{ __('Couverture Sociale') }}</label>
                                <select name="type_health_coverage" id="type_health_coverage" class="form-select @error('type_health_coverage') is-invalid @enderror">
                                    <option value="">-- {{ __('Sélectionnez Couverture') }} --</option>
                                    @foreach ($typeofcoverages as $typeofcoverage)
                                        <option value="{{ $typeofcoverage->id }}" {{ $beneficier->type_health_coverage == $typeofcoverage->id ? 'selected' : '' }}>
                                            {{ $typeofcoverage->label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_health_coverage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">{{ __('Image CIN') }}</label>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ asset($beneficier->image_cin) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    {{ __('Afficher') }} <i class="fas fa-external-link-alt ms-1"></i>
                </a>
                <a href="{{ asset($beneficier->image_cin) }}" download class="btn btn-outline-primary btn-sm">
                    {{ __('Télécharger') }} <i class="fas fa-download ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">{{ __('Image de la personne') }}</label>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ asset($beneficier->image) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    {{ __('Afficher') }} <i class="fas fa-external-link-alt ms-1"></i>
                </a>
                <a href="{{ asset($beneficier->image) }}" download class="btn btn-outline-primary btn-sm">
                    {{ __('Télécharger') }} <i class="fas fa-download ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Certificat Médical') }}</label>
    @if($beneficier->document)
        <div class="d-flex align-items-center">
            <div>
                <a href="{{ asset($beneficier->document) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    {{ __('Voir le document') }} <i class="fas fa-external-link-alt ms-1"></i>
                </a>
                <a href="{{ asset($beneficier->document) }}" download class="btn btn-outline-primary btn-sm">
                    {{ __('Télécharger') }} <i class="fas fa-download ms-1"></i>
                </a>
            </div>
        </div>
    @else
        <p class="text-muted">{{ __('Aucun document disponible') }}</p>
    @endif
</div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> {{ __('Modifier') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #3498db; /* Couleur principale */
        --secondary-color: #2980b9; /* Couleur secondaire */
        --accent-color: #e74c3c; /* Couleur d'accent */
        --text-color: #333; /* Couleur du texte */
        --light-bg: #f8f9fa; /* Couleur de fond léger */
        --dark-bg: #fff; /* Couleur de fond blanc */
    }

    body {
        color: var(--text-color);
        background-color: var(--light-bg);
    }

    .card {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: var(--primary-color);
        border-bottom: none;
    }

    .form-label {
        font-weight: bold;
        color: var(--text-color);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .img-thumbnail {
    border: 2px solid var(--primary-color);
    background-color: transparent;
    max-width: 200px; /* Taille maximale pour garder un bon aspect */
    height: auto; /* Pour garder les proportions */
    margin-top: 10px; /* Espacement au-dessus de l'image */
}

    .card-footer {
        background-color: var(--dark-bg); /* Fond blanc pour le pied de page */
        border-top: 1px solid rgba(0, 0, 0, .125);
    }
</style>
@endsection
