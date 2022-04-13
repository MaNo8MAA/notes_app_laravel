<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\NotePublicController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::view('welcome', 'welcome')->name('welcome');
Route::view('about', 'about')->name('about');
// public Route for show Notes
Route::get('/NotesPublic', [NotePublicController::class, 'index']);
// Route Notes
Route::get('/Notes/indexNote', [NoteController::class, 'index'])->name('Notes');
Route::get('/Notes/trashed', [NoteController::class, 'notesTrashed'])->name('notes.trashed');

Route::get('/Notes/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/Notes/store', [NoteController::class, 'store'])->name('note.store');
Route::get('/Notes/show/{id}', [NoteController::class, 'show'])->name('note.show');
Route::get('/Notes/edit/{id}', [NoteController::class, 'edit'])->name('note.edit');
Route::post('/Notes/update/{id}', [NoteController::class, 'update'])->name('note.update');
Route::get('/Notes/destroy/{id}', [NoteController::class, 'destroy'])->name('note.destroy');
Route::get('/Notes/hardDelete/{id}', [NoteController::class, 'hardDelete'])->name('note.hardDelete');
Route::get('/Notes/restore/{id}', [NoteController::class, 'restore'])->name('note.restore');
