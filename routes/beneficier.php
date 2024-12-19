<?php

use App\Http\Controllers\Beneficier\BeneficierController;


Route::get('/', [BeneficierController::class, 'home'])->name('home');

Route::get('/demmande', [BeneficierController::class, 'demmand'])->name('demmande.get');
Route::post('/demmande', [BeneficierController::class, 'store'])->name('demand.store');

Route::get('/suivi', [BeneficierController::class, 'suivi'])->name('demand.suivi');
Route::post('/suivi', [BeneficierController::class, 'track'])->name('demand.track');
//Route::get('/download/{type}/{beneficiaryId}', [BeneficierController::class, 'downloadFile'])->name('download.file');
Route::get('/beneficiers/download/{type}/{beneficiaryId}', [BeneficierController::class, 'downloadFile'])
    ->name('download.file');