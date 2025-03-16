<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactController::class, 'rendFormulaire']);
Route::post('/', [ContactController::class,'valideEtTraiteFormulaire']);