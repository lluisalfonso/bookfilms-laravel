<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FilmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/autores', [AuthorController::class, 'index'])->name('author.index');
Route::get('/autores/crear', [AuthorController::class, 'create'])->name('author.create');
Route::post('/autores', [AuthorController::class, 'store'])->name('author.store');
Route::get('/autores/{author}/editar', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/autores/{author}/actualizar', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/autores/{author}/eliminar', [AuthorController::class, 'delete'])->name('author.delete');

Route::get('/directores', [DirectorController::class, 'index'])->name('director.index');
Route::get('/directores/crear', [DirectorController::class, 'create'])->name('director.create');
Route::post('/directores', [DirectorController::class, 'store'])->name('director.store');
Route::get('/directores/{director}/editar', [DirectorController::class, 'edit'])->name('director.edit');
Route::put('/directores/{director}/actualizar', [DirectorController::class, 'update'])->name('director.update');
Route::delete('/directores/{director}/eliminar', [DirectorController::class, 'delete'])->name('director.delete');

Route::get('/libros', [BookController::class, 'index'])->name('book.index');
Route::get('/libros/crear', [BookController::class, 'create'])->name('book.create');
Route::post('/libros', [BookController::class, 'store'])->name('book.store');
Route::get('/libros/{book}/editar', [BookController::class, 'edit'])->name('book.edit');
Route::put('/libros/{book}/actualizar', [BookController::class, 'update'])->name('book.update');
Route::delete('/libros/{book}/eliminar', [BookController::class, 'delete'])->name('book.delete');

Route::get('/peliculas', [FilmController::class, 'index'])->name('film.index');
Route::get('/peliculas/crear', [FilmController::class, 'create'])->name('film.create');
Route::post('/peliculas', [FilmController::class, 'store'])->name('film.store');
Route::get('/peliculas/{film}/editar', [FilmController::class, 'edit'])->name('film.edit');
Route::put('/peliculas/{film}/actualizar', [FilmController::class, 'update'])->name('film.update');
Route::delete('/peliculas/{film}/eliminar', [FilmController::class, 'delete'])->name('film.delete');