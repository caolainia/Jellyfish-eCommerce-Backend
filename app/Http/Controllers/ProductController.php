<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\ProductImage;
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
        $products = Product::latest()->paginate(30);

        return view('products.index')->with(compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();
        return view('products.create', ['brands' => $brands, 'colors' => $colors]);
    }

    public function store()
    {

        $data = request()->validate([
            'pname' => 'required',
            'pgender' => 'required',
            'pbrand' => 'required',
            'pcolor' => 'required',
            'poprice' => 'required',
            'pcprice' => 'required',
        ]);

        if ( request('pthumbnail') !== null ) {
            $imagePath = request('pthumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
            $image->save();
        } else {
            $imagePath = "image404.png";
        }

        $desc = isset($data['pdescription']) ? $data['pdescription'] : null;

        $product = Product::create([
            'product_name' => $data['pname'],
            'gender' => $data['pgender'],
            'original_price' => $data['poprice'],
            'current_price' => $data['pcprice'],
            'description' => $desc,
            'thumbnail' => $imagePath,
        ]);

        $pid = $product->id;
        $brand = Brand::find($data['pbrand']);
        $brand->getProducts()->attach($pid);
        $product->getBrands()->attach($brand->id);

        $color = Color::find($data['pcolor']);
        $color->getProducts()->attach($pid);
        $product->getColors()->attach($color->id);

        return redirect('/products');
    }

    public function show(Product $product)
    {
        $thumbnail = "/storage/image404.png";
        // image existence checking
        if (isset($product->thumbnail) && $product->thumbnail != null) {
            // if it's url
            if ( preg_match('/http.*?:\/\//', $product->thumbnail) ) {
                $thumbnail = $product->thumbnail;
            } else {
                $thumbnail = "/storage/" . $product->thumbnail;
            }
        }

        $gender = 'Unisex';
        if ($product->gender == 0) {
            $gender = 'Female';
        } else if ($product->gender == 1) {
            $gender = 'Male';
        } else if ($product->gender == 3) {
            $gender = 'Kids';
        }

        $data = [ 
            'thumbnail' => $thumbnail, 
            'gender' => $gender
        ];
        return view('products.show', compact('product'))->with($data);
    }
}
