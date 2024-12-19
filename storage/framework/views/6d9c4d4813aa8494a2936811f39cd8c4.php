<?php $__env->startSection('content'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        



                        <div class="">
                            <div class="table-responsive">
                                <table id="trans" class="display">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo e(__('Réf')); ?></th>
                                            <th class="text-center"><?php echo e(__('Demandeur')); ?></th>
                                            <th class="text-center"><?php echo e(__('Délégation')); ?></th>
                                            <th class="text-center"><?php echo e(__('Équipement')); ?></th>
                                            
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
                                                    Refusée
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


                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body" style="position: relative;">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    
                                </div>

                            </div>
                             <h2 class="font-size-15 me-2 mb-8"> Répartition des demandes par statut </h2>
                           
                            <div id="chart-donut"
    data-colors='["#D7BDE2", "#A9DFBF", "#F5B7B1"]'
     class="apex-charts" dir="ltr" style="min-height: 265.7px;">
    <canvas id="chartId" aria-label="chart" style="width: 100%; height:100%"></canvas>
</div>

                            <div class="mt-4">
                            <h2 class="font-size-15 me-2"> Résumé des demandes par origine </h2>
                               
                                <div class="order-wid-list d-flex justify-content-between">
                                    <p class="mb-0"><i
                                            class="mdi mdi-square-rounded font-size-10 text-danger me-2"></i>
                                            Demandes totales
                                    </p>
                                    <div>
                                        <span class="pe-5">
                                            <?php echo e($demmands->count()); ?>

                                        </span>

                                    </div>
                                </div>
                            </div>

                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 516px; height: 461px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        <i class="mdi mdi-heart text-danger"></i> 
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>

// tableDash

        $(document).ready(function(){
            $('#tableDash').DataTable({
                processing: true,
                "pageLength": 8,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json',
                },

            });
        })
        var chrt = document.getElementById("chartId").getContext("2d");

        var enregistrer = <?php echo e($demmands->where('status', '=', 'En cours de traitement')->count()); ?>;
        var validee  = <?php echo e($demmands->where('status', '=', 'Confirmée')->count()); ?>;
        var rejetee = <?php echo e($demmands->where('status', '=', 'Rejetée')->count()); ?>;


        var chartId = new Chart(chrt, {
            type: 'doughnut',
            data: {
                labels: ["Enregistrées", "Validées", "Rejetées"],
                datasets: [{
                    label: "online tutorial subjects",
                    data: [enregistrer, validee, rejetee],
                    backgroundColor: ['#38A89D', '#6C63FF', '#E74C3C'],
                    hoverOffset: 5
                }],
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                }
            }
        });
    </script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Downloads\html\resources\views/agentcoaph/dashboard/index.blade.php ENDPATH**/ ?>