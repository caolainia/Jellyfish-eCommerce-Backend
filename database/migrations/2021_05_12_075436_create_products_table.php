<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jf_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->int('original_price');
            $table->text('product_description');
            $table->int('meta_type')->comment('0(default): retro & vintage; 1: quaint things')->default(0);
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
        Schema::dropIfExists('jf_products');
    }
}
