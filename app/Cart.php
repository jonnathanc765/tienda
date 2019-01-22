<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\CartDetail;
use DateTime;


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
    function scopeDate($query, $name)
    {
        $now = date('Y-m-d');
        
        if ($name == 'today') {
            $query->where('updated_at', 'LIKE', '%'.$now.'%');
        } elseif ($name == 'yesterday') {
            $now = strtotime ( '-1 day' , strtotime ( $now ) );
            $now = date ( 'Y-m-d' , $now );
            $query->where('updated_at', 'LIKE', '%'.$now.'%');
        } elseif ($name == 'month') {
            $to = strtotime ( '-1 month' , strtotime ( $now ) );
            $to = date ( 'Y-m-d' , $to );
            $now = strtotime ( '+1 day' , strtotime ( $now ) );
            $now = date ( 'Y-m-d' , $now );
            dd($to);
            $query->whereBetween('updated_at', [$to, $now]);
         
        }
    }
    function totalCart()
    {
        $total = 0;
        
        foreach ($this->details() as $detail) {
            $total += $detail->price;
        }
        return $total;
    }
}
