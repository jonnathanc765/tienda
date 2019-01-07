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
            'quantity' => 'integer|min:1|max:5000',
            'value'=> 'min:0.1'
        ],[
            'quantity.integer' => 'La cantidad debe de ser un numero entero',
            'quantity.min' => 'La cantidad debe de ser de al menos 1',
            'quantity.max' => 'La cantidad no es válida'
        ]);

        Product::create($data);
        return redirect()->route('product.index');
    }
    function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
    function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }
    function update(Product $product)
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'integer|min:1|max:5000',
            'value' => 'min:0.1'
        ],[
            'quantity.integer' => 'La cantidad debe de ser un numero entero',
            'quantity.min' => 'La cantidad debe de ser de al menos 1',
            'quantity.max' => 'La cantidad no es válida'
        ]);

        $product->update($data);
        return redirect()->route('product.index');
    }
}
