<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Excel;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function form()
    {
        return view('product.form');
    }

    public function save(Request $request)
    {
        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path)->get();

//            return $data;

            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr[] = ['name' => $value->name, 'ingredient' => $value->ingredient,
                        'production' => $value->production];

                }

                if(!empty($arr)){

                    Product::insert($arr);

                }

            }

        }
        return redirect('product');
    }

    public function export()
    {
        $product = Product::all();
        return Excel::create('product', function ($excel) use ($product){
            $excel->sheet('Sheet 1', function($sheet) use($product) {
                $sheet->fromArray($product);
            });
        })->export('xls');
    }
}
