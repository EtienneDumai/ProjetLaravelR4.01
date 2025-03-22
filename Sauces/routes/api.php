<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaucesController;

Route::apiResource('sauces', SaucesController::class);