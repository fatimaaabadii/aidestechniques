<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgentCOAPH\BeneficierController;
use App\Http\Controllers\AgentCOAPH\ProfileController;
use App\Http\Controllers\SupperAdmin\HomeController;
use App\Http\Controllers\SupperAdmin\DelegationController;
use App\Http\Controllers\GlobalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::group(['prefix' => 'aides-techniques'], function () {

require('beneficier.php');

Route::middleware(['auth'])->group(function () {

    Route::get('/editProfile',[ProfileController::class,'edit'])->name('agentcoaph.profile');
    Route::post('/editProfile',[ProfileController::class,'update'])->name('agentcoaph.profile.update');
    Route::post('/editPassword',[ProfileController::class,'updatePassword'])->name('agentcoaph.profile.update.password');


    Route::get('/', function () {
        return redirect('/admin');
    });
    Route::get('/admin', [GlobalController::class, 'home'])->name('home');
    Route::post('/admin', [GlobalController::class, 'home'])->name('home.filter');

    require('servicetechnique.php');
    require('agentCOAPH.php');
    require('directeurCentrale.php');
    require('delegueProvincial.php');
    require('coordinateurRegionale.php');

    // Route::get('/', [HomeController::class, 'index'])->name('home');
    // Route::get('/profile', [HomeController::class,'profile'])->name('supperadmin.profile');
    // Route::post('/profile', [HomeController::class, 'profileUpdate'])->name('supperadmin.profile.update');
    // Route::post('/change-password', [HomeController::class, 'changePassword'])->name('supperadmin.profile.change.password');

    Route::get('/delegation', [DelegationController::class,'index'])->name('supperadmin.delegation');
    Route::get('/delegation/{id}', [DelegationController::class, 'edit'])->name('supperadmin.delegation.edit');
    Route::post('/delegation/{id}', [DelegationController::class, 'update'])->name('supperadmin.delegation.update');
});

Auth::routes();


// Dans routes/web.php
Route::get('/datatables-fr', function() {
    $content = file_get_contents('http://cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json');
    return response($content)->header('Content-Type', 'application/json');
});

// Dans votre JavaScript


//});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
