<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function series()
    {
        return $this->hasMany(Series::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_brand');
    }
}
