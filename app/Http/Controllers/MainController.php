<?php

namespace App\Http\Controllers;

use App\Imports\ImportHelpers;
use App\Imports\ProductsImport;
use App\Imports\ProductsXmlImport;
use App\Models\Attribute;
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

        $errors = '<p><i class="fa-solid fa-triangle-exclamation text-red-500 text-xl"></i> blabla</p>';
        $errors .= '<p><i class="fa-solid fa-circle-check text-green-400 text-xl"></i> blabla</p>';

        return view('done',compact('errors'));
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


}
