<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandApiController extends Controller
{

    public function show($id) {
       return is_numeric($id) ? Brand::find($id) : Brand::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($id)])->first();
    }

}
