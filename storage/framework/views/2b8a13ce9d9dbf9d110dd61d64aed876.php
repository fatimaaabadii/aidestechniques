<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Demandeurs')); ?></h5>
                    </div>
                    <div class="flex-shrink-0" >
                        <div class="page-options ms-auto" style="margin: 10% 0;">
                            
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                    <th class="text-center"><?php echo e(__('Demandeur')); ?></th>
                                    <th class="text-center"><?php echo e(__('CIN')); ?></th>
                                    <th class="text-center"><?php echo e(__('Email')); ?></th>
                                    <th class="text-center"><?php echo e(__('Tél')); ?></th>
                                    <th class="text-center"><?php echo e(__('Adresse')); ?></th>
                                    <th class="text-center"><?php echo e(__('Sexe')); ?></th>
                                    <th class="text-center"><?php echo e(__('Milieu')); ?></th>
                                    <th class="text-center"><?php echo e(__('Date de rendez vous')); ?></th>
                                    
                                    <th class="text-center"><?php echo e(__('Type de handicap')); ?></th>
                                    <th class="text-center"><?php echo e(__('Couverture Sociale')); ?></th>
                                    <th class="text-center"><?php echo e(__('Aide technique')); ?></th>
                                    
                                    <th class="text-center"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $beneficiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"><?php echo e($beneficier->id); ?></div>
                                        </div>
                                    </td>
                                        <td class="text-center"><?php echo e($beneficier->name); ?></td>
                                    <td class="text-center"><?php echo e($beneficier->cin); ?></td>
                                    <td class="text-center"><?php echo e($beneficier->email); ?></td>
                                    <td class="text-center"><?php echo e($beneficier->phone); ?></td>
                                    <td class="text-center"><?php echo e($beneficier->address); ?></td>
                                    <td class="text-center">
                                        <?php if($beneficier->sexe == 1): ?>
                                        <?php echo e(__('Homme')); ?>

                                        <?php else: ?>
                                        <?php echo e(__('Femme')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($beneficier->milieu == 1): ?>
                                        <?php echo e(__('Urbain')); ?>

                                        <?php else: ?>
                                        <?php echo e(__('Rurale')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?php echo e($beneficier->date_RDV); ?></td>
                                    
                                    <td class="text-center"><?php echo e($beneficier->disabilities->label); ?></td>
                                    <td class="text-center"><?php echo e($beneficier->typeofconverages->label); ?></td>
                                    <td class="text-center"><?php echo e($beneficier->equipements->label); ?></td>
                                    <td class="text-center">
                                            <div class="btn-group align-top">
                                                <a href="<?php echo e(route('agentcoaph.beneficiers.edit', $beneficier->id)); ?>" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button"><?php echo e(__('Modifier')); ?> </a>
                                                    <a data-bs-target="#modaldemo<?php echo e($beneficier->id); ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary badge" ><i class="fa fa-trash"></i></a>
                                            </div>
                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        <?php echo e($beneficiers->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php $__currentLoopData = $beneficiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="modaldemo<?php echo e($beneficier->id); ?>">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger"><?php echo e(__('VoulezSupprimer')); ?> : <?php echo e($beneficier->name); ?> </h4>
                <form action="<?php echo e(route('agentcoaph.beneficiers.delete', $beneficier->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal"><?php echo e(__('Deleted')); ?> !</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/agentcoaph/beneficiers/index.blade.php ENDPATH**/ ?>