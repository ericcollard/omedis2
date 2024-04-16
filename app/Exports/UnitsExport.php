<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use function auth;

class UnitsExport implements FromCollection, WithHeadings
{
    public $items;

    public function __construct($items) {
        $this->items = $items;
    }

    public function headings(): array
    {
        $selectList =  ['id','name','comment'];
        return $selectList;
    }

    public function collection()
    {
        $selectList =  ['id','name','comment'];

        $itemsCollection = DB::table('units')
            ->select($selectList)
            ->orderBy('units.sort')
            ->get();

        return $itemsCollection;
    }
}
