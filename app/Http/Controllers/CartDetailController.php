<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
use App\Product;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function destroy(CartDetail $detail)
    {
        $detail->delete();
        return redirect()->route('cart.index');
    }
    function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'min:1|integer',
            'product_id' => ''
        ]);

        
        $product = Product::find($data['product_id']);
        if ($product->quantity < $data['quantity']) {
            return redirect()->route('cart.index')->withErrors(['insufficient' => ['Stock Insuficiente']]);
        }


        return redirect()->route('product.index');

    }
}
