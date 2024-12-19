@extends('layouts.master')

@section('content')
<div class="main-container container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <form action="{{ route('agentcoaph.beneficiers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="card-title mb-0">{{__('Nouveau demandeur')}}</h3>
                    </div>
                    
                    <div class="card-body">
                        <!-- Informations Personnelles -->
                        <div class="border-bottom pb-3 mb-4">
                            <h5 class="text-primary mb-3">{{__('Informations Personnelles')}}</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Nom et Prénom')}}</label>
                                        <input type="text" name="name" id="name" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            placeholder="{{__('Entrez le nom complet')}}">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('CIN')}}</label>
                                        <input type="text" name="cin" id="cin" 
                                            class="form-control @error('cin') is-invalid @enderror" 
                                            placeholder="XX00000">
                                        @error('cin')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Email')}}</label>
                                        <input type="email" name="email" id="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            placeholder="exemple@email.com">
                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Téléphone')}}</label>
                                        <input type="tel" name="phone" id="phone" 
                                            class="form-control @error('phone') is-invalid @enderror" 
                                            placeholder="0600000000">
                                        @error('phone')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations Démographiques -->
                        <div class="border-bottom pb-3 mb-4">
                            <h5 class="text-primary mb-3">{{__('Informations Démographiques')}}</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Sexe')}}</label>
                                        <select name="sexe" id="sexe" class="form-select @error('sexe') is-invalid @enderror">
                                            <option value="">{{__('Sélectionnez le sexe')}}</option>
                                            <option value="1">{{__('Homme')}}</option>
                                            <option value="0">{{__('Femme')}}</option>
                                        </select>
                                        @error('sexe')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Milieu')}}</label>
                                        <select name="milieu" id="milieu" class="form-select @error('milieu') is-invalid @enderror">
                                            <option value="">{{__('Sélectionnez le milieu')}}</option>
                                            <option value="1">{{__('Urbain')}}</option>
                                            <option value="0">{{__('Rural')}}</option>
                                        </select>
                                        @error('milieu')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Adresse')}}</label>
                                        <input type="text" name="address" id="address" 
                                            class="form-control @error('address') is-invalid @enderror" 
                                            placeholder="{{__('Entrez l\'adresse complète')}}">
                                        @error('address')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations Médicales -->
                        <div class="border-bottom pb-3 mb-4">
                            <h5 class="text-primary mb-3">{{__('Informations Médicales et Administratives')}}</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Handicap')}}</label>
                                        <select name="disabilitie_id" id="disabilitie_id" 
                                            class="form-select @error('disabilitie_id') is-invalid @enderror">
                                            <option value="">{{__('Sélectionnez le type de handicap')}}</option>
                                            @foreach ($disablities as $disablitie)
                                                <option value="{{$disablitie->id}}" 
                                                    {{old('disabilitie_id') == $disablitie->id ? 'selected' : ''}}>
                                                    {{$disablitie->label}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('disabilitie_id')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Délégation')}}</label>
                                        <select name="delegation_id" id="delegation_id" 
                                            class="form-select @error('delegation_id') is-invalid @enderror">
                                            @foreach ($delegations as $delegation)
                                                <option value="{{$delegation->id}}" 
                                                    {{old('delegation_id') == $delegation->id ? 'selected' : ''}}>
                                                    {{$delegation->label}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('delegation_id')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Aide Technique')}}</label>
                                        <select name="equipement_id" id="equipement_id" 
                                            class="form-select @error('equipement_id') is-invalid @enderror">
                                            <option value="">{{__('Sélectionnez l\'aide technique')}}</option>
                                            @foreach ($equipements as $equipement)
                                                <option value="{{$equipement->id}}" 
                                                    {{old('equipement_id') == $equipement->id ? 'selected' : ''}}>
                                                    {{$equipement->label}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('equipement_id')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Couverture Sociale')}}</label>
                                        <select name="type_health_coverage" id="type_health_coverage" 
                                            class="form-select @error('type_health_coverage') is-invalid @enderror">
                                            <option value="">{{__('Sélectionnez la couverture')}}</option>
                                            @foreach ($typeofcoverages as $typeofcoverage)
                                                <option value="{{$typeofcoverage->id}}" 
                                                    {{old('type_health_coverage') == $typeofcoverage->id ? 'selected' : ''}}>
                                                    {{$typeofcoverage->label}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('type_health_coverage')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Documents et Rendez-vous -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">{{__('Documents et Rendez-vous')}}</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Image CIN')}}</label>
                                        <input type="file" name="image_cin" id="image_cin" 
                                            class="form-control @error('image_cin') is-invalid @enderror">
                                        @error('image_cin')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Photo de la personne')}}</label>
                                        <input type="file" name="image" id="image" 
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Certificat médical')}}</label>
                                        <input type="file" name="document" id="document" 
                                            class="form-control @error('document') is-invalid @enderror" multiple>
                                        @error('document')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label ">{{__('Date de rendez-vous')}}</label>
                                        <input type="date" name="date_RDV" id="date_RDV" 
                                            class="form-control @error('date_RDV') is-invalid @enderror">
                                        @error('date_RDV')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-top">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>{{__('Enregistrer')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection