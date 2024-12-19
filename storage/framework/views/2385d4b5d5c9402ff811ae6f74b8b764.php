<?php $__env->startSection('content'); ?>
<div class="main-container container-fluid">

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="<?php echo e(route('servicetechnique.equipements.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-header">
                    <div class="card-title"><?php echo e(__('Ajouter Aide Technique')); ?></div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label"> <?php echo e(__('Nom de l\'équipement')); ?> :</label>
                        <div class="col-md-9">
                            <input type="text" name="label" id="label" class="form-control  <?php $__errorArgs = ['label'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Nom')); ?> ">
                            <?php $__errorArgs = ['label'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($message); ?> </strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> <?php echo e(__('Code barres')); ?> :</label>
                            <div class="col-md-9">
                                <input type="text" name="barcode" id="barcode" class="form-control  <?php $__errorArgs = ['barcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('BarCode')); ?> ">
                                <?php $__errorArgs = ['barcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($message); ?> </strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label" for="image"><?php echo e(__('Image de l\'équipement')); ?></label>
                            <div class="col-md-9">
                                <input type="file" name="image" id="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($message); ?> </strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="type_id"><?php echo e(__('Type Aide Technique')); ?></label>
                        <div class="col-md-9">
                        <select name="type_id" id="type_id" class="form-control <?php $__errorArgs = ['type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">-- <?php echo e(__('SelectTypeEquipement')); ?> --</option>
                            <?php $__currentLoopData = $typeequipements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeequipement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($typeequipement->id); ?> " <?php echo e(old('type_id') == $typeequipement->id ? 'Selected' : ''); ?>><?php echo e($typeequipement->label); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($message); ?> </strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                    
                    
                    
                </div>
                <div class="card-footer">
                    <!--Row-->
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Ajouter')); ?></button>
                            
                        </div>
                    </div>
                    <!--End Row-->
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /ROW-1 CLOSED -->
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/servicetechnique/equipements/create.blade.php ENDPATH**/ ?>