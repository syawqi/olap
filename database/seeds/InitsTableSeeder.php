<?php

use Illuminate\Database\Seeder;

class InitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Industry
        $industry = new \App\Industry();

        $industry->name = 'Pabrik Bahan Kertas';

        $industry->save();

        $location = new \App\Location();

        $location->province = 'Kalimantan Timur';
        $location->country = 'Indonesia';

        $location->save();

        $product = new \App\Product();

        $product->name = 'Pewarna Dasar Merah';
        $product->ingredient = 10000;
        $product->production = 100;

        $product->save();

        $production = $product->ingredient +  $product->production;

        $customer = new \App\Customer();

        $customer->description = 'Pabrik';

        $customer->save();

        $period = new \App\Period();

        $period->month = 1;
        $period->year = 2018;

        $period->save();

        $sale = new \App\Sale();

        $sale->sale = 1000000;
        $sale->profit = $sale->sale - $production;
        $sale->period_id = $period->id;
        $sale->location_id = $location->id;
        $sale->customer_id = $customer->id;
        $sale->product_id = $product->id;

        $sale->save();

    }
}
