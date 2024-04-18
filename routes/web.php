<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\API\ProductController;
use App\Livewire\AttributeComponent;
use App\Livewire\AttributeListComponent;
use App\Livewire\AttributeListValueComponent;
use App\Livewire\DataTypeComponent;
use App\Livewire\ProductComponent;
use App\Livewire\UnitComponent;
use App\Livewire\UploadDataFile;
use App\Livewire\UploadValueList;
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
Route::get('/doc_gs_supplier', [MainController::class, 'doc_gs_supplier'])->name('doc_gs_supplier');
Route::get('/doc_gs_retailer', [MainController::class, 'doc_gs_retailer'])->name('doc_gs_retailer');
Route::get('/attributes', AttributeComponent::class)->name('attributes');
Route::get('/attribute-lists', AttributeListComponent::class)->name('attribute-lists');
Route::get('/attribute-list-values/{attributeListId?}', AttributeListValueComponent::class)->name('attribute-list-values');
Route::get('/units', UnitComponent::class)->name('units');
Route::get('/datatypes', DataTypeComponent::class)->name('datatypes');
Route::get('/containers', [MainController::class, 'containers'])->name('containers');
Route::get('/import_init', [MainController::class, 'import_init'])->name('import_init');
Route::apiResource("api/products", ProductController::class);
Route::get('/upload_datafile', UploadDataFile::class)->name('upload_datafile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    Route::get('/upload_valuelist/{table_name}/{incoming_url}/{default_value?}', UploadValueList::class)->name('upload_valuelist');

    Route::get('/test', [MainController::class, 'test'])->name('test');
    Route::get('/products', ProductComponent::class)->name('products');
    Route::get('/product_odoo_data/{product_id}', [MainController::class, 'product_odoo_data'])->name('product_odoo_data');
    Route::get('/my_test', [MainController::class, 'my_test'])->name('my_test');
    Route::get('/import_csv', [MainController::class, 'import_csv'])->name('import_csv');
    Route::get('/import_xls', [MainController::class, 'import_xls'])->name('import_xls');
    Route::get('/import_xml', [MainController::class, 'import_xml'])->name('import_xml');
});
