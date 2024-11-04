<?php

use App\Http\Controllers\ProfileController;
use App\Services\GoogleSheet;
use Illuminate\Support\Facades\Route;

Route::get('/', function (GoogleSheet $googleSheet) {
    $data = [
        [3, 'Ardian', 'MySQL Package', 2024-07-31, 1],
        [4, 'James', 'Google Play', 2024-05-27, 4]
    ];

    $savedData = $googleSheet->saveDataToSheet($data);
    dump($savedData);


    
    dd($googleSheet->readGoogleSheet());

    return view('welcome');
});

Route::get('/dashboard', function () {
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
