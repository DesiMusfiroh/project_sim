<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Order;
use App\OrderDetail;


class OrderDetail extends Model
{
    protected $guarded = [];
    public function products() 
    {
        return $this->belongsTo(Product::class);
    }
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
