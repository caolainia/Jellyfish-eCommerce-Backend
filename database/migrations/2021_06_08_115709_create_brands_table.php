<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        // Insert Brands
        DB::table('brands')->insert(
            [
                ['name' => 'Adidas'], 
                ['name' => 'Air Jordan'],
                ['name' => 'Nike'],
                ['name' => 'Alexander McQueen'],
                ['name' => 'Balenciaga'], 
                ['name' => 'Burberry'],
                ['name' => 'Chanel'],
                ['name' => 'Dior'],
                ['name' => 'Gucci'],
                ['name' => 'Louis Vuitton'], 
                ['name' => 'OFF-WHITE'], 
                ['name' => 'Saint Laurent'],
                ['name' => 'Prada'],
                ['name' => 'Givenchy'],
                ['name' => 'Tom Ford'],
                ['name' => 'Versace'],
                ['name' => 'Hermes'],
                ['name' => 'Goyard'],
                ['name' => 'Artist Merch'], 
                ['name' => 'ASSC'],
                ['name' => 'Bape'],
                ['name' => 'Fear Of God'],
                ['name' => 'Kaws'],
                ['name' => 'Kith'], 
                ['name' => 'Nike Apparel'],
                ['name' => 'Palace'],
                ['name' => 'Superme'],
                ['name' => 'Chrome Hearts'],
                ['name' => 'OVO'], 
                ['name' => 'Noah'],
                
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
        Schema::dropIfExists('brands');
    }
}
