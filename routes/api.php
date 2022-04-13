<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/Notes/indexNote', [NoteController::class, 'index'])->name('Notes');
Route::get('/Notes/trashed', [NoteController::class, 'notesTrashed'])->name('notes.trashed');

Route::get('/Notes/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/Notes/store', [NoteController::class, 'store'])->name('note.store');
Route::get('/Notes/show/{id}', [NoteController::class, 'show'])->name('note.show');
Route::get('/Notes/edit/{id}', [NoteController::class, 'edit'])->name('note.edit');
Route::post('/Notes/update/{id}', [NoteController::class, 'update'])->name('note.update');
