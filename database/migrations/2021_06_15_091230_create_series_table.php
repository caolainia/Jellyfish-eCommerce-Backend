<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("brand_id");
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger("category_id")->default(1);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string("name");
        });

        // Insert Series
        DB::table('series')->insert(
            [
                // T1 Adidas
                // ['brand_id' => 1, 'name' => 'Ozweego'],
                // ['brand_id' => 1, 'name' => 'Human Race'],
                // ['brand_id' => 1, 'name' => 'Nite Jogger'],
                // ['brand_id' => 1, 'name' => 'Ivy Park'],
                // ['brand_id' => 1, 'name' => 'Raf Simons'],
                ['brand_id' => 1, 'name' => 'Yeezy'],
                ['brand_id' => 1, 'name' => 'Ultra Boost'],
                // ['brand_id' => 1, 'name' => 'NMD'],
                // ['brand_id' => 1, 'name' => 'Iniki'],
                // ['brand_id' => 1, 'name' => 'Stan Smith'],
                // ['brand_id' => 1, 'name' => 'EQT'],
                // ['brand_id' => 1, 'name' => 'Basketball'],
                // ['brand_id' => 1, 'name' => 'Running'],
                // ['brand_id' => 1, 'name' => 'Skateboarding'],
                // ['brand_id' => 1, 'name' => 'Soccer'],
                // ['brand_id' => 1, 'name' => 'Other'],
                // T1 AJ
                ['brand_id' => 2, 'name' => '1'],
                ['brand_id' => 2, 'name' => '2'],
                ['brand_id' => 2, 'name' => '3'],
                ['brand_id' => 2, 'name' => '4'],
                ['brand_id' => 2, 'name' => '5'],
                ['brand_id' => 2, 'name' => '6'],
                ['brand_id' => 2, 'name' => '7'],
                ['brand_id' => 2, 'name' => '8'],
                ['brand_id' => 2, 'name' => '9'],
                ['brand_id' => 2, 'name' => '10'],
                ['brand_id' => 2, 'name' => '11'],
                ['brand_id' => 2, 'name' => '12'],
                ['brand_id' => 2, 'name' => '13'],
                ['brand_id' => 2, 'name' => '14'],
                ['brand_id' => 2, 'name' => '15'],
                ['brand_id' => 2, 'name' => '16'],
                ['brand_id' => 2, 'name' => '17'],
                ['brand_id' => 2, 'name' => '18'],
                ['brand_id' => 2, 'name' => '19'],
                ['brand_id' => 2, 'name' => '20'],
                ['brand_id' => 2, 'name' => '21'],
                ['brand_id' => 2, 'name' => '22'],
                ['brand_id' => 2, 'name' => '23'],
                ['brand_id' => 2, 'name' => '24'],
                ['brand_id' => 2, 'name' => '25'],
                ['brand_id' => 2, 'name' => '26'],
                ['brand_id' => 2, 'name' => '27'],
                ['brand_id' => 2, 'name' => '28'],
                ['brand_id' => 2, 'name' => '29'],
                ['brand_id' => 2, 'name' => '30'],
                ['brand_id' => 2, 'name' => '31'],
                ['brand_id' => 2, 'name' => '32'],
                ['brand_id' => 2, 'name' => '33'],
                ['brand_id' => 2, 'name' => '34'],
                ['brand_id' => 2, 'name' => '35'],
                // T1 Nike
                // ['brand_id' => 3, 'name' => 'Foamposite'],
                // ['brand_id' => 3, 'name' => 'KD'],
                ['brand_id' => 3, 'name' => 'Kobe'],
                ['brand_id' => 3, 'name' => 'LeBron'],
                ['brand_id' => 3, 'name' => 'Air Force'],
                ['brand_id' => 3, 'name' => 'Air Max'],
                ['brand_id' => 3, 'name' => 'Basketball'],
                ['brand_id' => 3, 'name' => 'SB'],
                // ['brand_id' => 3, 'name' => 'Sacai'],
                // ['brand_id' => 3, 'name' => 'Presto'],
                // ['brand_id' => 3, 'name' => 'Cortez'],
                // ['brand_id' => 3, 'name' => 'Fear Of God'],
                // ['brand_id' => 3, 'name' => 'OBJ'],
                // ['brand_id' => 3, 'name' => 'Huarache'],
                // ['brand_id' => 3, 'name' => 'Daybreak'],
                // ['brand_id' => 3, 'name' => 'Yeezy'],
            
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
        Schema::table('series', function (Blueprint $table) {
            $table->dropForeign('series_brand_id_foreign');
            $table->dropColumn('brand_id');
        });
        Schema::dropIfExists('series');
    }
}
