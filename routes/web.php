<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/articles');
});

Route::get('/articles/create', [ArticleController::class, 'create']);

Route::post('/articles', [ArticleController::class, 'store']);

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/{article}', [ArticleController::class, 'show']);

Route::post('/articles/{article}', [ArticleController::class, 'destroy']);
