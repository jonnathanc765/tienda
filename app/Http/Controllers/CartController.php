<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {   
        $cart = Cart::where('status', '=', 'active')->first();
        if ($cart == null) {
            $cart = new Cart;
            $cart->status = 'active';
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        $total = 0;
        foreach ($cart->details as $detail) {
            $total += $detail->price;
        }
        $products = Product::all();
        return view('cart.index', compact('cart','products', 'total'));
    }
    function check()
    {
        $user = Auth::user();
        $total = 0;
        
        foreach ($user->carts as $carts) {
            if ($carts->status == 'active') {
                
                foreach ($carts->details as $detail) {
                    $total += $detail->price;
                }
                

                $carts->status = 'check';
                $carts->save();

                return view('cart.check', compact('carts','total'));
            }
        }
        
    }
}