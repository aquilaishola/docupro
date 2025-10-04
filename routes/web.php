<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('editor');
});
Route::get('/dashboard', [PdfController::class, 'editor'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/pdf/generate', [PdfController::class, 'generate'])->name('pdf.generate');
    Route::get('/pdf/history', [PdfController::class, 'history'])->name('pdf.history');
    Route::get('/pdf/edit/{pdf}', [PdfController::class, 'edit'])->name('pdf.edit');
    Route::post('/pdf/update/{pdf}', [PdfController::class, 'update'])->name('pdf.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
