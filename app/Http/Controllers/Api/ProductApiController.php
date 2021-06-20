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

    public function indexByCategory($cat) {
        $catModel = is_numeric($cat) ? Category::find($cat) : Category::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($cat)])->first();
        return isset($catModel) ?  $catModel->products : [];
    }

    public function popularProductsByCategory($cat, $num) {
        $catModel = is_numeric($cat) ? Category::find($cat) : Category::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($cat)])->first();

        $products = $catModel->products;

        $productsSortedByViews = $products->sortBy('amt_viewed');
        $slicedNum = 5;
        if (isset($num))
            $slicedNum = $num;
        return $productsSortedByViews->slice(0, $slicedNum);
    }

    public function trendingProductsByCategory($cat, $num) {
        $catModel = is_numeric($cat) ? Category::find($cat) : Category::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($cat)])->first();

        $products = $catModel->products;

        $productsSortedByViews = $products->sortBy('amt_viewed');
        $slicedNum = 5;
        if (isset($num))
            $slicedNum = $num;
        return $productsSortedByViews->slice(0, $slicedNum);
    }



    public function indexByBrand($brand) {
        $brandModel = is_numeric($brand) ? Brand::find($brand) : Brand::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($brand)])->first();
        return isset($brandModel) ?  $brandModel->products : [];
    }

    public function indexBySeries($series) {
        $seriesModel = is_numeric($series) ? Series::find($series) : Series::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($series)])->first();
        return isset($seriesModel) ?  $seriesModel->products : [];
    }

    public function show($product) {
        if (is_numeric($product))
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
