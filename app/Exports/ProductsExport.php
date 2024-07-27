<?php

namespace App\Exports;

use App\Models\Variant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use function auth;

class ProductsExport implements FromCollection, WithHeadings
{
    public $headers;
    public $itemsCollection;

    public function __construct($items) {
        $this->headers = [];
        $data = [];

        // recherche des données
        $variants = Variant::whereIn('product_id', $items)->get();
        foreach ($variants as $variant) {
            $variant_data = [];
            foreach ($variant->variantAttributes()->get() as $variantAttribute) {
                $valeur = $variantAttribute->getValue(0);  // get omedis value (not odoo one)
                $name = $variantAttribute->attribute->name;
                //log::debug('attribut :'.$name.' > '.$valeur);
                $variant_data[$name] = $valeur;
                if (! in_array($name,$this->headers))
                    $this->headers[] = $name;
            }
            //log::debug($variant_data);
            $data[] = $variant_data;
        }
        //log::debug($header);

        // construction de la collection avec toutes les colonnes
        $this->itemsCollection = collect();
        foreach ($data as $variant_data) {
            $item = [];
            foreach ($this->headers as $fieldname) {
                if (array_key_exists($fieldname,$variant_data))
                {
                    $item[] = $variant_data[$fieldname];
                }
                else
                {
                    $item[] = null;
                }
            }
            $this->itemsCollection->push($item);
        }


    }

    public function headings(): array
    {
        return $this->headers;
    }

    public function collection()
    {
        return $this->itemsCollection;
    }
}
