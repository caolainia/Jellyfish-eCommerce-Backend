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
                ['name' => 'adidas'], ['name' => 'nike'],['name' => 'yeezy'], ['name' => 'air jordan'],
                ['name' => 'balenciaga'], ['name' => 'gucci'],['name' => 'louis vuitton'], 
                ['name' => 'yves saint laurent'], 
                ['name' => 'dior'],['name' => 'prada'], ['name' => 'givenchy'],
                ['name' => 'tom ford'], ['name' => 'burberry'],['name' => 'hermes'],
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
