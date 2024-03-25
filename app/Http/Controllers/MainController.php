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

        Excel::import(new ProductsImport, 'sample.csv', 'public');
        //ProductsXmlImport::process('sample.xml', 'public');

        //ImportHelpers::initialize_table();

        return view('my_test');
    }
}
