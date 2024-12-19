<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Demande Saisie par COAPH')); ?></h5>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td ><?php echo e(__('Réf')); ?></td>
                                    <td >
                                            <?php echo e($demand->id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Demandeur')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('CIN')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->cin); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Tél')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->phone); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Email')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->email); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Adresse')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->address); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Equipement')); ?></td>
                                    <td >
                                            <?php echo e($demand->equipements->label); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Délégation')); ?></td>
                                    <td >
                                            <?php echo e($demand->delegations->label); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Status(agentCOAPH)')); ?></td>
                                    <td >
                                            <?php echo e(__('Demande Saisie par COAPH')); ?>

                                    </td>
                                </tr>
                                
                                <?php if($demand->beneficiers->image_cin != null): ?>
<tr>
    <td><?php echo e(__('Image CIN :')); ?></td>
    <td>
        <a href="<?php echo e(route('download.file', ['type' => 'cin', 'beneficiaryId' => $demand->beneficiers->id])); ?>">
            Télécharger
        </a>
    </td>
</tr>
<?php endif; ?>

<?php if($demand->beneficiers->image != null): ?>
<tr>
    <td><?php echo e(__('Image :')); ?></td>
    <td>
        <a href="<?php echo e(route('download.file', ['type' => 'image', 'beneficiaryId' => $demand->beneficiers->id])); ?>">
            Télécharger
        </a>
    </td>
</tr>
<?php endif; ?>

<?php if($demand->beneficiers->document != null): ?>
<tr>
    <td><?php echo e(__('Document :')); ?></td>
    <td>
        <a href="<?php echo e(route('download.file', ['type' => 'document', 'beneficiaryId' => $demand->beneficiers->id])); ?>">
            Télécharger
        </a>
    </td>
</tr>
<?php endif; ?>
                                <tr>

                                   
    <?php
        use App\Models\RoleUser; 
        use App\Models\Role;

        $userRole = RoleUser::where('user_id', Auth::user()->id)->first();
        $role = $userRole ? Role::find($userRole->role_id) : null;
    ?>

    <?php if($role): ?>
    <td><?php echo e(__('Status')); ?></td>
    <td>
        <form action="<?php echo e(route('delegueprovincial.demand.status.update', $demand->id)); ?>" method="post" style="display: flex; gap: 15px; max-width: 300px;">
            <?php echo csrf_field(); ?>
            
            <?php if($role->role == 'Coaph'): ?>
                <!-- Champ pour Agent COAPH (mise à jour du champ 'status') -->
                <select name="status">
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status); ?>" <?php if($demand->status == $status): ?> selected <?php endif; ?>><?php echo e($status); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="btn btn-success"><?php echo e(__('Modifier')); ?></button>

            <?php elseif($role->role == 'Délégué provincial'): ?>
                <!-- Champ pour Délégué provincial (mise à jour du champ 'status_delegue') -->
                <select name="status_delegue">
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_delegue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status_delegue); ?>" <?php if($demand->status_delegue == $status_delegue): ?> selected <?php endif; ?>><?php echo e($status_delegue); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="btn btn-success"><?php echo e(__('Modifier')); ?></button>

            <?php else: ?>
                <!-- Aucun champ à modifier -->
                <span><?php echo e(__('Aucun statut à modifier')); ?></span>
            <?php endif; ?>

        </form>
    </td>
<?php endif; ?>
</td>

                                </tr>



                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/delegueprovincial/validationdemand/view.blade.php ENDPATH**/ ?>