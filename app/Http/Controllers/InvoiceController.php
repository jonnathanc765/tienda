<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Product;

class InvoiceController extends Controller
{
    function index()
    {
        $invoice = Invoice::all()->first();
        $products = Product::where('quantity', '>', '0')->get();
        // dd($products);
        // dd($invoice->details->product);
        return view('invoice.index', compact('invoice','products'));
    }
}
