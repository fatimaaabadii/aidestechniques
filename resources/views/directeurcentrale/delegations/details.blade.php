@extends('layouts.master')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                {{-- <h1 >{{ $delegation->label }}</h1> --}}
                <div class="card pb-0">
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified project-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">
                                <i class="mdi mdi-atom font-size-20"></i>
                                <span class="d-none d-sm-block">Details</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#team" role="tab">
                                <i class="mdi mdi-account-multiple-outline font-size-20"></i>
                                <span class="d-none d-sm-block">Utilisateur</span></a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel">
                            <div class="card mb-0 border-0">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar">
                                                                <div
                                                                    class="avatar-title bg-soft-primary rounded font-size-20 text-primary">
                                                                    <i class="uil uil-check-circle"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="font-size-16 mb-1">10</h5>
                                                            <p class="mb-0 text-truncate text-muted">Demandes acceptés </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->


                                        <div class="col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar">
                                                                <div
                                                                    class="avatar-title bg-soft-primary rounded font-size-20 text-primary">
                                                                    <i class="uil uil-users-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="font-size-16 mb-1">10</h5>
                                                            <p class="mb-0 text-truncate text-muted">bénéficier</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->


                                        <div class="col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar">
                                                                <div
                                                                    class="avatar-title bg-soft-primary rounded font-size-20 text-primary">
                                                                    <i class="uil uil-clock-eight"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="font-size-16 mb-1">8</h5>
                                                            <p class="mb-0 text-truncate text-muted">demande en cours</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body-->
                                            </div><!-- end card -->
                                        </div> <!-- end col -->
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="card h-100 mb-lg-0">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Description</h5>


                                                    <table id="trans" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th>Equipement</th>
                                                                <th>Quantite</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          @if (is_array($delegations) || is_object($delegations))
                                                              @foreach ($delegations as $d)
                                                            <tr>
                                                                <td>{{$d->equipements->label}} </td>
                                                                <td>{{$d->quantity }}</td>
                                                            </tr>
                                                            @endforeach
                                                          @endif
                                                            
                                                            

                                                        </tbody>
                                                    </table>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                        <div class="col-lg-4">
                                            <div class="card h-100 mb-lg-0">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Informations</h5>

                                                    <div>
                                                        <div class="py-3">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-14">Adresse : </h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted mb-0">{{ $delegation->adress.'...........................' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="py-3">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-14">Region : </h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted mb-0">{{ $delegation->region->label }}</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="py-3">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-14">email : </h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted mb-0">{{ $delegation->email ?? '------' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="py-3">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-14">Téléphone 1 : </h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted mb-0">{{ $delegation->phone_1 ?? '------' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-14">Téléphone 2 : </h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted mb-0">{{ $delegation->phone_2 ?? '------' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-14">Téléphone 3 : </h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted mb-0">{{ $delegation->phone_3 ?? '------' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="py-3">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-14">Téléphone Fix : </h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted mb-0">{{ $delegation->fix ?? '------' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end card -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end tab pane -->



                        <div class="tab-pane" id="team" role="tabpanel">
                            <div>
                                <div class="card mb-0 border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex align-items-start">
                                                            <div class="flex-shrink-0 avatar rounded-circle me-3">
                                                                <img src="https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-ic%C3%B4ne-de-visage-anonyme-de-profil-personne-silhouette-grise-avatar-par-d%C3%A9faut-masculin-photo.jpg" alt=""
                                                                    class="img-fluid rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="font-size-15 mb-1 text-truncate">
                                                                    <a class="text-dark">
                                                                        Coaph
                                                                    </a>
                                                                </h5>
                                                                <span class="badge badge-soft-success mb-0">
                                                                    Coaph
                                                                </span>
                                                            </div>

                                                        </div>
                                                        <p class="mt-4 text-muted">
                                                            Email: delegue@email.com
                                                        </p>
                                                        <p class="mt-4 text-muted">
                                                            Phone: 06 00 00 00 22
                                                        </p>

                                                    </div>
                                                    <!-- end card body -->
                                                </div><!-- end card -->
                                            </div><!-- end col -->




                                            <div class="col-12 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex align-items-start">
                                                            <div class="flex-shrink-0 avatar rounded-circle me-3">
                                                                <img src="https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-ic%C3%B4ne-de-visage-anonyme-de-profil-personne-silhouette-grise-avatar-par-d%C3%A9faut-masculin-photo.jpg" alt=""
                                                                    class="img-fluid rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="font-size-15 mb-1 text-truncate">
                                                                    <a class="text-dark">
                                                                        Déléguer
                                                                    </a>
                                                                </h5>
                                                                <span class="badge badge-soft-success mb-0">
                                                                    Déléguer
                                                                </span>
                                                            </div>

                                                        </div>
                                                        <p class="mt-4 text-muted">
                                                            Email: delegue@email.com
                                                        </p>
                                                        <p class="mt-4 text-muted">
                                                            Phone: 06 00 00 00 22
                                                        </p>

                                                    </div>
                                                    <!-- end card body -->
                                                </div><!-- end card -->
                                            </div><!-- end col -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->


                    </div>
                </div>

            </div>
        </div>

    </div> <!-- container-fluid -->
</div>

@endsection
