<?php

namespace App\Http\Controllers;

use App\Exports\DownloadExport;
use App\Exports\StockExport;
use Illuminate\Http\Request;
use App\Models\Forms;

///use DB;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StockImport;
use App\Models\Download;
use App\Models\Stock;
use Egulias\EmailValidator\Validation\Exception\EmptyValidationList;
use JetBrains\PhpStorm\Immutable;
use SebastianBergmann\Environment\Console;

class PagesController extends Controller
{
    
    public function index(){


         $data = Stock:: get();

        return view('pages.index', ['for' => $data]);
        return view('pages.index');

    }

    public function add(Request $request){

       
       $fileInfo = $request->file;
   
        Excel::import(new StockImport, $fileInfo);
        
    
            return redirect('/home')->with('msg', 'Added data in stocks table');

    }

    public function exportIntoExcel(){

        //$records = DB::table('downloads')->select('sku', 'GROUP_CONCAT'('DISTINCT stock_id SEPARATOR', '|') ,'as' ,'stock_id', 'FROM', 'stocks' ,'GROUP BY', 'varient')->get()->ToArray();    

        return Excel::download(new DownloadExport, 'StockList.xlsx');
    }

    public function generateExcel(){
        $stockP = Stock::get();

        
        foreach ($stockP as $key => $value){

            Download::create([

                'stock_id'=>$value->stock_id,
                'sku'=>$value->varient,


            ]);

        }
        
        return redirect('/home')->with('msg', 'File Gnerated');


    }

    

}
