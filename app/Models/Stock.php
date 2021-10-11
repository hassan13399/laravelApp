<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;

class Stock extends Model
{
    use HasFactory;

    protected $table = "stocks";

    protected $fillable = ['varient', 'stock_num'];

    public static function getStock(){
        $records = DB::table('stocks')->select('varient', 'stock_num')->get()->ToArray();
        return $records;
    }
}
 