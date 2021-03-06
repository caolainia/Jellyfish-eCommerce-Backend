<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_color', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unique( array('product_id','color_id') );
        });

        // Insert Dummy Product Color Relation
        DB::table('product_color')->insert(
            [
                ['product_id' => 1, 'color_id' => 1],
                ['product_id' => 1, 'color_id' => 2],
                ['product_id' => 1, 'color_id' => 3],
                ['product_id' => 1, 'color_id' => 4],
                ['product_id' => 1, 'color_id' => 5],
                ['product_id' => 1, 'color_id' => 6],
                ['product_id' => 2, 'color_id' => 1],
                ['product_id' => 2, 'color_id' => 2],
                
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_color', function (Blueprint $table) {
            $table->dropForeign('product_color_product_id_foreign');
            $table->dropColumn('product_id');
            $table->dropForeign('product_color_color_id_foreign');
            $table->dropColumn('color_id');
        });
        Schema::dropIfExists('product_color');
    }
}
