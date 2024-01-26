<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('accountCenter')->middleware(['connected'])->group(function () {
    Route::get('/postList', \App\Livewire\AccountCenter\PostList::class)->name('accountCenter.postList');
    Route::get('/edit', \App\Livewire\AccountCenter\EditProfil::class)->name('accountCenter.edit');

    Route::prefix('setting')->group(function () {
        Route::get('/privacy', \App\Livewire\AccountCenter\Setting\Privacy::class)->name('accountCenter.setting.privacy');
    });
});
