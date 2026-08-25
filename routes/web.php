<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuralController;
use App\Http\Controllers\ProfileController;

// 1. Sua Home
Route::get('/', function () {
    return view('home');
});

// 2. Sua página Sobre
Route::view('/sobre', 'sobre')->name('sobre');

// 3. Seu Mural / Guitardex (Público para ver, protegido para postar)
Route::get('/mural', [MuralController::class, 'index'])->name('mural.index');
Route::post('/mural', [MuralController::class, 'store'])->name('mural.store')->middleware('auth');

Route::get('/mural/guitars/{guitar}/edit', [MuralController::class, 'edit'])->name('guitars.edit')->middleware('auth');
Route::put('/mural/guitars/{guitar}',[MuralController::class, 'update'])->name('guitars.update')->middleware('auth');
Route::delete('/mural/guitars/{guitar}',[MuralController::class, 'destroy'])->name('guitars.destroy')->middleware('auth');

// 4. Dashboard padrão do Breeze (pode manter)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 5. As rotas mágicas de Login/Register do Breeze que ficam em outro arquivo
require __DIR__.'/auth.php';