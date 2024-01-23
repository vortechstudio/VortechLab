<?php

use App\Services\VortechAPI\User;
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

Route::middleware(['shared'])->group(function () {
    Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
    Route::get('/home', \App\Livewire\Home\Recommanded::class)->name('home.recommanded');
    Route::get('/home/timeline', \App\Livewire\Home\Timeline::class)->name('home.timeline');
    Route::get('/home/events', \App\Livewire\Home\Events::class)->name('home.events');

    Route::get('/test', function () {
        $userApi = new User();
        dd(collect($userApi->info()->user->posts)->where('status', false));
    });

    Route::prefix('posts')->group(function () {
        Route::get('/create/{type?}', \App\Livewire\Post\Create::class)->name('posts.create');
        Route::get('/preview', \App\Livewire\Post\Preview::class)->name('posts.preview');
        Route::get('/drafts', \App\Livewire\Post\DraftList::class)->name('posts.drafts');
        Route::get('/draft/{id}', \App\Livewire\Post\DraftEdit::class)->name('posts.draft.edit');
    });

    include "account.php";
});

include 'auth.php';
