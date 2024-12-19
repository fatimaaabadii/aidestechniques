<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row">

    <div class="card">
        <div class="card-body pb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-2"><?php echo e(__('Users')); ?></h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="page-options ms-auto" style="margin: 10% 0;">

                        <?php if(auth()->user()->roles->first()->role != 'directeur centrale'): ?>
                        <a href="<?php echo e(route('servicetechnique.user.create')); ?>" class="btn btn-primary">+ <?php echo e(__('Ajouter')); ?> </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="table-responsive">
                    <table id="trans" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                <th class="text-center"><?php echo e(__('Fonction')); ?></th>
                                <th class="text-center"><?php echo e(__('Nom ')); ?></th>
                                <th class="text-center"><?php echo e(__('Email')); ?></th>
                                <th class="text-center"><?php echo e(__('Tél')); ?></th>
                                <th class="text-center"><?php echo e(__('Matricule')); ?></th>
                                <th class="text-center"><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">

                                        <div class="flex-grow-1"><?php echo e($user->id); ?></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php if($user->is_supperadmin): ?>
                                    <button type="button" class="btn btn-sm btn-warning badge">Super Admin</button>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button type="button" class="btn btn-sm btn-warning badge"><?php echo e($role->role); ?></button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center"><?php echo e($user->name); ?></td>
                                <td class="text-center"><?php echo e($user->email); ?></td>
                                <td class="text-center"><?php echo e($user->phone); ?></td>
                                <td class="text-center"><?php echo e($user->ordinal_number); ?></td>
                                <td class="text-center">
                                        <div class="btn-group align-top">
                                            <a href="<?php echo e(route('servicetechnique.user.edit', $user->id)); ?>" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button"><?php echo e(__('Modifier')); ?> </a>
                                                <a data-bs-target="#modaldemo<?php echo e($user->id); ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary badge" ><i class="fa fa-trash"></i></a>
                                        </div>
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                    <?php echo e($users->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="modaldemo<?php echo e($user->id); ?>">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                <h4 class="text-danger"><?php echo e(__('VoulezSupprimer')); ?> : <?php echo e($user->name); ?> </h4>
                <form action="<?php echo e(route('servicetechnique.user.destroy', $user->id)); ?>" method="post">
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/servicetechnique/users/index.blade.php ENDPATH**/ ?>