<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 	'name' ,	'details' ,	'code' 	,'barcode','cata_id','unit_id'
    ];

    protected $hidden = [
        'created_at', 	'updated_at'
    ];

    public function category()
    {
return $this->belongsTo(Category::class,'cata_id','id');
    }
    public function unit()
    {
return $this->belongsTo(Unit::class,'unit_id','id');
    }
}
