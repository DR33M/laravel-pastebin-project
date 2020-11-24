<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NotesController;

Auth::routes(['verify' => true]);

Route::GET('/user/settings', [App\Http\Controllers\UserController::class, 'settings'])->name('settings');
Route::PATCH('/user/settings', [App\Http\Controllers\UserController::class, 'updateSettings'])->name('update-settings');

Route::GET('/user/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
Route::PATCH('/user/change-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');

Route::GET('/user/search-self', [App\Http\Controllers\UserController::class, 'search'])->name('search-self');
Route::GET('/user/{user:name}', [App\Http\Controllers\UserController::class, 'profile'])->name('user-profile');


Route::GET('/', [NotesController::class, 'create'])->name('home');
Route::POST('/', [NotesController::class, 'store'])->name('create-note');
Route::GET('/{note:token}', [NotesController::class, 'show'])->name('show-note');
Route::GET('/edit/{note:token}', [NotesController::class, 'edit'])->name('edit-note');
Route::PATCH('/{note:token}', [NotesController::class, 'update'])->name('update-note');
Route::DELETE('/delete/{note:token}', [NotesController::class, 'destroy'])->name('destroy-note');

Route::GET('/archive', [NotesController::class, 'archive'])->name('archive');
Route::GET('/archive/{notesSyntax:name}', [NotesController::class, 'archiveWithSyntax'])->name('archive-syntax');

Route::GET('/raw/{note:token}', [NotesController::class, 'raw'])->name('raw-note');
Route::GET('/download/{note:token}', [NotesController::class, 'download'])->name('download-note');
Route::GET('/clone/{note:token}', [NotesController::class, 'clone'])->name('clone-note');
