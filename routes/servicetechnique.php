<?php

use App\Http\Controllers\ServiceTechnique\ConnectionController;
use App\Http\Controllers\ServiceTechnique\CoordinateurController;
use App\Http\Controllers\ServiceTechnique\DisabilitieController;
use App\Http\Controllers\ServiceTechnique\RoleController;
use App\Http\Controllers\ServiceTechnique\UserController;
use App\Http\Controllers\ServiceTechnique\DisabilitiesController;
use App\Http\Controllers\ServiceTechnique\EquipementController;
use App\Http\Controllers\ServiceTechnique\TypeCoverageController;
use App\Http\Controllers\ServiceTechnique\TypeEquipementController;
use Illuminate\Support\Facades\Route;

Route::prefix('servicetechnique')->middleware(['serviceTechnique'])->group(function () {


    Route::prefix('equipements')->group(function(){
        Route::get('/',[EquipementController::class,'index'])->name('servicetechnique.equipements');
        Route::get('/create',[EquipementController::class,'create'])->name('servicetechnique.equipements.create');
        Route::post('/store',[EquipementController::class,'store'])->name('servicetechnique.equipements.store');
        Route::get('/edit/{id}',[EquipementController::class,'edit'])->name('servicetechnique.equipements.edit');
        Route::put('/update/{id}',[EquipementController::class,'update'])->name('servicetechnique.equipements.update');
        Route::delete('/delete/{id}',[EquipementController::class,'destroy'])->name('servicetechnique.equipements.destroy');

    });


    Route::prefix('disabilities')->group(function(){
        Route::get('/',[DisabilitieController::class,'index'])->name('servicetechnique.disabilitie');
        Route::get('/create',[DisabilitieController::class,'create'])->name('servicetechnique.disabilitie.create');
        Route::post('/store',[DisabilitieController::class,'store'])->name('servicetechnique.disabilitie.store');
        Route::get('/edit/{id}',[DisabilitieController::class,'edit'])->name('servicetechnique.disabilitie.edit');
        Route::put('/update/{id}',[DisabilitieController::class,'update'])->name('servicetechnique.disabilitie.update');
        Route::delete('/delete/{id}',[DisabilitieController::class,'destroy'])->name('servicetechnique.disabilitie.destroy');

    });

        Route::prefix('TypeCoverage')->group(function(){
            Route::get('/',[TypeCoverageController::class,'index'])->name('servicetechnique.TypeCoverage');
            Route::get('/create',[TypeCoverageController::class,'create'])->name('servicetechnique.TypeCoverage.create');
            Route::post('/store',[TypeCoverageController::class,'store'])->name('servicetechnique.TypeCoverage.store');
            Route::get('/edit/{id}',[TypeCoverageController::class,'edit'])->name('servicetechnique.TypeCoverage.edit');
            Route::put('/update/{id}',[TypeCoverageController::class,'update'])->name('servicetechnique.TypeCoverage.update');
            Route::delete('/delete/{id}',[TypeCoverageController::class,'destroy'])->name('servicetechnique.TypeCoverage.destroy');

        });
        Route::prefix('TypeEquipement')->group(function(){
            Route::get('/',[TypeEquipementController::class,'index'])->name('servicetechnique.TypeEquipement');
            Route::get('/create',[TypeEquipementController::class,'create'])->name('servicetechnique.TypeEquipement.create');
            Route::post('/store',[TypeEquipementController::class,'store'])->name('servicetechnique.TypeEquipement.store');
            Route::get('/edit/{id}',[TypeEquipementController::class,'edit'])->name('servicetechnique.TypeEquipement.edit');
            Route::put('/update/{id}',[TypeEquipementController::class,'update'])->name('servicetechnique.TypeEquipement.update');
            Route::delete('/delete/{id}',[TypeEquipementController::class,'destroy'])->name('servicetechnique.TypeEquipement.destroy');

        });

    // Coordinateurs
    Route::get('/coordinateurs', [CoordinateurController::class, 'index'])->name('servicetechnique.coordinateur');
    Route::get('/createCoordinateur', [CoordinateurController::class, 'create'])->name('servicetechnique.coordinateur.create');
    Route::post('/storeCoordinateur', [CoordinateurController::class, 'store'])->name('servicetechnique.coordinateur.store');
    Route::get('/editCoordinateur/{id}', [CoordinateurController::class, 'edit'])->name('servicetechnique.coordinateur.edit');
    Route::put('/updateCoordinateur/{id}', [CoordinateurController::class, 'update'])->name('servicetechnique.coordinateur.update');
    Route::delete('/deleteCoordinateur/{id}', [CoordinateurController::class, 'destroy'])->name('servicetechnique.coordinateur.destroy');


    // Users
    Route::get('/users', [UserController::class, 'index'])->name('servicetechnique.user');
    Route::get('/createUser', [UserController::class, 'create'])->name('servicetechnique.user.create');
    Route::post('/storeUser', [UserController::class, 'store'])->name('servicetechnique.user.store');
    Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('servicetechnique.user.edit');
    Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('servicetechnique.user.update');
    Route::delete('/deleteUser/{id}', [UserController::class, 'destroy'])->name('servicetechnique.user.destroy');

    //Route::get('/role', [RoleController::class, 'index'])->name('servicetechnique.role');
    Route::get('/connection', [ConnectionController::class, 'index'])->name('servicetechnique.connection');


    //Disabilities
    // Route::get('/disabilities', [DisabilitiesController::class, 'index'])->name('servicetechnique.index');
});



