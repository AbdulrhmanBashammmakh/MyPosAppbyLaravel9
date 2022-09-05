<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 	'price_sale','price_buy'
    ];

    protected $hidden = [
        'created_at', 	'updated_at'
    ];


    public function product()
    {
        return $this->hasOne(Product::class,'product_id','id');
    }
}
