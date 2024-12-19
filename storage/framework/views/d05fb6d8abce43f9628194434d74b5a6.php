<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Validation du Stock aide technique')); ?></h5>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                    <th class="text-center"><?php echo e(__('Délégation')); ?></th>
                                    <th class="text-center"><?php echo e(__('aide technique')); ?></th>
                                    <th class="text-center"><?php echo e(__('Quantité')); ?></th>
                                    <th class="text-center"><?php echo e(__('Status')); ?></th>
                                    <th class="text-center"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"><?php echo e($stock->id); ?></div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo e($stock->delegations->label); ?></td>
                                    <td class="text-center"><?php echo e($stock->equipements->label); ?></td>
                                    <td class="text-center"><?php echo e($stock->quantity); ?></td>
                                    <td class="text-center"><span class="badge bg-<?php if($stock->status == 'En cours de traitement'): ?>warning
                                        <?php elseif($stock->status == 'Confirmé'): ?>success
                                        <?php elseif($stock->status == 'Rejeté'): ?>danger <?php endif; ?>
                                        ">
                                        <?php echo e($stock->status); ?>

                                    </span>
                                        </td>
                                    <td class="text-center">
                                            <div class="btn-group align-top">
                                                <a href="<?php echo e(route('agentcoaph.stock.view', $stock->id)); ?>" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button"><?php echo e(__('Voir')); ?> </a>
                                            </div>
                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        <?php echo e($stocks->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/agentcoaph/validationStock/index.blade.php ENDPATH**/ ?>