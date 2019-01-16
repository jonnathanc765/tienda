<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    function destroy(CartDetail $detail)
    {
        $detail->delete();
        return redirect()->route('cart.index');
    }
}
