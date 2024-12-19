@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('directeurcentrale.transfer.store') }}" method="post">
                @csrf
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">Transferer Un Stock Aide Technique</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <label for="example-email-input" class="col-md-2 col-form-label">délégation de</label>
                                <div class="col-10">
                                    <div class="mb-3">
                                        <select name="delegation_from" id="delegation_from" class="form-control pb-5" data-trigger name="choices-single-default"
                                            id="choices-single-default">

                                            <option value="0">délégation de</option>
                                            @foreach ($delegations as $delegation)
                                                <option value="{{ $delegation->id }}">{{ $delegation->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <div class=" row">
                                <label for="example-email-input" class="col-md-2 col-form-label">délégation à</label>
                                <div class="col-10">
                                    <div class="mb-3">
                                        <select name="delegation_to" id="delegation_to" class="form-control pb-5" data-trigger name="choices-single-default"
                                            id="choices-single-default">

                                            <option value="0">délégation à</option>
                                            @foreach ($delegations as $delegation)
                                                <option value="{{ $delegation->id }}">{{ $delegation->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->


                            <div class="row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Aide Technique</label>
                                <div class="col-md-10">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <select name="equipement_id" id="equipement_id" class="form-control" data-trigger name="choices-single-default"
                                                id="choices-single-default">
                                                <option value="0">Les aides techniques</option>
                                                @foreach ($equipements as $equipements)
                                                    <option value="{{ $equipements->id }}">{{ $equipements->label }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                            </div>



                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-md-2 col-form-label">Quantité</label>
                                <div class="col-md-10">
                                    <input name="quantity" id="quantity" class="form-control" type="number" id="example-search-input">
                                </div>
                            </div><!-- end row -->




                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>



                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card body -->
                </form>
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div>
@endsection
