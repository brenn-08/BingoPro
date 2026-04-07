<?php

use App\Http\Controllers\BingoCardController;

Route::get('/', function () {
    return redirect()->route('bingo-cards.index');
});

Route::resource('bingo-cards', BingoCardController::class);
