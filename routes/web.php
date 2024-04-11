<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\MainController;
use App\Livewire\AttributeComponent;
use App\Livewire\AttributeListComponent;
use App\Livewire\AttributeListValueComponent;
use App\Livewire\DataTypeComponent;
use App\Livewire\ProductComponent;
use App\Livewire\Test;
use App\Livewire\UnitComponent;
use App\Livewire\UploadDataFile;
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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/attributes', AttributeComponent::class)->name('attributes');
Route::get('/attribute-lists', AttributeListComponent::class)->name('attribute-lists');
Route::get('/attribute-list-values/{attributeList}', AttributeListValueComponent::class)->name('attribute-list-values');
Route::get('/units', UnitComponent::class)->name('units');
Route::get('/datatypes', DataTypeComponent::class)->name('datatypes');
Route::get('/containers', [MainController::class, 'containers'])->name('containers');
Route::get('/my_test', [MainController::class, 'my_test'])->name('my_test');
Route::get('/import_csv', [MainController::class, 'import_csv'])->name('import_csv');
Route::get('/import_xls', [MainController::class, 'import_xls'])->name('import_xls');
Route::get('/import_xml', [MainController::class, 'import_xml'])->name('import_xml');
Route::get('/import_init', [MainController::class, 'import_init'])->name('import_init');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/upload_datafile', UploadDataFile::class)->name('upload_datafile');
    Route::get('/test', [MainController::class, 'test'])->name('test');
    Route::get('/products', ProductComponent::class)->name('products');


});
