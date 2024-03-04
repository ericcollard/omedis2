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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/dashboard', function () {  return view('dashboard');   })->name('dashboard');
Route::get('/attributes', AttributeComponent::class)->name('attributes');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    Route::get('/test', [MainController::class, 'test'])->name('test');


});
