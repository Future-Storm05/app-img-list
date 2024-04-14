<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;

Route::get('/', function () {
    return view('app');
});

Route::prefix('cards')->group(function (){
    //view
    Route::get('/',[CardsController::class, 'index'])->name('cards.list');
    Route::get('/add', function() {return view('panel.cards.add');})->name('cards.add');
    Route::get('/search', [CardsController::class, 'search'])->name('cards.search');
    
    //request
    Route::post('add', [CardsController::class, 'create'])->name('cards.create');
    Route::post('/like-card', [CardsController::class, 'likeCard'])->name('like.card');
    
    
});


