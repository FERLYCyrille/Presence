<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index'); // Voir présences
    Route::post('/presence', [PresenceController::class, 'store'])->name('presence.store'); // Marquer présence
    // routes/web.php
    Route::middleware(['auth'])->get('/admin/presences', [AdminController::class, 'showPresences'])->name('admin.presences');



});


require __DIR__.'/auth.php';
