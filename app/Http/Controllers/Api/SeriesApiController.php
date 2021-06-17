<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesApiController extends Controller
{

    public function show($id) {
        return is_numeric($id) ? Series::find($id) : Series::whereRaw("UPPER(`name`) LIKE ?", [strtoupper($id)])->first();
    }

}
