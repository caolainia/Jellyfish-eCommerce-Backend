<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function getBrands()
    {
        return $this->belongsToMany(Brand::class, 'product_brand');
    }

    public function getColors()
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
     * JF . firstUpChar($gender) . ASCII of first2UpChar($brand) . 4digit(7*$categoryId + $id)
     * @param int $id, int $categoryId, string $brand, int $gender
     * @return string $sku
     */
    public function generateSku($id, $categoryId, $brand, $gender) {
        $genderChar = 'N';
        if ($gender == 0) {
            $genderChar = 'F';
        } else if ($gender == 1) {
            $genderChar = 'M';
        } else if ($gender == 3) {
            $genderChar = 'K';
        }


        return $sku;
    }
}
