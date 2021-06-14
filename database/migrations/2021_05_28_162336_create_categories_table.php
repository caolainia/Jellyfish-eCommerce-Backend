<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("parent_id")->nullable(true);
            $table->string("name");
        });

        // Insert Categories
        DB::table('categories')->insert(
            [
                ['parent_id' => null, 'name' => 'Bags'], 
                ['parent_id' => null, 'name' => 'Clothing'],
                ['parent_id' => null, 'name' => 'Shoes'],
                ['parent_id' => null, 'name' => 'Jewelry'],
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
        Schema::dropIfExists('categories');
    }
}
