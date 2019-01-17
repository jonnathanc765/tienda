<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartDetail extends Model
{
    
    protected $fillable = ['id', 'quantity', 'product_id'];

    function product()
    {
        return $this->belongsTo(Product::class);
    }
}
