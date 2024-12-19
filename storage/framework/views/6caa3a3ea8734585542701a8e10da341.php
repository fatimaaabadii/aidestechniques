<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="<?php echo e(route('home')); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo e(asset('assets/logo.png')); ?>" alt="" style="width: 5.5rem">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(asset('assets/logo.png')); ?>" alt="" style="width: 5.5rem">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', Auth::user())): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-user"></i>
                                <span data-key="t-elements">Gestion des utilisateurs</span> <div class="arrow-down"></div>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                        <a href="<?php echo e(route('servicetechnique.user')); ?>" class="dropdown-item" data-key="t-alerts">Utilisateurs</a>

                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewMenuBenificier', App\Models\Beneficier::class)): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-check
"></i>
                                <span data-key="t-elements">Gestion des demandeurs</span> <div class="arrow-down"></div>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Beneficier::class)): ?>
                                        <a href="<?php echo e(route('agentcoaph.beneficiers')); ?>" class="dropdown-item" data-key="t-alerts">Liste des demandeurs</a>
                                        <a href="<?php echo e(route('agentcoaph.beneficiers.create')); ?>" class="dropdown-item" data-key="t-alerts">Ajouter un nouveau demandeur</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Equipement::class)): ?>
                                        <a href="<?php echo e(route('servicetechnique.equipements')); ?>" class="dropdown-item" data-key="t-buttons">Aides Techniques</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Disabilitie::class)): ?>
                                        <a href="<?php echo e(route('servicetechnique.disabilitie')); ?>" class="dropdown-item" data-key="t-cards">Handicaps</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Typeofcoverage::class)): ?>
                                        <a href="<?php echo e(route('servicetechnique.TypeCoverage')); ?>" class="dropdown-item" data-key="t-dropdowns">Couverture Sociale</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Typeofequipement::class)): ?>
                                        <a href="<?php echo e(route('servicetechnique.TypeEquipement')); ?>" class="dropdown-item" data-key="t-grid">Type d'Equipement</a>
                                    <?php endif; ?>

                                    </div>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Loginhistorique::class)): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link arrow-none" href="<?php echo e(route('servicetechnique.connection')); ?>" id="topnav-uielement" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-tone icon"></i>
                                <span data-key="t-elements">Gestion des connexions</span> <div class=""></div>
                            </a>


                                </li>
                                <?php endif; ?>


                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewMenuDemand', App\Models\Stock::class)): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-file"></i>
                                <span data-key="t-elements">Gestion des demandes</span> <div class="arrow-down"></div>

                                </a>

                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Demand::class)): ?>
                                        <a href="<?php echo e(route('agentcoaph.demand')); ?>" class="dropdown-item" data-key="t-buttons">Demandes</a>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->roles->first()->role != 'directeur'): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Stock::class)): ?>
                                            <a href="<?php echo e(route('delegueprovincial.demand')); ?>" class="dropdown-item" data-key="t-alerts">Validation des demandes</a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewMenu', App\Models\Stock::class)): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-package"></i>
                                <span data-key="t-elements">Gestion de Stock</span> <div class="arrow-down"></div>

                                </a>

                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAnyStock', App\Models\Stock::class)): ?>
                                        <a href="<?php echo e(route('directeurcentrale.stock')); ?>" class="dropdown-item" data-key="t-alerts">Stock</a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Stock::class)): ?>
                                        <a href="<?php echo e(route('agentcoaph.stock')); ?>" class="dropdown-item" data-key="t-cards">Validation du Stock</a>
                                    <?php endif; ?>
                                    
                                   
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_delegation_index', App\Models\Delegation::class)): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('directeurcentrale.delegations')); ?>" id="topnav-uielement" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-map"></i>
                                <span data-key="t-elements">Délégations</span>

                                </a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </nav>
            </div>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                        <span class="user-name" style="color: #000000;"><?php echo e(Auth::user()->name); ?> <i class="mdi mdi-chevron-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header"> </h6>
                    <a class="dropdown-item" href="<?php echo e(route('agentcoaph.profile')); ?>"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Profil</span></a>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Déconnexion</span></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>

                </div>
            </div>
        </div>

    </div>



</header>
<?php /**PATH /var/www/html/resources/views/layouts/partials/header.blade.php ENDPATH**/ ?>