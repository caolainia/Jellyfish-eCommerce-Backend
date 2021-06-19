<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("hex");
        });

        // Insert Colors
        DB::table('colors')->insert(
            [
                ['name' => 'Black', 'hex' => '#000000'],
                ['name' => 'White', 'hex' => '#FFFFFF'],
                ['name' => 'Red', 'hex' => '#FF0000'],
                ['name' => 'Green', 'hex' => '#00FF00'],
                ['name' => 'Blue', 'hex' => '#0000FF'],
                ['name' => 'Yellow', 'hex' => '#FFFF00'],
                ['name' => 'Cyan', 'hex' => '#00FFFF'],
                ['name' => 'Magenta', 'hex' => '#FF00FF'],
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
        Schema::dropIfExists('colors');
    }
}
