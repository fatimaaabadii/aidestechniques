<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body pb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"><?php echo e(__('Demandes')); ?></h5>
                    </div>

                </div>

                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td ><?php echo e(__('Réf : ')); ?></td>
                                    <td >
                                            <?php echo e($demand->id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Nom : ')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Cin : ')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->cin); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Tél :')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->phone); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Email :')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->email); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Addresse :')); ?></td>
                                    <td >
                                            <?php echo e($demand->beneficiers->address); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Equipement : ')); ?></td>
                                    <td >
                                            <?php echo e($demand->equipements->label); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo e(__('Délégation :')); ?></td>
                                    <td >
                                            <?php echo e($demand->delegations->label); ?>

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




                                <form action="<?php echo e(route('agentcoaph.demand.status.update', $demand->id)); ?>" method="post" style="display: flex; gap: 15px; max-width: 300px;">
                                <?php echo csrf_field(); ?>


                                <tr>

                                    <td ><?php echo e(__('Status')); ?></td>
                                    <td >

                                            <select name="status">
                                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($status); ?>" <?php if($demand->status == $status): ?> selected <?php endif; ?>><?php echo e($status); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <button type="submit" class="btn btn-success"><?php echo e(__('Modifier')); ?></button>
                                        </td>
                                </tr>


                                <tr>
                                    <td ><?php echo e(__('Justification')); ?></td>
                                    <td >
                                            <input type="text" name="justification" id="justification">
                                    </td>
                                </tr>

                            </form>



                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/agentcoaph/demands/view.blade.php ENDPATH**/ ?>