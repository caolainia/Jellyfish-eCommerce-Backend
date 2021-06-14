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
                ['name' => 'Adidas'], ['name' => 'Nike'],['name' => 'Yeezy'], ['name' => 'Air Jordan'],
                ['name' => 'Balenciaga'], ['name' => 'Gucci'],['name' => 'Louis Vuitton'], 
                ['name' => 'Alexander McQueen'], ['name' => 'Yves Saint Laurent'], 
                ['name' => 'Dior'],['name' => 'Prada'], ['name' => 'Givenchy'],
                ['name' => 'Tom Ford'], ['name' => 'Burberry'],['name' => 'Hermes'],
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
