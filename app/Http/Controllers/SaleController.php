<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use Illuminate\Http\Request;
use Excel;
class SaleController extends Controller
{
    public function index()
    {
        $sale = Sale::with('customer', 'period', 'product', 'location')->get();
//        return $sale;
        return view('sale.index', compact('sale'));
    }

    public function form()
    {
        return view('sale.form');
    }

    public function save(Request $request)
    {
        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path)->get();

//            return $data;

            if($data->count()){

                foreach ($data as $key => $value) {
                    $product = Product::find($value->product_id);
                    $production = $product->ingredient + $product->production;

                    $arr[] = ['sale' => $value->sale, 'profit' => $production,
                        'period_id' => $value->period_id, 'location_id' => $value->location_id,
                        'customer_id' => $value->customer_id , 'product_id'=> $value->product_id];

                }

                if(!empty($arr)){

                    Sale::insert($arr);

                }

            }

        }
        return redirect('sale');
    }

    public function export()
    {
        $sale = Sale::all();
        return Excel::create('sale', function ($excel) use ($sale){
            $excel->sheet('Sheet 1', function($sheet) use($sale) {
                $sheet->fromArray($sale);
            });
        })->export('xls');
    }
}
