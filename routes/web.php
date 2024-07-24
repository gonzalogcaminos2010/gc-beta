<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

use App\Livewire\PersonTable; // Importar correctamente la clase PersonTable


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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
    Route::get('/people', [PersonController::class, 'index'])->name('people.index');
    Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
    Route::post('/people', [PersonController::class, 'store'])->name('people.store');
    Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');
    Route::get('/people/{id}/edit', [PersonController::class, 'edit'])->name('people.edit');
    Route::put('/people/{id}', [PersonController::class, 'update'])->name('people.update');
    Route::delete('/people/{id}', [PersonController::class, 'destroy'])->name('people.destroy');
    Route::post('/people/{id}/approve', [PersonController::class, 'approve'])->name('people.approve');
    Route::get('/approved-people', [PersonController::class, 'approved'])->name('people.approved');

    
    


require __DIR__.'/auth.php';
