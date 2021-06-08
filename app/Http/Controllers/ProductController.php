<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMeta;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {

        $data = request()->validate([
            'pname' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        Product::create([
            'product_name' => $data['pname'],
            'product_thumbnail' => $imagePath,
        ]);

        return redirect('/products');
    }

    /**
     * Generate Product SKU
     * JF . firstUpChar($gender) . ASCII of first2UpChar($brand) . 4digit(7*$categoryId + $id)
     * @param int $id, int $categoryId, string $brand, int $gender
     * @return string $sku
     */
    private function generateSku($id, $categoryId, $brand, $gender) {
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

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
