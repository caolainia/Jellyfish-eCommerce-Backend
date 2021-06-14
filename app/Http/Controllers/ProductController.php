<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
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
        $brands = Brand::all();
        return view('products.create', ['brands' => $brands]);
    }

    public function store()
    {

        $data = request()->validate([
            'pname' => 'required',
            'pgender' => 'required',
            'pbrand' => 'required',
            'poprice' => 'required',
            'pcprice' => 'required',
        ]);

        $imagePath = request('pthumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
        $image->save();


        $product = Product::create([
            'product_name' => $data['pname'],
            'original_price' => $data['poprice'],
            'current_price' => $data['pcprice'],
            'description' => $data['pdescription'],
            'thumbnail' => $imagePath,
        ]);


        return redirect('/products');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
