<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartDetails;


class Cart extends Model
{
    function details()
    {
        return $this->hasMany(CartDetails::class);
    }
}
