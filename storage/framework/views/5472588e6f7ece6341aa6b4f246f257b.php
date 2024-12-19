<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Titre de la page -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Tableau de bord</h4>
                    </div>
                </div>
            </div>

            <!-- Filtres -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Filtrer les données</h5>
                            <form action="<?php echo e(route('home.filter')); ?>" method="POST" class="d-flex align-items-end">
                                <?php echo csrf_field(); ?>
                                <div class="me-3">
                                    <label for="region" class="form-label">Région</label>
                                    <select name="region" id="region" class="form-select">
                                        <option value="0">Select Region</option>
                                        <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($region->id); ?>"><?php echo e($region->label); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="me-3">
                                    <label for="delegations" class="form-label">Délégation</label>
                                    <select name="delegation" id="delegations" class="form-select" disabled>
                                        <option value="0">Select Delegation</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Filtrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Demandes en attente</h6>
                                    <h3 class="mb-0 text-danger"><?php echo e($standByDemands); ?></h3>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-danger rounded-circle">
                                        <i class="fas fa-clock fa-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Demandes rejetées</h6>
                                    <h3 class="mb-0 text-success"><?php echo e($notSatisfiedDemands); ?></h3>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-circle">
                                        <i class="fas fa-times-circle fa-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Demandes acceptées</h6>
                                    <h3 class="mb-0 text-warning"><?php echo e($satisfiedDemands); ?></h3>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-warning rounded-circle">
                                        <i class="fas fa-check-circle fa-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Délai moyen de satisfaction</h6>
                                    <h3 class="mb-0 text-primary"><?php echo e($average); ?> Jours</h3>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-circle">
                                        <i class="fas fa-calendar-alt fa-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('js/dashboard/regions.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            processing: true,
            "pageLength": 8,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json',
            },
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/directeurcentrale/dashboard/index.blade.php ENDPATH**/ ?>