<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use function auth;

class DatatypesExport implements FromCollection, WithHeadings
{
    public $items;

    public function __construct($items) {
        $this->items = $items;
    }

    public function headings(): array
    {
        $selectList =  ['id','name','comment','validation_str'];
        return $selectList;
    }

    public function collection()
    {
        $selectList =  ['id','name','comment','validation_str'];

        $itemsCollection = DB::table('data_types')
            ->select($selectList)
            ->orderBy('data_types.sort')
            ->get();

        return $itemsCollection;
    }
}
