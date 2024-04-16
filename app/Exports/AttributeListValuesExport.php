<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use function auth;

class AttributeListValuesExport implements FromCollection, WithHeadings
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
            $selectList =  ['id','name','odoo_name','comment','list'];

        }
        else
        {
            $selectList =  ['id','name','comment','list'];
        }
        return $selectList;
    }

    public function collection()
    {
        $idList = [];
        foreach($this->items as $id)
        {
            $idList[] = $id;
        }

        $selectList = ['attribute_list_values.id as id',
            'attribute_list_values.name as name',
            'attribute_list_values.comment',
            'attribute_lists.name as list'];
        if (auth()->user()->isAdmin())
        {
            $selectList = ['attribute_list_values.id as id',
                'attribute_list_values.name as name',
                'attribute_list_values.odoo_name as odoo_name',
                'attribute_list_values.comment',
                'attribute_lists.name as list',];
        }

       $itemsCollection = DB::table('attribute_list_values')
            ->leftJoin('attribute_lists', 'attribute_list_values.attribute_list_id', '=', 'attribute_lists.id')
            ->select($selectList)
            ->orderBy('attribute_list_values.sort')
           ->whereIn('attribute_list_values.id', $idList)
            ->get();

        return $itemsCollection;
    }
}
