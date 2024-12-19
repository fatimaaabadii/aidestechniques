<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><?php echo e(__('Modifier demandeur')); ?></h3>
                </div>
                <form action="<?php echo e(route('agentcoaph.beneficiers.update', $beneficier->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label"><?php echo e(__('Nom')); ?></label>
                                <input type="text" name="name" id="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($beneficier->name); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cin" class="form-label"><?php echo e(__('CIN')); ?></label>
                                <input type="text" name="cin" id="cin" class="form-control <?php $__errorArgs = ['cin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($beneficier->cin); ?>">
                                <?php $__errorArgs = ['cin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label"><?php echo e(__('Email')); ?></label>
                                <input type="email" name="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($beneficier->email); ?>">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label"><?php echo e(__('Tél')); ?></label>
                                <input type="text" name="phone" id="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($beneficier->phone); ?>">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label"><?php echo e(__('Adresse')); ?></label>
                            <input type="text" name="address" id="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($beneficier->address); ?>">
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="delegation_id" class="form-label"><?php echo e(__('Délégation')); ?></label>
                                <select name="delegation_id" id="delegation_id" class="form-select <?php $__errorArgs = ['delegation_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">-- <?php echo e(__('Sélectionnez Délégation')); ?> --</option>
                                    <?php $__currentLoopData = $delegations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($delegation->id); ?>" <?php echo e($beneficier->delegation_id == $delegation->id ? 'selected' : ''); ?>>
                                            <?php echo e($delegation->label); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['delegation_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="disabilitie_id" class="form-label"><?php echo e(__('Handicap')); ?></label>
                                <select name="disabilitie_id" id="disabilitie_id" class="form-select <?php $__errorArgs = ['disabilitie_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">-- <?php echo e(__('Sélectionnez Handicap')); ?> --</option>
                                    <?php $__currentLoopData = $disabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disabilitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($disabilitie->id); ?>" <?php echo e($beneficier->disabilitie_id == $disabilitie->id ? 'selected' : ''); ?>>
                                            <?php echo e($disabilitie->label); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['disabilitie_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="equipement_id" class="form-label"><?php echo e(__('Equipement')); ?></label>
                                <select name="equipement_id" id="equipement_id" class="form-select <?php $__errorArgs = ['equipement_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">-- <?php echo e(__('Sélectionnez Equipement')); ?> --</option>
                                    <?php $__currentLoopData = $equipements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($equipement->id); ?>" <?php echo e($beneficier->equipement_id == $equipement->id ? 'selected' : ''); ?>>
                                            <?php echo e($equipement->label); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['equipement_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_health_coverage" class="form-label"><?php echo e(__('Couverture Sociale')); ?></label>
                                <select name="type_health_coverage" id="type_health_coverage" class="form-select <?php $__errorArgs = ['type_health_coverage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">-- <?php echo e(__('Sélectionnez Couverture')); ?> --</option>
                                    <?php $__currentLoopData = $typeofcoverages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeofcoverage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($typeofcoverage->id); ?>" <?php echo e($beneficier->type_health_coverage == $typeofcoverage->id ? 'selected' : ''); ?>>
                                            <?php echo e($typeofcoverage->label); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['type_health_coverage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><?php echo e(__('Image CIN')); ?></label>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="<?php echo e(asset($beneficier->image_cin)); ?>" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    <?php echo e(__('Afficher')); ?> <i class="fas fa-external-link-alt ms-1"></i>
                </a>
                <a href="<?php echo e(asset($beneficier->image_cin)); ?>" download class="btn btn-outline-primary btn-sm">
                    <?php echo e(__('Télécharger')); ?> <i class="fas fa-download ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><?php echo e(__('Image de la personne')); ?></label>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="<?php echo e(asset($beneficier->image)); ?>" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    <?php echo e(__('Afficher')); ?> <i class="fas fa-external-link-alt ms-1"></i>
                </a>
                <a href="<?php echo e(asset($beneficier->image)); ?>" download class="btn btn-outline-primary btn-sm">
                    <?php echo e(__('Télécharger')); ?> <i class="fas fa-download ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label"><?php echo e(__('Certificat Médical')); ?></label>
    <?php if($beneficier->document): ?>
        <div class="d-flex align-items-center">
            <div>
                <a href="<?php echo e(asset($beneficier->document)); ?>" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    <?php echo e(__('Voir le document')); ?> <i class="fas fa-external-link-alt ms-1"></i>
                </a>
                <a href="<?php echo e(asset($beneficier->document)); ?>" download class="btn btn-outline-primary btn-sm">
                    <?php echo e(__('Télécharger')); ?> <i class="fas fa-download ms-1"></i>
                </a>
            </div>
        </div>
    <?php else: ?>
        <p class="text-muted"><?php echo e(__('Aucun document disponible')); ?></p>
    <?php endif; ?>
</div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> <?php echo e(__('Modifier')); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/agentcoaph/beneficiers/edit.blade.php ENDPATH**/ ?>