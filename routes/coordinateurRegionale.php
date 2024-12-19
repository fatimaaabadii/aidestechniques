<?php

use App\Http\Controllers\CoordinationRegionale\TransfertStockController;
use App\Http\Controllers\DelegueProvincial\ValidationDelegueController;
use Illuminate\Support\Facades\Route;


    Route::prefix('TransfertStock')->group(function(){
        Route::get('/',[TransfertStockController::class,'index'])->name('coordinationregionale.stock');
        Route::get('/{id}',[TransfertStockController::class,'transfert'])->name('coordinationregionale.stock.transfert');
        Route::post('/{id}',[TransfertStockController::class,'update'])->name('coordinationregionale.stock.transfert.update');
        
    });