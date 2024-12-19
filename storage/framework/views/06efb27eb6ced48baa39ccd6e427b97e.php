<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Système de gestion des demandes coaph</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">

    <!-- plugin css -->
    <link href="<?php echo e(asset('assets/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- swiper css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/swiper/swiper-bundle.min.css')); ?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/choices.js/public/assets/styles/choices.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.css')); ?>">

    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <style>
        #page-topbar {
            background: #ffffff!important;
        }

        .navbar-brand-box {
            background: #ffffff !important;
            height: 0px;
        }
        .navbar-nav .nav-link {
    color: #000000 !important; /* Noir pour les liens de navigation */
     }

.navbar-brand {
    color: #000000 !important; /* Noir pour le logo ou le nom de la marque */
}
    </style>
</head>


<body data-layout="horizontal" data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        
        <?php echo $__env->make('layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

        <div class="hori-overlay"></div>



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        
        <div class="main-content">
            <div class="page-content">
                <?php echo $__env->yieldContent('content'); ?>;
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            
            <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/metismenujs/metismenujs.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/feather-icons/feather.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('js\jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js\jquery.magnific-popup.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.image').magnificPopup({
                type: 'image'
            });
        });
    </script>
    

    <!-- apexcharts -->
    <script src="<?php echo e(asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- Vector map-->
    <script src="<?php echo e(asset('assets/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jsvectormap/maps/world-merc.js')); ?>"></script>

    <!-- swiper js -->
    <script src="<?php echo e(asset('assets/libs/swiper/swiper-bundle.min.js')); ?>"></script>

    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script src="<?php echo e(asset('assets/js/pages/dashboard.init.js')); ?>"></script>

    

    

    <script src="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/libs/@simonwep/pickr/pickr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/choices.js/public/assets/scripts/choices.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('#trans').DataTable({
                processing: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json',
                },
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#trans1').DataTable({
                processing: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json',
                },
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#trans2').DataTable({
                processing: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json',
                },
            });
        })
    </script>
</body>


</html>
<?php /**PATH C:\Users\hp\Downloads\html\resources\views/layouts/master.blade.php ENDPATH**/ ?>