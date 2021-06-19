<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index() {
        $products = Product::all();
        return Product::all();
    }

    public function indexByCategory($id) {
        $category = is_numeric($id) ? Category::find($id) : Category::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($id)])->first();
        return $category->products;
    }

    public function indexByBrand($id) {
        $brand = is_numeric($id) ? Brand::find($id) : Brand::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($id)])->first();
        return $brand->products;
    }

    public function indexBySeries($id) {
        $series = is_numeric($id) ? Series::find($id) : Series::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($id)])->first();
        return $series->products;
    }

    public function show(Product $product) {
        return Product::find($product);
    }

    public function create() {
        request()->validate([
            'product_name' => 'required',
            'original_price' => 'required',
        ]);

        return Product::create([
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
