<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','order_id','hu_qty','price','subtotal'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
     public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

}
