<?php $__env->startSection('content'); ?>
<div class="main-container container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title"><?php echo e(__('Profile')); ?></h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="<?php echo e(route('agentcoaph.profile.update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-2 col-form-label"><?php echo e(__('Nom et prénom')); ?></label>
                                    <div class="col-md-10">
                                        <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e($user->name); ?>" id="name" name="name" required>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-2 col-form-label"><?php echo e(__('Email')); ?></label>
                                    <div class="col-md-10">
                                        <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" value="<?php echo e($user->email); ?>" id="email" name="email" required>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="phone" class="col-md-2 col-form-label"><?php echo e(__('Numéro de téléphone')); ?></label>
                                    <div class="col-md-10">
                                        <input class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e($user->phone); ?>" id="phone" name="phone" required>
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="ordinal_number" class="col-md-2 col-form-label"><?php echo e(__('Matricule')); ?></label>
                                    <div class="col-md-10">
                                        <input class="form-control <?php $__errorArgs = ['ordinal_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e($user->ordinal_number); ?>" id="ordinal_number" name="ordinal_number" required>
                                        <?php $__errorArgs = ['ordinal_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end row -->

                                <div class="mb-3 text-center">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Enregistrer')); ?></button>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </form>
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title"><?php echo e(__('Changer le mot de passe')); ?></h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="<?php echo e(route('agentcoaph.profile.update.password')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="col-xl-12">

                                <div class="mb-3 row">
                                    <label for="current_password" class="col-md-2 col-form-label"><?php echo e(__('Mot de passe actuel')); ?></label>
                                    <div class="col-md-10">
                                        <input class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" value="" id="current_password" name="current_password">
                                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="new_password" class="col-md-2 col-form-label"><?php echo e(__('Nouveau Mot de passe')); ?></label>
                                    <div class="col-md-10">
                                        <input class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" value="" id="new_password" name="new_password">
                                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 row">
                                    <label for="new_password_confirmation" class="col-md-2 col-form-label"><?php echo e(__('Confirmer le nouveau mot de passe')); ?></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" value="" id="new_password_confirmation" name="new_password_confirmation" >
                                    </div>
                                </div><!-- end row -->
                                <div class="mb-3 text-center">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Changer le mot de passe')); ?></button>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/agentcoaph/profile.blade.php ENDPATH**/ ?>