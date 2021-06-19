<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionApiController extends Controller
{

    public function create() {
        return Transaction::create([
            'transaction_id' => uniqid(mt_rand(), false)
        ]);
    }

}
