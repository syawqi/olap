<?php

namespace App\Http\Controllers;

use App\Industry;
use Illuminate\Http\Request;
use Excel;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::all();

        return view('industry.index', compact('industries'));
    }

    public function form()
    {
        return view('industry.form');
    }

    public function save(Request $request)
    {
        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = \Excel::load($path)->get();

//            return $data;

            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr[] = ['name' => $value->name,];

                }

                if(!empty($arr)){

                    Industry::insert($arr);

                }

            }

        }
        return redirect('industry');
    }

    public function export()
    {
        $industries = Industry::all();
        return Excel::create('industry', function ($excel) use ($industries){
            $excel->sheet('Sheet 1', function($sheet) use($industries) {
                $sheet->fromArray($industries);
            });
        })->export('xls');
    }
}
