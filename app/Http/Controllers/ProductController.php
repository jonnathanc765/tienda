<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        $products = Product::where('id', '>', 0)->paginate(20);
        return view('product.index', compact('products'));
    }
    function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
    function create()
    {
        return view('product.create');
    }
    function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => '',
            'price' => 'numeric|required|min:1',
            'quantity' => 'integer|min:1|max:5000'
        ]);

        Product::create($data);
        return redirect()->route('product.index');
    }
    function destroy(Product $product)
    {
        $product->delete();
        $products = Product::all();
        return $products;
    }
    function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }
    function update(Product $product)
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => '',
            'price' => 'numeric|required|min:1',
            'quantity' => 'integer|min:1|max:5000'
        ]);

        $product->update($data);
        return redirect()->route('product.index');
    }
}
