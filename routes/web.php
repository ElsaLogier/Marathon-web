<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OeuvreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueil');
})->name('accueil');



Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::resource('/oeuvres', OeuvreController::class);
Route::resource('/commentaires', CommentaireController::class)->middleware(['auth', 'verified']);
Route::resource('/likes', LikeController::class);
Route::put('/commentaires/valider/{id}', [CommentaireController::class, 'valider'])->name('commentaires.valider');

Route::get('/compte', [UserController::class, 'index'])->middleware(['auth'])->name('compte');
Route::post('/compte', [UserController::class, 'upload'])->middleware(['auth'])->name('compte.upload');
