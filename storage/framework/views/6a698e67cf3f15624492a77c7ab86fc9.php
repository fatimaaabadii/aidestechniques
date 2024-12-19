<?php
    use App\Models\RoleUser;
    use App\Models\Role;  // Assurez-vous que le modèle est importé
?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-block">
                <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?>


        <?php if($message = Session::get('error')): ?>
        <div class="alert alert-danger alert-block">
                <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Stock Aide Technique')); ?></h5>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="page-options ms-auto" style="margin: 10% 0;">
                            <a href="<?php echo e(route('directeurcentrale.stock.create')); ?>" class="btn btn-primary">+ <?php echo e(__('Ajouter')); ?> </a>
                        </div>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                    <th class="text-center"><?php echo e(__('Délégation')); ?></th>
                                    <th class="text-center"><?php echo e(__('Aide technique')); ?></th>

                                    <th class="text-center"><?php echo e(__('Quantité')); ?></th>
                                    <th class="text-center"><?php echo e(__('Status')); ?></th>
                                    <?php
            $hiddenRoles = ['Coordinateur régional', 'Directeur Central'];
            $userRole = App\Models\RoleUser::where('user_id', Auth::user()->id)->first();
            $role = $userRole ? App\Models\Role::find($userRole->role_id) : null;
        ?>
        <?php if(!$role || !in_array($role->role, $hiddenRoles)): ?>
            <th class="text-center"><?php echo e(__('Actions')); ?></th>
        <?php endif; ?>
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
                                    
    <?php
        
        $userRole = RoleUser::where('user_id', Auth::user()->id)->first();
        $role = $userRole ? Role::find($userRole->role_id) : null;
    ?>

    <?php if($role && !in_array($role->role, ['Coordinateur régional', 'Directeur Central'])): ?>
    <td class="text-center">
        <div class="btn-group align-top">
            <a href="<?php echo e(route('directeurcentrale.stock.edit', $stock->id)); ?>" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button"><?php echo e(__('Modifier')); ?></a>
            <a data-bs-target="#modaldemo<?php echo e($stock->id); ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary badge"><i class="fa fa-trash"></i></a>
        </div>
    <?php else: ?>
        
        </td><!-- Ou un autre message pour indiquer que la modification ou la suppression n'est pas possible -->
    <?php endif; ?>


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
    <div class="row">
        <div class="col-xl-6">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Stock Aide Technique Par Délégation')); ?></h5>
                    </div>

                </div>

                
                    <div class="table-responsive">
                        <table id="trans1" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                    <th class="text-center"><?php echo e(__('Aide Technique')); ?></th>
                                    <th class="text-center"><?php echo e(__('Délégation')); ?></th>

                                    <th class="text-center"><?php echo e(__('Quantité')); ?></th>
                                    
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
                                    <td class="text-center"><?php echo e($stock->equipements->label); ?></td>
                                    <td class="text-center"><?php echo e($stock->delegations->label); ?></td>

                                    <td class="text-center"><?php echo e($stock->quantity); ?></td>
                                    
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        <?php echo e($stocks->links()); ?>

                    </div>
                
            </div>
        </div>
    </div>
    <div class="col-xl-6">

        
        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Stock Aide Technique Par Région')); ?></h5>
                    </div>
               

                </div>

                
                    <div class="table-responsive">
                        <table id="trans2" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                    <th class="text-center"><?php echo e(__('Aide technique')); ?></th>
                                    <th class="text-center"><?php echo e(__('Région')); ?></th>

                                    <th class="text-center"><?php echo e(__('Quantité')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $stocksregions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stocksregion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"><?php echo e($stocksregion->id); ?></div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo e($stocksregion->equipements->label); ?></td>
                                    <td class="text-center"><?php echo e($stocksregion->regions->label); ?></td>

                                    <td class="text-center"><?php echo e($stocksregion->quantity); ?></td>
                                    
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
    </div>
    <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="modaldemo<?php echo e($stock->id); ?>">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger"><?php echo e(__('VoulezSupprimer')); ?> : <?php echo e($stock->equipements->label); ?> </h4>
                <form action="<?php echo e(route('directeurcentrale.stock.delete', $stock->id)); ?>" method="post">
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/directeurcentrale/stocks/index.blade.php ENDPATH**/ ?>