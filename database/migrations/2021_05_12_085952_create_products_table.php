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
            $table->char('sku', 11)->unique();
            $table->string('product_name', 200);
            $table->tinyInteger('gender')->comment('suitable gender, 0:f, 1:m, 2:neutral, 3:kids')->default(2);
            $table->string('color', 50)->nullable();
            $table->unsignedBigInteger('category')->default(0)->comment("deepest category id");
            $table->unsignedSmallInteger('original_price')->comment('in AUD')->default(0);
            $table->unsignedSmallInteger('current_price')->comment('in AUD')->default(0);
            $table->integer('amt_sold')->default(0);
            $table->integer('amt_viewed')->default(0);
            $table->text('product_description')->nullable();
            $table->text("product_thumbnail")->comment("thumbnail image url")->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
