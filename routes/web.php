<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureController;


use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Facture;

Route::resource('clients', ClientController::class);
Route::resource('produits', ProduitController::class);
Route::resource('commandes', CommandeController::class);
Route::resource('factures', FactureController::class);


Route::get('/', function () {

    return view('dashboard', [
        'clients' => Client::count(),
        'produits' => Produit::count(),
        'commandes' => Commande::count(),
        'factures' => Facture::count(),
    ]);

});
Route::get(
    '/factures/{id}/pdf',
    [FactureController::class,'pdf']
)->name('factures.pdf');
Route::get('/apropos', function () {
    return view('apropos');
})->name('apropos');