<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/pulic/css/tailwin.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <!--This is navbar-->

    <nav class="bg-white  w-full  border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="<?php echo e(asset('assets/beneficiers/logo1.png')); ?>" class="h-12 mr-3" alt="Flowbite Logo" />
            </a>
            <div class="flex md:order-2">
                <a href="#" class="flex items-center">
                    <img src="<?php echo e(asset('assets/beneficiers/logo2.png')); ?>" class="h-16 mr-3" alt="Flowbite Logo" />
                </a>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                   
                </ul>
            </div>
        </div>
    </nav>
    <div class=" w-full h-20 bg-[url('<?php echo e(asset('assets/beneficiers/morocooc2.png')); ?>')] opacity-20	"></div>
        <!--This is canter-->
        <div class="w-full flex justify-center  sm:py-8">
            <div class="w-1/2 px-5 py-4  bg-white border border-gray-200 rounded-lg shadow sm:p-8">
                <h5 class="mb-10 text-5xl text-center font-bold text-fuchsia-900">
                    Nouvelle demande
                </h5>


                <section class="bg-white ">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <form action="<?php echo e(route('demand.store')); ?>" class="flex flex-col" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="fullName" class="block mb-2 text-sm font-medium text-gray-900">
                                        Nom complet
                                    </label>
                                    <input
                                        type="text"
                                        name="fullName"
                                        id="fullName"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Entrez votre Nom Complet"
                                        required
                                        value="<?php echo e(old('fullName')); ?>"
                                    >
                                    <?php $__errorArgs = ['fullName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="w-full">
                                    <label for="cin" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Numéro CIN
                                    </label>
                                    <input
                                        type="text"
                                        name="cin"
                                        id="cin"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Entrez votre Numero CIN"
                                        required
                                        value="<?php echo e(old('cin')); ?>"
                                    >
                                    <?php $__errorArgs = ['cin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="w-full">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Entrez votre Email"
                                        required
                                        value="<?php echo e(old('email')); ?>"
                                    >
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="w-full">
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                                    Téléphone
                                    </label>
                                    <input
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Entrez votre Numero Telephone"
                                        required
                                        value="<?php echo e(old('phone')); ?>"
                                    >
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="adress" class="block mb-2 text-sm font-medium text-gray-900">
                                        Adresse
                                    </label>
                                    <input
                                        type="text"
                                        name="adress"
                                        id="adress"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Entrez votre adresse"
                                        required
                                        value="<?php echo e(old('adress')); ?>"
                                    >
                                    <?php $__errorArgs = ['adress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                <div>
                                    <label for="sexe"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Sexe
                                    </label>
                                    <select
                                        id="sexe"
                                        name="sexe"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">

                                        <option selected="0">Choisir le sexe</option>
                                        <option value="female">Femme</option>
                                        <option value="male">Homme</option>
                                    </select>
                                    <?php $__errorArgs = ['sexe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                <div class="w-full">
                                    <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900">
                                        Date de naissance
                                    </label>
                                    <input
                                        id="birthday"
                                        name="birthday"
                                        type="date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Sélectionner une date"
                                    >
                                    <?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                

                                <div class="w-full">
                                    <label for="delegation" class="block mb-2 text-sm font-medium text-gray-900">
                                    Délégation provinciale
                                    </label>
                                    <select
                                        name="delegation"
                                        id="delegation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="0">Choisir une délégation</option>
                                        <?php $__currentLoopData = $delegations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($delegation->id); ?>">
                                                <?php echo e($delegation->label); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['delegation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="coverage" class="block mb-2 text-sm font-medium text-gray-900">
                                    Type de couverture santé
                                    </label>
                                    <select
                                        id="coverage"
                                        name="coverage"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="0">Choisir la couverture santé</option>
                                        <?php $__currentLoopData = $coverageTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id); ?>">
                                                <?php echo e($type->label); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php $__errorArgs = ['coverage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>





                                <div>
                                    <label for="handicap" class="block mb-2 text-sm font-medium text-gray-900">
                                    Type de handicap
                                    </label>
                                    <select
                                        id="handicap"
                                        name="handicap"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                    >
                                        <option selected="0">Choisir le type de handicap</option>
                                        <?php $__currentLoopData = $disabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disabilitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($disabilitie->id); ?>"><?php echo e($disabilitie->label); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['handicap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">
                                        Image d'handicap
                                    </label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                        id="file_input"
                                        type="file"
                                        name="handcapImage"

                                    >
                                    <?php $__errorArgs = ['handcapImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="w-full mt-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">
                                Certificat médical de handicap
                                </label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    id="file_input"
                                    type="file"
                                    name="hanciapCertificate"
                                >
                                <?php $__errorArgs = ['hanciapCertificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="w-full  mt-4">

                                <label class="block mb-2 text-sm font-medium capitalize text-gray-900 " for="equipement">
                                    équipement
                                </label>
                                <select
                                    id="equipement"
                                    name="equipement"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5                 ">
                                    <option selected="0">Choisir un équipement</option>
                                    <?php $__currentLoopData = $equipements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($equipement->id); ?>">
                                            <?php echo e($equipement->label); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['equipement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>

                            <button type="submit"
                                class="items-center flex justify-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-900 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                                Envoyer
                            </button>
                        </form>
                    </div>
                </section>


            </div>
        </div>





    <!--This is footer-->

    <footer class="bg-gray-500 bg-[url('<?php echo e(asset('assets/beneficiers/morocooc.png')); ?>')]">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center bg-white rounded-lg p-5">
                        <img src="<?php echo e(asset('assets/beneficiers/logo1.png')); ?>" class="h-8 mr-3" alt="FlowBite Logo" />
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-xl font-semibold text-white uppercase">
                            Plan du site
                        </h2>
                        <ul class="text-white font-medium">
                            <li class="mb-2">
                                <a href="https://entraide.ma/" class="hover:underline">Entraide Nationale </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://entraide.ma/ar/programmes&services" class="hover:underline">Programmes et services
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://entraide.ma/ar/centres" class="hover:underline">Établissements et Centres
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://entraide.ma/ar/articles" class="hover:underline">Activités </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://entraide.ma/ar/events" class="hover:underline">Espace média </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://entraide.ma/ar/e-services" class="hover:underline">E-Services </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://entraide.ma/ar/annonces" class="hover:underline">Annonces </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-xl font-semibold text-white uppercase">
                            Contact
                        </h2>
                        <ul class="text-white font-medium">
                            <li class="mb-4">
                                <div class="hover:underline">
                                    20, rue El Mariniyine,<br />
                                    BP 750 - Hassan RABAT
                                </div>
                            </li>
                            <li>
                                <div class="hover:underline">05 37 70 51 50</div>
                                <div class="hover:underline">05 37 70 43 73</div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-xl font-semibold text-white uppercase">
                            Interagissez avec nous
                        </h2>
                        <ul class="text-white font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">@entraide_maroc</a>
                            </li>
                            <li class="flex">
                                <a href="https://www.youtube.com/@entraidenationale7526" class="hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                    </svg>
                                </a>

                                <a href="https://www.facebook.com/people/%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%B3%D9%85%D9%8A%D8%A9-%D9%84%D9%85%D8%A4%D8%B3%D8%B3%D8%A9-%D8%A7%D9%84%D8%AA%D8%B9%D8%A7%D9%88%D9%86-%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A/100064920572710/" class="hover:underline pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                    </svg>
                                </a>

                                <a href="https://x.com/i/flow/login?redirect_after_login=%2FEntraideMaroc" class="hover:underline pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>

                                <a href="https://www.instagram.com/entraide_nationale_maroc/" class="hover:underline pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-center">
                <span class="text-sm text-white sm:text-center">© 2023
                    <a href="h#" class="hover:underline">Entraide Nationale™</a>. All
                    Rights Reserved.
                </span>
            </div>
        </div>
    </footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</html>
<?php /**PATH C:\Users\hp\Downloads\html\resources\views/demmand.blade.php ENDPATH**/ ?>