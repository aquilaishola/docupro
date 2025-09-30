<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/', [PdfController::class, 'editor']); // Show the live editor
Route::post('/pdf/generate', [PdfController::class, 'generate']); // Generate PDF from editor content
