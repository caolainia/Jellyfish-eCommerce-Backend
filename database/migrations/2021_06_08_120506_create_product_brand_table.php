<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_brand', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->unique( array('product_id','brand_id') );
        });

        // Insert Dummy Relation
        DB::table('product_brand')->insert(
            [
                ['product_id' => 1, 'brand_id' => 3],
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
        Schema::table('product_brand', function (Blueprint $table) {
            $table->dropForeign('product_brand_product_id_foreign');
            $table->dropColumn('product_id');
            $table->dropForeign('product_brand_brand_id_foreign');
            $table->dropColumn('brand_id');
        });
        Schema::dropIfExists('product_brand');
    }
}
