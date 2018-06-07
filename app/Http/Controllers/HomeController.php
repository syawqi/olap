<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Location;
use App\Period;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function tahun()
    {
        $per = Period::groupBy('year')->get();
//        dd($per);
//        return $per;
        $i = 0;

        for($i ; $i < count($per) ; $i++){
            $total = 0;
            $profit = 0;
            $periode = Period::with('sale')->get()->groupBy('year');

            for ($j = 0; $j < count($periode[$per[$i]->year]); $j++){
                for ($x = 0; $x < count($periode[$per[$i]->year][$j]->sale); $x++){
                    $total = $total + $periode[$per[$i]->year][$j]->sale[$x]->sale;
                    $profit = $profit + $periode[$per[$i]->year][$j]->sale[$x]->profit;
                }
            }
            $arr[] = [
                "year" => $per[$i]->year,
                "total" => $total,
                "profit" => $profit
            ];
        }
        $sale = collect($arr);
//        dd($sale[0]["year"]);
//        return $sale;
        return view('olap.tahun', compact('sale'));
    }

    public function month()
    {
        $per = Period::where('year', 2002)->get();
        $i = 0;

        for($i ; $i < count($per) ; $i++){
            $total = 0;
            $profit = 0;
            $periode = Period::with('sale')->where('year', 2002)->get()->groupBy('month');
//            return $periode;
            for ($j = 0; $j < count($periode[$per[$i]->month]); $j++){
                for ($x = 0; $x < count($periode[$per[$i]->month][$j]->sale); $x++){
                    $total = $total + $periode[$per[$i]->month][$j]->sale[$x]->sale;
                    $profit = $profit + $periode[$per[$i]->month][$j]->sale[$x]->profit;
                }
            }
            $arr[] = [
                "month" => $per[$i]->month,
                "year" => $per[$i]->year,
                "total" => $total,
                "profit" => $profit
            ];
        }
        $month = collect($arr);
//        return $month;
        return view('olap.month', compact('month'));
    }

    public function location()
    {
        $location = Location::with('sale')->get();
//        return $location;
        return view('olap.location', compact('location'));
    }

    public function product()
    {
        $product = Product::with('sale')->get();
//        return $product;
//        return $location;
        return view('olap.product', compact('product'));
    }

    public function customer()
    {
        $customer = Customer::with('sale')->get();
        return view('olap.customer', compact('customer'));
    }
}
