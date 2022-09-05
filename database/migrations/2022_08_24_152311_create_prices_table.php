<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('prices', function (Blueprint $table) {
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products');
                $table->integer('price_sale')->default(0);
                $table->integer('price_buy')->default(0);
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
        Schema::dropIfExists('prices');
    }
};
