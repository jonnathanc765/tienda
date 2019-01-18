<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    function index()
    {   
        $cart = Cart::where('status', '=', 'active')->first();
        $total = 0;
        foreach ($cart->details as $detail) {
            $total += $detail->price;
        }
        $products = Product::all();
        return view('cart.index', compact('cart','products', 'total'));
    }
}
