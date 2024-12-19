<?php $__env->startSection('content'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Colonne pour la charte -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body" style="position: relative;">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                </div>
                            </div>
                            <h2 class="font-size-15 me-2 mb-8"> Répartition des demandes par statut </h2>
                            <div id="chart-donut"
                                data-colors="[&quot;--bs-primary&quot;, &quot;--bs-success&quot;,&quot;--bs-danger&quot;]"
                                class="apex-charts" dir="ltr" style="min-height: 265.7px;">
                                <canvas id="chartId" aria-label="chart" style="width: 100%; height:100%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Colonne pour les informations des demandes -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body" style="position: relative;">
                            <h2 class="font-size-15 me-2"> Résumé des demandes  </h2>
                            
                            <div class="order-wid-list d-flex justify-content-between">
                                <p class="mb-0"><i class="mdi mdi-square-rounded font-size-10 text-danger me-2"></i>
                                    Demandes totales.
                                </p>
                                <div>
                                    <span class="pe-5">
                                        <?php echo e($demmands->count()); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row-->
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>2023 © Fidiacom.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Fidiacom
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function(){
            $('#tableDash').DataTable({
                processing: true,
                "pageLength": 8,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json',
                },
            });
        });

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/coordinationregionale/dashboard/index.blade.php ENDPATH**/ ?>