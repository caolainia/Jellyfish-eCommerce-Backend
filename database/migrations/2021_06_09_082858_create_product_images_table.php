<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->string("image_url");
        });

        // Insert images
        DB::table('product_images')->insert(
            [
                ['product_id' => 1, 'image_url' => 'image404.png'],
                ['product_id' => 1, 'image_url' => 'image404.png'],
                ['product_id' => 1, 'image_url' => 'image404.png'],
                ['product_id' => 1, 'image_url' => 'image404.png'],
                ['product_id' => 1, 'image_url' => 'image404.png'],
                ['product_id' => 1, 'image_url' => 'image404.png'],
                ['product_id' => 1, 'image_url' => 'image404.png'],
                ['product_id' => 1, 'image_url' => 'image404.png'],
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
        Schema::dropIfExists('product_images');
    }
}
