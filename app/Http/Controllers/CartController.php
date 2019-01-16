<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    function index()
    {   
        $cart = Cart::where('status', '=', 'active')->get();
        dd($cart);
        return view('cart.index', compact('cart'));
    }
}
