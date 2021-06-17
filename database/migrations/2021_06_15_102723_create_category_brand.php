<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_brand', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('name')->nullable(true)->comment('named relationship');
            $table->unsignedSmallInteger('popularity')->default(0);
            $table->unique( array('category_id','brand_id') );
        });

        // Insert Dummy Category Brand Relation
        DB::table('category_brand')->insert(
            [
                ['category_id' => 1, 'brand_id' => 3, 'name' => 'nike_shoes'],
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
        Schema::table('category_brand', function (Blueprint $table) {
            $table->dropForeign('category_brand_category_id_foreign');
            $table->dropColumn('category_id');
            $table->dropForeign('category_brand_brand_id_foreign');
            $table->dropColumn('brand_id');
        });
        Schema::dropIfExists('category_brand');
    }
}
