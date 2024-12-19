<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">Les Délégations</h4>


                </div><!-- end card header -->
                <div class="card-body">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th>
                                    Délégation
                                </th>
                                <th>Région</th>
                                <th>Téléphone</th>
                                <th>Téléphone Fix</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $delegations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delagation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('directeurcentrale.delegations.detail', $delagation->id)); ?>">
                                        <?php echo e($delagation->label); ?>

                                    </a>
                                </td>
                                <td><?php echo e($delagation->region->label); ?></td>
                                <td><?php echo e($delagation->phone_1); ?></td>
                                <td><?php echo e($delagation->fix ?? '--------'); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/directeurcentrale/delegations/index.blade.php ENDPATH**/ ?>