<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

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
}
