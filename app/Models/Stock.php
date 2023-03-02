<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'cat_id', 
        'product_code', 
        'product_name',
        'product_type',
        'product_howmanyNumber',
        'product_howmanyGr',
        'product_howmanyL',
        'p_color',
        'p_size',
        'price',
        'p_photo',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'product_id');
    }
}
