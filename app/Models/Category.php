<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function series()
    {
        return $this->hasMany(Series::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'category_brand');
    }
}
