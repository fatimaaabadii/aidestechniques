<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirecteurCentrale\StockController;
use App\Http\Controllers\DirecteurCentrale\TransferStockController;
use App\Http\Controllers\DirecteurCentrale\DelegationController;
use App\Http\Controllers\GlobalController;





Route::get('/getregions/ajax', [GlobalController::class, 'getRegions']);


Route::prefix('Stock')->group(function(){
    Route::get('/',[StockController::class,'index'])->name('directeurcentrale.stock');
    Route::get('/create',[StockController::class,'create'])->name('directeurcentrale.stock.create');
    Route::post('/store',[StockController::class,'store'])->name('directeurcentrale.stock.store');
    Route::get('/edit/{id}',[StockController::class,'edit'])->name('directeurcentrale.stock.edit');
    Route::put('/update/{id}',[StockController::class,'update'])->name('directeurcentrale.stock.update');
    Route::delete('/delete/{id}',[StockController::class,'destroy'])->name('directeurcentrale.stock.delete');

});

Route::prefix('stock-transfer')->group(function(){
    Route::get('/', [TransferStockController::class, 'index'])->name('directeurcentrale.stock.treansfer');
    Route::get('/create', [TransferStockController::class, 'create'])->name('directeurcentrale.transfer.create');
    Route::post('/store', [TransferStockController::class, 'store'])->name('directeurcentrale.transfer.store');
});


Route::prefix('delegations')->group(function(){
    Route::get('/', [DelegationController::class, 'index'])->name('directeurcentrale.delegations');
    Route::get('/{id}',  [DelegationController::class, 'detail'])->name('directeurcentrale.delegations.detail');
});


