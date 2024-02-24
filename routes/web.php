<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\MainController;
use App\Livewire\AttributeComponent;
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

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/test', [MainController::class, 'test'])->name('test');
    Route::get('/dashboard', function () {  return view('dashboard');   })->name('dashboard');


    Route::get('/attributes', AttributeComponent::class)->name('attributes');

    Route::get('/attribute', [AttributeController::class, 'index'])->name('attribute.index');
    Route::get('/attribute/create', [AttributeController::class, 'create'])->name('attribute.create');
    Route::get('/attribute/{attribute}/edit', [AttributeController::class, 'edit'])->name('attribute.edit');
    Route::get('/attribute/{attribute}/duplicate', [AttributeController::class, 'duplicate'])->name('attribute.duplicate');
    Route::patch('/attribute/{attribute}',[AttributeController::class, 'update'])->name('attribute.update');
    Route::delete('/attribute/{attribute}',[AttributeController::class, 'destroy'])->name('attribute.destroy');
    Route::post('/attribute',[AttributeController::class, 'store'])->name('attribute.store');



});
