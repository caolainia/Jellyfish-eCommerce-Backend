<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function productMetas()
    {
        return $this->hasMany(ProductMeta::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Generate Product SKU
     * JF . firstUpChar($gender) . 4d($brandId*157+$id) . 4d(7*$categoryId + $id)
     * @param int $id, int $categoryId, string $brand, int $gender
     * @return string $sku
     */
    public function generateSku($id, $categoryId, $brandId, $gender) {
        $genderChar = 'U';
        if ($gender == 0) {
            $genderChar = 'F';
        } else if ($gender == 1) {
            $genderChar = 'M';
        } else if ($gender == 3) {
            $genderChar = 'K';
        }
        $sku = 'JF' . $genderChar;

        return $sku;
    }
}
