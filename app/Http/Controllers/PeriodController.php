<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;
use Excel;
class PeriodController extends Controller
{
    public function index()
    {
        $period = Period::all();

        return view('period.index', compact('period'));
    }

    public function form()
    {
        return view('period.form');
    }

    public function save(Request $request)
    {
        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path)->get();

//            return $data;

            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr[] = ['month' => $value->month, 'year' => $value->year];

                }

                if(!empty($arr)){

                    Period::insert($arr);

                }

            }

        }
        return redirect('period');
    }

    public function export()
    {
        $period = Period::all();
        return Excel::create('period', function ($excel) use ($period){
            $excel->sheet('Sheet 1', function($sheet) use($period) {
                $sheet->fromArray($period);
            });
        })->export('xls');
    }
}
