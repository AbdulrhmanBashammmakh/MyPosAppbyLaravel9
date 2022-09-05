<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 	'cust_id'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'cust_id','id');
    }
}
