<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


/**
 * @api GET /
 */
Route::get('/', function () {
    return view("welcome");
})->name('home');


/**
 *
 * @api GET /articles/create
 */
Route::get('/articles/create', [ArticleController::class, 'create']);


/**
 *
 * @api POST /articles
 */
Route::post('/articles', [ArticleController::class, 'store']);

Route::post('/articles/{id}', [ArticleController::class, 'update']);

/**
 *
 * @api GET /articles
 */
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');


/**
 * @api GET /articles/{article}
 */
Route::get('/articles/{id}', [ArticleController::class, 'show']);

/**
 * @api GET /articles/{article}/edit
 */
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit']);

/**
 *
 * @api GET /articles/{article}/edit
 */
Route::delete('/articles/{id}/delete', [ArticleController::class, 'destroy']);
