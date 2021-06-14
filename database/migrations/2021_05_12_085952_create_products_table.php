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
            $table->char('sku', 11)->unique()->nullable(true);
            $table->string('product_name', 200);
            $table->tinyInteger('gender')->comment('0:f, 1:m, 2:neutral, 3:kids')->default(2);
            $table->unsignedBigInteger('category_id')->default(3)->comment("deepest category id");
            $table->unsignedSmallInteger('original_price')->comment('in AUD')->default(0);
            $table->unsignedSmallInteger('current_price')->comment('in AUD')->default(0);
            $table->integer('amt_sold')->default(0);
            $table->integer('amt_viewed')->default(0);
            $table->text('description')->nullable();
            $table->text("thumbnail")->comment("thumbnail image url")->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        $desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";

        // Insert Products
        DB::table('products')->insert(
            [
                ['product_name' => 'Yeezy 350 Blue Tint', 'original_price' => 350, 
                'current_price'=> 250, 'description' => $desc, 'thumbnail' => 'image404.png'],
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
        Schema::dropIfExists('products');
    }
}
