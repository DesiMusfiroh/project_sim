<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Prody;


class Order extends Model
{
    protected $guarded = [];
    
    //MEMBUAT RELASI KE MODEL prody.PHP
    public function prody()
    {
        return $this->belongsTo(Prody::class);
    }
    public function order_details()
    {
    	return $this->hasOne(OrderDetail::class,'order_id');
    }
}
    