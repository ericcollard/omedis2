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

        $errors = '';
        /*
        $data = ['category' => 'watersports-kitesurf-board-surf1'];
        $rules['category'][] = Rule::exists('attribute_list_values', 'name')
            ->where('attribute_list_id', 2);
        $rules['category'][] = 'max:10';
        $rules['category'][] = 'uppercase';

        log::debug($rules);
        log::debug($data);
        $validator = Validator::make($data, $rules)->stopOnFirstFailure(false);
        if ($validator->fails()) {
            log::debug($validator->messages()->get('*'));
            var_dump($validator->messages()->get('*'));
        }

*/
        /*
        if (preg_match("(^\d+'(([0-9]|1[01])?)$)", "5'1")) {
            $errors=  "A match was found.";
        } else {
            $errors=  "A match was not found.";
        }
        */


        $errors = ImportHelpers::checkImportedData();

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
