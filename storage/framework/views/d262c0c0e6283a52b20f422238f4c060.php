<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Demandes saisies par COAPH')); ?></h5>
                    </div>
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                    <th class="text-center"><?php echo e(__('Demandeur')); ?></th>
                                    <th class="text-center"><?php echo e(__('Aide technique')); ?></th>
                                    <th class="text-center"><?php echo e(__('Délégation')); ?></th>
                                    <th class="text-center"><?php echo e(__('Status Délégué')); ?></th>
                                    <th class="text-center"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $demands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($demand->id); ?></td>
                                    <td class="text-center"><?php echo e($demand->beneficiers->name ?? 'N/A'); ?></td>
                                    <td class="text-center"><?php echo e($demand->equipements->label ?? 'N/A'); ?></td>
                                    <td class="text-center"><?php echo e($demand->delegations->label ?? 'N/A'); ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-<?php if($demand->status_delegue == 'En cours de traitement'): ?> warning
                                            <?php elseif($demand->status_delegue == 'Confirmée'): ?> success
                                            <?php elseif($demand->status_delegue == 'Rejetée'): ?> danger <?php endif; ?>">
                                            <?php echo e($demand->status_delegue); ?>

                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group align-top">
                                            <a href="<?php echo e(route('delegueprovincial.demand.view', $demand->id)); ?>" class="btn btn-sm btn-primary badge" type="button">
                                                <?php echo e(__('Voir')); ?>

                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($demands->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var demands = <?php echo json_encode($demands->items()); ?>;

    // Afficher les données dans la console
    console.log(demands);
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/delegueprovincial/validationdemand/index.blade.php ENDPATH**/ ?>