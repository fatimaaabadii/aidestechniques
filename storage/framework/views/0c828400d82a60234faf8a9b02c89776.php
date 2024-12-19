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
                        <table id="trans" class="display">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                    <th class="text-center"><?php echo e(__('Demandeur')); ?></th>
                                    <th class="text-center"><?php echo e(__('Délégation')); ?></th>
                                    <th class="text-center"><?php echo e(__('Aide technique')); ?></th>
                                    
                                    <th class="text-center"><?php echo e(__('Date de Création')); ?></th>
                                    <th class="text-center"><?php echo e(__('Date de livraison')); ?></th>
                                    <th class="text-center"><?php echo e(__('Status')); ?></th>
                                    <th class="text-center"><?php echo e(__('Status Délégué')); ?></th>
                                    <th class="text-center"><?php echo e(__('Justification')); ?></th>
                                    <th class="text-center"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $demands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
    $backgroundColor = ''; // Aucune couleur appliquée
?>

                                <tr class="" style="<?php echo e($backgroundColor); ?>">
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"><?php echo e($demand->reference); ?></div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo e($demand->beneficiers->name); ?></td>
                                    <td class="text-center"><?php echo e($demand->delegations->label); ?></td>
                                    <td class="text-center"><?php echo e($demand->equipements->label); ?></td>
                                    
                                    <td class="text-center"><?php echo e(\Carbon\Carbon::parse($demand->beneficiers->created_at)->format('d/m/Y H:s')); ?> </td>
                                    <td class="text-center"><?php echo e(\Carbon\Carbon::parse($demand->date_livraison)->format('d/m/Y H:s')); ?> </td>
                                    <td class="text-center"><span class="badge bg-<?php if($demand->status == 'En cours de traitement'): ?>warning
                                        <?php elseif($demand->status == 'Confirmée'): ?>success
                                        <?php elseif($demand->status == 'Rejetée'): ?>danger <?php endif; ?>
                                        ">

                                        <?php if($demand->status == 'En cours de traitement'): ?>
                                            En cours de traitement
                                        <?php elseif($demand->status == 'Confirmée'): ?>
                                            Confirmée
                                        <?php elseif($demand->status == 'Rejetée'): ?>
                                              Rejetée
                                            <?php endif; ?>
                                    </span>
                                        </td>

                                        <td class="text-center">
                                        <span class="badge bg-<?php if($demand->status_delegue == 'En cours de traitement'): ?> warning
                                            <?php elseif($demand->status_delegue == 'Confirmée'): ?> success
                                            <?php elseif($demand->status_delegue == 'Rejetée'): ?> danger <?php endif; ?>">
                                            <?php echo e($demand->status_delegue); ?>

                                        </span>
                                    </td>


                                    <td class="text-center"><?php echo e($demand->justification); ?></td>
                                    <td class="text-center">
                                            <div class="btn-group align-top">
                                                <a href="<?php echo e(route('agentcoaph.demand.view', $demand->id)); ?>" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button"><?php echo e(__('Voir')); ?> </a>
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
        const demandes = <?php echo json_encode($demands, 15, 512) ?>; // Convertir les données PHP en JSON
        console.log(demandes); // Afficher les données dans la console du navigateur
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/agentcoaph/demands/index.blade.php ENDPATH**/ ?>