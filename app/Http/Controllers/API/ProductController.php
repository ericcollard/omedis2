<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OdooModel;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Modèle odoo
        $odoomodels_data = OdooModel::all_to_array();

        // On récupère les données
        $products = product::where('selected','=',1)->get();
        $products_data = [];
        $product_cnt = 0;
        foreach ($products as $product)
        {
            $product_cnt++;
            $products_data[$product_cnt] = [
                'product' => $product->odoodata_to_array()
                ,'variants' => []];

            $variant_cnt = 0;
            foreach ($product->variants as $variant)
            {
                $variant_cnt++;
                $products_data[$product_cnt]['variants'][$variant_cnt] = $variant->odoodata_to_array();
            }
        }

        $main_data = [
            'model' => $odoomodels_data,
            'products' => $products_data,

        ];
        /*[
        0 => [
            "brand" => "duotone",
            "season" => 2024,
            "name" => "Super HERO",
            "category" => "Tous / Windsurf / Voile",
            "wholesale" => 679.82,
            "variants" => [
                0 => [
                    "sku" => "1458744U45",
                    "ean" => "9100025587445",
                    "size-m2" => "4.7",
                    "retail" => 1100.99
                    ],
                1 => [
                    "sku" => "1458744U46",
                    "ean" => "9100025587446",
                    "size-m2" => "5.0",
                    "retail" => 1149.99
                    ]
            ]
        ],
        1 => [
            "brand" => "vola",
            "name" => "Ergorazor",
            "category" => "Tous / Windsurf / Voile",
            "wholesale" => 45.82,
            "retail" => 80.99
        ]
    ];*/

        // On retourne les informations des utilisateurs en JSON;
        //dd($main_data);
        return response()->json($main_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
