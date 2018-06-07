<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Excel;
class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();

        return view('customer.index', compact('customer'));
    }

    public function form()
    {
        return view('customer.form');
    }

    public function save(Request $request)
    {
        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = \Excel::load($path)->get();

//            return $data;

            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr[] = ['description' => $value->description,];

                }

                if(!empty($arr)){

                    Customer::insert($arr);

                }

            }

        }
        return redirect('customer');
    }

    public function export()
    {
        $customer = Customer::all();
        return Excel::create('customer', function ($excel) use ($customer){
            $excel->sheet('Sheet 1', function($sheet) use($customer) {
                $sheet->fromArray($customer);
            });
        })->export('xls');
    }
}
