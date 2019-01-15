<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartDetailController extends Controller
{
    function product()
    {
        $this->belongsTo(Product::class);
    }
}
