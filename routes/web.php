<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\BonEntresController;
use App\Http\Controllers\BonSortieController;
use App\Http\Controllers\DetailBonEntresController;
use App\Http\Controllers\DetailBonSortieController;
use App\Http\Controllers\BonLivraisonController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('vendeurs', VendeurController::class);
Route::resource('familles', FamilleController::class);
Route::resource('clients', ClientController::class);
Route::resource('produits', ProduitController::class);
Route::resource('bon_entres', BonEntresController::class);
Route::resource('bon_sorties', BonSortieController::class);
Route::resource('detail_bon_entres', DetailBonEntresController::class);
Route::resource('detail_bon_sorties', DetailBonSortieController::class);
Route::get('bon_entres/{id}/details', [BonEntresController::class, 'showDetails'])->name('bon_entres.details');
// routes/web.php


Route::get('/bon_entres/{id}/details', [BonEntresController::class, 'showDetails'])->name('bon_entres.details');

Route::get('/bon_entres/{bon_entre_id}/details/create', [DetailBonEntresController::class, 'create'])->name('detail_bon_entres.create');
Route::post('/bon_entres/{bon_entre_id}/details', [DetailBonEntresController::class, 'store'])->name('detail_bon_entres.store');
Route::get('/details/{id}/edit', [DetailBonEntresController::class, 'edit'])->name('detail_bon_entres.edit');
Route::put('/details/{id}', [DetailBonEntresController::class, 'update'])->name('detail_bon_entres.update');
Route::delete('/details/{id}', [DetailBonEntresController::class, 'destroy'])->name('detail_bon_entres.destroy');
Route::get('/bon_sorties/{id}/show_details', [BonSortieController::class, 'showDetails'])->name('bon_sorties.showDetails');
Route::get('/bon_sorties/{id}/add_detail', [BonSortieController::class, 'addDetail'])->name('bon_sorties.addDetail');
Route::delete('/bon_sorties/{detail}', 'BonSortiesController@deleteDetail')->name('bon_sorties.deleteDetail');
Route::post('/bon_sorties/{id}/add_detail', [BonSortieController::class, 'addDetail'])->name('bon_sorties.addDetail');
Route::get('/bon_sorties/{id}/add_detail', [BonSortieController::class, 'showAddDetailForm'])->name('bon_sorties.showAddDetailForm');
Route::delete('/bon_sorties/{id}/delete_detail/{detail}', [BonSortieController::class, 'deleteDetail'])->name('bon_sorties.deleteDetail');

Route::get('/bon_sorties/details/{detail_bon_sortie}/edit', [BonSortieController::class, 'editDetail'])->name('bon_sorties.editDetail');
Route::put('/bon_sorties/details/{detail_bon_sortie}', [BonSortieController::class, 'updateDetail'])->name('bon_sorties.updateDetail');
Route::resource('bon_livraisons', BonLivraisonController::class);

Route::get('bon_livraisons/{id}/details', [BonLivraisonController::class, 'showDetails'])->name('bon_livraisons.showDetails');
Route::get('bon_livraisons/{id}/add_detail', [BonLivraisonController::class, 'showAddDetailForm'])->name('bon_livraisons.showAddDetailForm');
Route::post('bon_livraisons/{id}/add_detail', [BonLivraisonController::class, 'addDetail'])->name('bon_livraisons.addDetail');
Route::delete('bon_livraisons/{id}/details/{detail}', [BonLivraisonController::class, 'deleteDetail'])->name('bon_livraisons.deleteDetail');
Route::get('bon_livraisons/{id}/edit_detail', [BonLivraisonController::class, 'editDetail'])->name('bon_livraisons.editDetail');
Route::put('bon_livraisons/{id}/update_detail', [BonLivraisonController::class, 'updateDetail'])->name('bon_livraisons.updateDetail');
