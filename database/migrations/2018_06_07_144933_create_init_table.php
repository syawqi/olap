<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('province');
            $table->string('country');
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('ingredient');
            $table->integer('production');
            $table->timestamps();
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('period', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('month');
            $table->integer('year');
            $table->timestamps();
        });

        Schema::create('sale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale');
            $table->integer('profit');
            $table->integer('period_id');
            $table->integer('location_id');
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industry');
        Schema::dropIfExists('location');
        Schema::dropIfExists('product');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('period');
        Schema::dropIfExists('sale');
    }
}
