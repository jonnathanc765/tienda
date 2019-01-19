<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\CartDetail;
use App\Product;
use App\Cart;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function destroy(CartDetail $detail)
    {   
        $product = Product::find($detail->product_id);
        $product->update(['quantity'=> $detail->quantity + $product->quantity]);
        $detail->delete();
        return redirect()->route('cart.index');
    }
    
    function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'min:1|integer|required',
            'product_id' => 'exists:products,id|required'
        ],[
            'product_id.required' => 'No hay productos'
        ]);

        if ($this->cart() == null) {
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->status = 'active';
            $cart->save();
        } else {
            $cart = $this->cart();
        }

        
        $product = Product::find($data['product_id']);
        if ($product->quantity < $data['quantity']) {
            return redirect()->route('cart.index')->withErrors(['insufficient'=>'Ya no hay Stock disponible']);
        }

        $product->quantity -= $data['quantity'];
        $product->save();
       
        $detail = CartDetail::where('product_id', $data['product_id'])->where('cart_id',$cart->id)->first();
        
        if ($detail != null) {
            $detail->quantity += $data['quantity'];
            $detail->price += $data['quantity']*$product->price;
            $detail->save();
            return redirect()->route('cart.index');
        }
        
        $detail = new CartDetail;
        $detail->quantity = $data['quantity'];
        $detail->product_id = $data['product_id'];
        $detail->cart_id = $cart->id;
        $detail->price = $data['quantity']*$product->price;
        $detail->save();
        
        return redirect()->back();

    }
    function cart() {
        $user = Auth::user();
        
        foreach ($user->carts as $cart) {
            if ($cart->status == 'active') {
                return $cart;
            }
        }
    }
    function empty()
    {
        foreach ($this->cart()->details as $detail) {
            $product = Product::find($detail->product_id);
            $product->quantity += $detail->quantity;
            $product->save();
            $detail->delete();
        }
        return redirect()->route('cart.index');
    }    
}
