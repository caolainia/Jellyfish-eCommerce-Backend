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
                ['name' => 'Air_Jordan'],
                ['name' => 'Nike'],
                ['name' => 'Alexander_McQueen'],
                ['name' => 'Balenciaga'], 
                ['name' => 'Burberry'],
                ['name' => 'Chanel'],
                ['name' => 'Dior'],
                ['name' => 'Gucci'],
                ['name' => 'Louis_Vuitton'], 
                ['name' => 'OFF_WHITE'], 
                ['name' => 'Saint_Laurent'],
                ['name' => 'Prada'],
                ['name' => 'Givenchy'],
                ['name' => 'Tom_Ford'],
                ['name' => 'Versace'],
                ['name' => 'Hermes'],
                ['name' => 'Goyard'],
                ['name' => 'Artist_Merch'], 
                ['name' => 'ASSC'],
                ['name' => 'Bape'],
                ['name' => 'Fear_Of_God'],
                ['name' => 'Kaws'],
                ['name' => 'Kith'], 
                ['name' => 'Nike_Apparel'],
                ['name' => 'Palace'],
                ['name' => 'Superme'],
                ['name' => 'Chrome_Hearts'],
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
