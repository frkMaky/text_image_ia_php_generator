<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index']);
Route::post('/realizar-consulta', [PagesController::class, 'consultar']);

Route::get('/imagen', [PagesController::class, 'imagenConsultar']);
Route::post('/imagen', [PagesController::class, 'imagenGenerate']);

Route::get('/video', [PagesController::class, 'videoConsultar']);
Route::post('/video', [PagesController::class, 'videoGenerate']);