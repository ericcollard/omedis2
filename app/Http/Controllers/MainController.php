<?php

namespace App\Http\Controllers;

use App\Imports\ImportHelpers;
use App\Imports\ProductsImport;
use App\Imports\ProductsXmlImport;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    public function test() {
        $request = request();
        $request->session()->flash('flash.banner', 'Yay it works!');
        $request->session()->flash('flash.bannerStyle', 'success');

        $bread= [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Attributes', 'url' => '/test'],
            ['title' => 'name', 'url' => ''],
        ];

        return view('test',compact('bread'));
    }

    public function home() {
        return view('documentation');
    }

    public function containers() {
        return view('containers');
    }

    public function my_test() {

        /*
        $errors = '<p><i class="fa-solid fa-triangle-exclamation text-red-500 text-xl"></i> blabla</p>';
        $errors .= '<p><i class="fa-solid fa-circle-check text-green-400 text-xl"></i> blabla</p>';

        $pictures = DB::table('variant_attributes')
            ->select('value_txt')
            ->join('variants','variant_attributes.variant_id','=','variants.id')
            ->join('attributes','variant_attributes.attribute_id','=','attributes.id')
            ->where('variants.product_id','=',132)
            ->where('attributes.name','=','pictures')
            ->distinct()->get();
        $cnt = count($pictures);
        var_dump($cnt);

        return view('done',compact('errors'));
        */

        ImportHelpers::checkMandatoryCombinedAttributes();

        return view('my_test');

    }

    public function import_init() {
        ImportHelpers::initialize_table();
        return view('done');
    }

    public function import_csv() {
        ImportHelpers::bulkImport('sample.csv', 'public');
        return view('done');
    }
    public function import_xml() {
        ImportHelpers::bulkImport('sample.xml', 'public');
        return view('done');
    }
    public function import_xls() {
        ImportHelpers::bulkImport('test.xlsx', 'public');
        return view('done');
    }

    public function product_odoo_data($product_id) {
        $product = Product::findOrFail($product_id);
        return view('product-odoo-data',compact('product'));
    }

    public function doc_gs_retailer() {
        return view('doc_gs_retailer');
    }

    public function doc_gs_supplier() {
        return view('doc_gs_supplier');
    }

}
