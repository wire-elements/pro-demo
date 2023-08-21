<?php

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/repositories', \App\Livewire\RepositoriesIndex::class)->name('repositories');
    Route::get('/repositories/{repository:slug}', \App\Livewire\RepositoriesShow::class)->name('repositories.show');
    Route::get('/repositories/{repository:slug}/releases/{release}', \App\Livewire\ReleaseShow::class)->name('releases.show');
});
