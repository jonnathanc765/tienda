<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceDetail;

class InvoiceDetailController extends Controller
{
    public function destroy(InvoiceDetail $detail)
    {
        $detail->delete();
        return redirect()->route('invoice.index');
    }
}
