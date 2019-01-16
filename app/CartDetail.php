<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartDetail extends Model
{
    function product()
    {
        return $this->belongsTo(Product::class);
    }
}
