<?php

use App\Http\Controllers\DelegueProvincial\ValidationDelegueController;
use App\Http\Controllers\DelegueProvincial\ValidationRegionController;
use Illuminate\Support\Facades\Route;


    Route::prefix('ValidationDelegue')->group(function(){
        Route::get('/',[ValidationDelegueController::class,'index'])->name('delegueprovincial.demand');
        Route::get('/{id}',[ValidationDelegueController::class,'view'])->name('delegueprovincial.demand.view');
        Route::post('/{id}',[ValidationDelegueController::class,'update'])->name('delegueprovincial.demand.status.update');
    });

    Route::prefix('ValidationRegion')->group(function(){
        Route::get('/',[ValidationRegionController::class,'index'])->name('delegueprovincial.region');
        Route::get('/{id}',[ValidationRegionController::class,'view'])->name('delegueprovincial.region.view');
        Route::post('/{id}',[ValidationRegionController::class,'update'])->name('delegueprovincial.region.status.update');
    });
