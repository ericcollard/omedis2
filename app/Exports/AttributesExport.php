<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use function auth;

class AttributesExport implements FromCollection, WithHeadings
{
    public $items;

    public function __construct($items) {
        $this->items = $items;
    }

    public function headings(): array
    {
        $selectList = [];
        if (auth()->user()->isAdmin())
        {
            $selectList =  ['id','name','odoo_name','comment','required','list','unit','datatype'];

        }
        else
        {
            $selectList =  ['id','name','comment','required','list','unit','datatype'];
        }
        return $selectList;
    }

    public function collection()
    {
        $selectList = ['attributes.id as id',
            'attributes.name as name',
            'attributes.comment',
            'attributes.required',
            'attribute_lists.name as list',
            'units.name as unit',
            'data_types.name as datatype'];
        if (auth()->user()->isAdmin())
        {
            $selectList = ['attributes.id as id',
                'attributes.name as name',
                'attributes.odoo_name as odoo_name',
                'attributes.comment',
                'attributes.required',
                'attribute_lists.name as list',
                'units.name as unit',
                'data_types.name as datatype'];
        }

       $itemsCollection = DB::table('attributes')
            ->leftJoin('attribute_lists', 'attributes.attribute_list_id', '=', 'attribute_lists.id')
            ->leftJoin('units', 'attributes.unit_id', '=', 'units.id')
            ->leftJoin('data_types', 'attributes.data_type_id', '=', 'data_types.id')
            ->select($selectList)
            ->orderBy('attributes.sort')
            ->get();

        log::debug($itemsCollection);

        return $itemsCollection;
    }
}
