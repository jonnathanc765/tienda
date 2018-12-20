<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
    function create()
    {
        return view('product.create');
    }
    function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'integer|min:1|max:5000'
        ]);

        Product::create($data);
        return redirect()->route('product.index');
    }
}
