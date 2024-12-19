<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row">

    <div class="card">
        <div class="card-body pb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-2"><?php echo e(__('Connexion')); ?></h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="page-options ms-auto" style="margin: 10% 0;">
                        
                    </div>
                </div>
            </div>

            <div class="">
                <div class="table-responsive">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo e(__('Id')); ?></th>
                                <th class="text-center"><?php echo e(__('Nom ')); ?></th>
                                <th class="text-center"><?php echo e(__('Status')); ?></th>
                                <th class="text-center"><?php echo e(__('Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $loginHistoriques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loginHistorique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                            <tr>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1"><?php echo e($loginHistorique->id); ?></div>
                                    </div>
                                </td>
                                <td class="text-center"><?php echo e($loginHistorique->user->name); ?></td>
                                <td class="text-center"><?php echo e($loginHistorique->loginstatus->name); ?></td>
                                <td class="text-center"><?php echo e($loginHistorique->created_at); ?></td>                            
                                
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/servicetechnique/connection/index.blade.php ENDPATH**/ ?>