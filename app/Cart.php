<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\CartDetail;


class Cart extends Model
{
    function details()
    {
        return $this->hasMany(CartDetail::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
