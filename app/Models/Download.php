<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;

class Download extends Model
{

    use HasFactory;

    protected $table = "downloads";

    protected $fillable = ['sku', 'stock_id'];

    public static function getStock(){
        
        $r = DB::table('downloads')->select("downloads.sku", DB::raw("(GROUP_CONCAT(distinct downloads.stock_id  SEPARATOR '|')) as `stock_id`"))->groupBy('downloads.sku')->get()->ToArray();
       
        return $r;
    } 

}
