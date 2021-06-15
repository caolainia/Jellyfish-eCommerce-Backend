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
            $table->tinyInteger('gender')->comment('0:f, 1:m, 2:unisex, 3:kids')->default(2);
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('brand_id')->default(1);
            $table->unsignedBigInteger('series_id')->nullable(true);
            $table->unsignedSmallInteger('original_price')->comment('in AUD')->default(0);
            $table->unsignedSmallInteger('current_price')->comment('in AUD')->default(0);
            $table->integer('amt_sold')->default(0);
            $table->integer('amt_viewed')->default(0);
            $table->text('description')->nullable();
            $table->text("thumbnail")->comment("thumbnail image url")->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        $desc1 = "Just like the LA version, the Nike Air Force 1 Low What The NYC comes dressed in a What The theme that consists of a plethora of colors used on the city’s major sports teams. Not only does it come dressed in an array of colors, the shoe also comes constructed out of a mix of leather, suede, denim and basketball synthetic rubber on the right shoe’s heel tab. Adding to the NY theme is the “New York” printed on the heel and insoles. A Black and White midsole along with a semi-translucent outsole round out the main features of the shoe.";

        $desc2 = "Virgil Abloh presents a relatively straightforward take on Bruce Kilgore's design with this Off-White x Air Force 1 Low. That isn't to suggest there aren't unique details on the reconstructed build: in addition to a mix of ripstop and suede, the upper features taped seams and a white Swoosh attached via zigzag stitching. Exposed foam and misplaced tags appear on the tongue, while 'LOGO' inscribed on the heel tab delivers a final meta flourish."

        // Insert Products
        DB::table('products')->insert(
            [
                ['product_name' => 'Nike Air Force 1 Low \'What The NYC\'', 'category_id' => 1, 
                'brand_id' => 3, 'series_id' => 42, 'original_price' => 140, 'current_price'=> 140, 
                'description' => $desc1, 
                'thumbnail' => 'https://chanzsneakers.ru/wp-content/uploads/2021/01/1_-_31122020_-_Nike__Air__Force__1__Low__What__The__NYC.jpg'],
                ['product_name' => 'Air Force 1 Low Off-White Black White', 'category_id' => 1, 
                'brand_id' => 3, 'series_id' => 42, 'original_price' => 128, 'current_price'=> 128, 
                'description' => $desc2, 
                'thumbnail' => 'https://chanzsneakers.ru/wp-content/uploads/2021/01/2_-_31122020_-_Air__Force__1__Low__Off-White__Black__White.jpeg'],
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
