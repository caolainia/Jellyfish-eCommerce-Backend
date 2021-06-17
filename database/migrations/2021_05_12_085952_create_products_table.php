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

        $desc2 = "Virgil Abloh presents a relatively straightforward take on Bruce Kilgore's design with this Off-White x Air Force 1 Low. That isn't to suggest there aren't unique details on the reconstructed build: in addition to a mix of ripstop and suede, the upper features taped seams and a white Swoosh attached via zigzag stitching. Exposed foam and misplaced tags appear on the tongue, while 'LOGO' inscribed on the heel tab delivers a final meta flourish.";

        $desc3 = "The Air Jordan 1 first hit shelves in 1985, altering the footwear game forever 35 years later, the silhouette is back on the scene in high-top form sporting Neutral Grey for the first time since its OG debut. Sneaker historians will be happy to know that this drop arrives with retro packaging—including a throwback hang tag depicting MJ soaring above the Chicago skyline.";

        $desc45 = "Deriving from Supreme’s 2003 Dunk High collaboration, the Supreme x Nike SB Dunk Low Stars Collection includes four colorways of the model done in your choice of Hyper Blue, Mean Green, Black, and Barkroot Brown. Each pair flaunts the distinct gold stars print pattern on its side panels, while croc skin overlays further elevate the style. Finally, more gold accents throughout and Supreme lace dubraes, followed by Supreme-branded insoles top off the style.";

        

        $desc6 = "Commemorating the 2012 Doernbecher Freestyle Program, Nike teamed up with the late Isaac Arzate for his own rendition of the Jordan 5. The shoe?s polished black patent leather upper is accented with tonal lettering that stands out under a blacklight. The text displays a poem that Isaac wrote the day before he passed. The sneaker also showcases Isaac's baseball and basketball numbers and incorporates his initials, birthday and date of passing on the tongue tag.";

        $desc7 = "Instantly recognizable by their exaggerated sole, these white and blue tone leather sneakers from Alexander McQueen will take your look to the next level. Featuring a lace-up front fastening, a brand embossed tongue, a printed logo at the back, a round toe and an extended white rubber sole, these sneakers can be worn paired with denim for a low key look or dressed up with a slip dress. Alexander McQueen’s sneakers are a dependable off-duty necessity. Please note that Alexander McQueen’s sneakers no longer come with a dust bag.";

        $desc8 = "Kanye West eschewed traditional construction when he created the adidas Yeezy Boost 350 V2, realizing a forward-thinking aesthetic through his own industrial design approach. This edition—launched in September 2019—utilizes a two-tone Primeknit bootie with select reflectivity and a translucent lateral stripe. Carrying energy-filled Boost technology, its signature sole features a milky translucent finish and a grooved tread.";

        $desc9 = "Yeezy adds to their growing line of 700s with the Yeezy Boost 700 V3 Alvah, now available. The third incarnation of the Yeezy Boost 700 is one of the most sophisticated designs we’ve seen from the ongoing collaborations, playing with shape, line, texture, and even expectations. The outer shell is reminiscent of of race car and an astronaut’s suit with a sole unit that feels progressive and substantial. \n 
            This 700 V3 is composed of a black and grey upper composed of monofilament engineered mesh with RPU overlays for structure and durability. The RPU cage has glow-in-the-dark features, along with 3M reflective detailing on the toe. The EVA midsole and herringbone rubber outsole completes the design. These sneakers released in February of 2020 and retailed for $200. \n
            STYLE H67799
            COLORWAY ALVAH/ALVAH/ALVAH
            RETAIL PRICE $200
            RELEASE DATE 04/11/2020";

        $desc10 = "The Ultra Boost 3.0 'Core Black' was designed with cutting-edge performance enhancements. The runner sports a Core Black Primeknit upper with a wrap-around tongue and a sock-like collar for a secure fit. The sneaker also sports a Torsion system for added support, a four-way engineered stretch-mesh heel for a foot-hugging fit, an S-Curve heel counter, and a full Boost midsole with energy-returning properties.";

        $img1 = "https://chanzsneakers.ru/wp-content/uploads/2021/01/1_-_31122020_-_Nike__Air__Force__1__Low__What__The__NYC.jpg";

        $img2 = "https://chanzsneakers.ru/wp-content/uploads/2021/01/2_-_31122020_-_Air__Force__1__Low__Off-White__Black__White.jpeg";

        $img3 = "https://chanzsneakers.ru/wp-content/uploads/2021/05/29.jpg";
        $img4 = "https://chanzsneakers.ru/wp-content/uploads/2021/05/2-1.jpg";
        $img5 = "https://chanzsneakers.ru/wp-content/uploads/2021/05/2-2.jpg";
        $img6 = "https://chanzsneakers.ru/wp-content/uploads/2021/01/1_-_31122020_-_Air__Jordan__5__Retro__DB__Doernbecher.png";
        $img7 = "https://chanzsneakers.ru/wp-content/uploads/2021/01/1_-_31122020_-_Alexander__McQUEEN__Oversized__Sneaker__White__Smooth__Calf__Leather__Worker__Blue__Suede__Heel.jpg";
        $img8 = "https://chanzsneakers.ru/wp-content/uploads/2021/01/1_-_31122020_-_Adidas__Yeezy__Boost__350__V2__Clowrf.jpg";
        $img9 = "https://chanzsneakers.ru/wp-content/uploads/2020/06/1.jpg";
        $img10 = "https://chanzsneakers.ru/wp-content/uploads/2021/01/1_-_31122020_-_Adidas__Ultra__Boost__3.0__Core__Black.png";

        // Insert Products
        DB::table('products')->insert(
            [
                ['product_name' => 'Nike Air Force 1 Low \'What The NYC\'', 'category_id' => 1, 
                'brand_id' => 3, 'series_id' => 40, 'original_price' => 140, 'current_price'=> 140, 
                'description' => $desc1, 'thumbnail' => $img1],
                ['product_name' => 'Air Force 1 Low Off-White Black White', 'category_id' => 1, 
                'brand_id' => 3, 'series_id' => 40, 'original_price' => 128, 'current_price'=> 128, 
                'description' => $desc2, 'thumbnail' => $img2],

                ['product_name' => 'Air Jordan 1 High 85 Neutral Grey', 'category_id' => 1, 
                'brand_id' => 2, 'series_id' => 3, 'original_price' => 200, 'current_price'=> 200, 
                'description' => $desc3, 'thumbnail' => $img3],
                ['product_name' => 'Supreme X Nike SB Dunk Low Mean Green', 'category_id' => 1, 
                'brand_id' => 3, 'series_id' => 43, 'original_price' => 110, 'current_price'=> 110, 
                'description' => $desc45, 'thumbnail' => $img4],
                ['product_name' => 'Supreme X Nike SB Dunk Low Hyper Blue', 'category_id' => 1, 
                'brand_id' => 3, 'series_id' => 43, 'original_price' => 110, 'current_price'=> 110, 
                'description' => $desc45, 'thumbnail' => $img5],

                ['product_name' => 'Air Jordan 5 Retro DB ‘Doernbecher’', 'category_id' => 1, 
                'brand_id' => 2, 'series_id' => 7, 'original_price' => 128, 'current_price'=> 128, 
                'description' => $desc6, 'thumbnail' => $img6],
                ['product_name' => 'Alexander McQUEEN Oversized Sneaker White Smooth Calf Leather Worker Blue Suede Heel', 'category_id' => 1, 
                'brand_id' => 4, 'series_id' => null, 'original_price' => 140, 'current_price'=> 140, 
                'description' => $desc7, 'thumbnail' => $img7],
                ['product_name' => 'Adidas Yeezy Boost 350 V2 Clowrf', 'category_id' => 1, 
                'brand_id' => 1, 'series_id' => 1, 'original_price' => 120, 'current_price'=> 120, 
                'description' => $desc8, 'thumbnail' => $img8],
                ['product_name' => 'adidas Yeezy 700 V3 Alvah', 'category_id' => 1, 
                'brand_id' => 1, 'series_id' => 1, 'original_price' => 130, 'current_price'=> 130, 
                'description' => $desc9, 'thumbnail' => $img9],
                ['product_name' => 'Adidas Ultra Boost 3.0 Core Black', 'category_id' => 1, 
                'brand_id' => 1, 'series_id' => 2, 'original_price' => 120, 'current_price'=> 120, 
                'description' => $desc10, 'thumbnail' => $img10],

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
