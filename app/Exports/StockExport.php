<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[

            'stock_id',  'varient', 'stock_num', 

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Stock::all();
        return collect(Stock::getStock());
    }
}
