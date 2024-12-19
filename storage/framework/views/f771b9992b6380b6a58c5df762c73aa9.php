<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row">

    <div class="card">
        <div class="card-body pb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-2"><?php echo e(__('Aides Technique')); ?></h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="page-options ms-auto" style="margin: 10% 0;">
                        <a href="<?php echo e(route('servicetechnique.equipements.create')); ?>" class="btn btn-primary">+ <?php echo e(__('Ajouter')); ?> </a>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="table-responsive">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo e(__('Id')); ?></th>
                                <th class="text-center"><?php echo e(__('Nom de l\'équipement')); ?></th>
                                <th class="text-center"><?php echo e(__('Code barres')); ?></th>
                                <th class="text-center"><?php echo e(__('Type')); ?></th>
                                <th class="text-center"><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $equipements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                            <tr>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1"><?php echo e($equipement->id); ?></div>
                                    </div>
                                </td>
                                <td class="text-center"><?php echo e($equipement->label); ?></td>
                                <td class="text-center"><?php echo e($equipement->barcode); ?></td>
                                <td class="text-center"><?php echo e($equipement->typeofequipements->label); ?></td>                            
                                <td class="text-center">
                                        <div class="btn-group align-top">
                                            <a href="<?php echo e(route('servicetechnique.equipements.edit', $equipement->id)); ?>" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button"><?php echo e(__('Modifier')); ?> </a> 
                                                <a data-bs-target="#modaldemo<?php echo e($equipement->id); ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary badge" ><i class="fa fa-trash"></i></a>
                                        </div>
                                </td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                        </tbody>
                    </table>
                    <?php echo e($equipements->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__currentLoopData = $equipements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="modaldemo<?php echo e($equipement->id); ?>">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger"><?php echo e(__('VoulezSupprimer')); ?> : <?php echo e($equipement->label); ?> </h4>
                <form action="<?php echo e(route('servicetechnique.equipements.destroy', $equipement->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal"><?php echo e(__('Supprimer')); ?> !</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/servicetechnique/equipements/index.blade.php ENDPATH**/ ?>