<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\ProductMeta;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index() {
        $products = Product::all();
        return Product::all();
    }

    public function indexByBrand($brand_name) {
        $brand = Brand::where('name', '=', $brand_name)->first();
        $products = $brand->products;
        return $products;
    }

    public function show(Product $product) {
        return Product::find($product);
    }

    public function create(Product $product) {
        request()->validate([
            'product_name' => 'required',
            'original_price' => 'required',
        ]);

        return Post::create([
            'product_name' => request('product_name'),
            'original_price' => request('original_price'),
        ]);
    }

    public function update(Product $product) {
        request()->validate([
            'product_name' => 'required',
            'original_price' => 'required',
        ]);

        $success = $product->update([
            'product_name' => request('product_name'),
            'original_price' => request('original_price'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function delete(Product $product) {
        $success = $product->delete();

        return [
            'success' => $success
        ];
    }

}
