<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMeta
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index() {
        return Product::all();
    }

    public function create() {
        request()->validate([
            'product_name' => 'required',
            'original_price' => 'required',
        ]);

        return Post::create([
            'product_name' => request('product_name'),
            'original_price' => request('original_price'),
        ]);
    }

    public function update(Post $product) {
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

    public function delete(Post $product) {
        $success = $product->delete();

        return [
            'success' => $success
        ];
    }

}
