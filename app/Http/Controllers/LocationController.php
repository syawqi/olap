<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Excel;
class LocationController extends Controller
{
    public function index()
    {
        $location = Location::all();

        return view('location.index', compact('location'));
    }

    public function form()
    {
        return view('location.form');
    }

    public function save(Request $request)
    {
        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path)->get();

//            return $data;

            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr[] = ['province' => $value->province, 'country' => $value->country];

                }

                if(!empty($arr)){

                    Location::insert($arr);

                }

            }

        }
        return redirect('location');
    }

    public function export()
    {
        $location = Location::all();
        return Excel::create('location', function ($excel) use ($location){
            $excel->sheet('Sheet 1', function($sheet) use($location) {
                $sheet->fromArray($location);
            });
        })->export('xls');
    }
}
