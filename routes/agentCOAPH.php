<?php

use App\Http\Controllers\AgentCOAPH\BeneficierController;

use App\Http\Controllers\AgentCOAPH\DemandController;
use App\Http\Controllers\AgentCOAPH\ValidationStockController;
use Illuminate\Support\Facades\Route;



    Route::prefix('beneficiers')->group(function(){
        Route::get('/',[BeneficierController::class,'index'])->name('agentcoaph.beneficiers');
        Route::get('/create',[BeneficierController::class,'create'])->name('agentcoaph.beneficiers.create');
        Route::post('/create',[BeneficierController::class,'store'])->name('agentcoaph.beneficiers.store');
        Route::get('/{id}/edit',[BeneficierController::class,'edit'])->name('agentcoaph.beneficiers.edit');
        Route::put('/{id}/edit',[BeneficierController::class,'update'])->name('agentcoaph.beneficiers.update');
        Route::delete('/{id}/delete',[BeneficierController::class,'destroy'])->name('agentcoaph.beneficiers.delete');
       
        Route::get('/beneficiers/download/{type}/{beneficiaryId}', [BeneficierController::class, 'downloadFile'])
        ->name('beneficier.download')
        ;
        //Route::get('/download/{type}/{beneficiaryId}', [BeneficierController::class, 'downloadFile'])->name('download.file');
    });


    Route::prefix('Demand')->group(function(){
        Route::get('/',[DemandController::class,'index'])->name('agentcoaph.demand');
        Route::get('/{id}',[DemandController::class,'view'])->name('agentcoaph.demand.view');
        Route::post('/{id}',[DemandController::class,'update'])->name('agentcoaph.demand.status.update');
       // Route::get('/download/{type}/{id}', [BeneficierController::class, 'downloadFile'])->name('download.file');
    });

    Route::prefix('ValidationStock')->group(function(){
        Route::get('/',[ValidationStockController::class,'index'])->name('agentcoaph.stock');
        Route::get('/{id}',[ValidationStockController::class,'view'])->name('agentcoaph.stock.view');
        Route::post('/{id}',[ValidationStockController::class,'update'])->name('agentcoaph.stock.status.update');
    });

