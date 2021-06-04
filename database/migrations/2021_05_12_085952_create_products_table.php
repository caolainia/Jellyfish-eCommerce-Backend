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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // SKU formula: (different color must have diff sku)
            // J{S(hoes), C(lothes), P(ants), B(ag)}
            // -{Category Chain: Gender(1d)+}
            // -{1000-id+id%13}
            $table->char('sku', 13)->unique()->nullable();
            $table->string('product_name', 200);
            $table->integer('gender')->comment('suitable gender, 0:f, 1:m, 2:neutral, 3:kids')->default(2);
            $table->string('brand', 50)->default('Adidas');
            $table->string('color', 50);
            $table->integer('category')->default(0)->comment("deepest category id");
            $table->integer('original_price')->comment('in AUD')->default(0);
            $table->integer('current_price')->comment('in AUD')->default(0);
            $table->integer('amt_sold')->default(0);
            $table->integer('amt_viewed')->default(0);
            $table->text('product_description')->nullable();
            $table->text("product_thumbnail")->comment("thumbnail image url")->nullable();
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
        Schema::dropIfExists('products');
    }
}
