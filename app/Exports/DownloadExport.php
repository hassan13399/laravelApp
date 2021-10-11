<?php

namespace App\Exports;

use App\Models\Download;
use Maatwebsite\Excel\Concerns\FromCollection;

class DownloadExport implements FromCollection
{

    public function headings():array{
        return[

            'id',  'sku', 'stock_id', 

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Stock::all();
        return collect(Download::getStock());
    }
}
