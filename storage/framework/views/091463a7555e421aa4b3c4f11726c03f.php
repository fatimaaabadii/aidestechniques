<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body pb-3">
                <!-- ... Autres parties du code ... -->
                <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                <tbody>
                <tr>
                                    <td><?php echo e(__('Réf')); ?></td>
                                    <td><?php echo e($stock->id); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Equipement')); ?></td>
                                    <td><?php echo e($stock->equipements->label); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Délégation')); ?></td>
                                    <td><?php echo e($stock->delegations->label); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Quantité')); ?></td>
                                    <td><?php echo e($stock->quantity); ?></td>
                                </tr>
                                <tr>
   
        <?php
            use App\Models\RoleUser;
            use App\Models\Role;  // Assurez-vous que le modèle est importé
            $userRole = RoleUser::where('user_id', Auth::user()->id)->first();
            $role = $userRole ? Role::find($userRole->role_id) : null;
        ?>

        <?php if($role && !in_array($role->role, ['Coordinateur régional', 'Directeur Central'])): ?>
        <td><?php echo e(__('Status')); ?></td>
        <td>
            <form action="<?php echo e(route('agentcoaph.stock.status.update', $stock->id)); ?>" method="post" style="display: flex; gap: 15px; max-width: 300px;">
                <?php echo csrf_field(); ?>
                <select name="status">
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status); ?>" <?php if(is_array($stock->status) ? in_array($status, $stock->status) : $stock->status == $status): ?> selected <?php endif; ?>><?php echo e($status); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="btn btn-success"><?php echo e(__('Modifier')); ?></button>
            </form>
        <?php else: ?>
            <span>N/A</span> <!-- Ou un autre message pour indiquer que la modification n'est pas possible -->
        <?php endif; ?>
    </td>
</tr>

                </tbody>
                        </table>
                <!-- ... Reste du code ... -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/agentcoaph/validationStock/view.blade.php ENDPATH**/ ?>