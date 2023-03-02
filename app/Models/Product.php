<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'p_rice',
        'status',
        'product_desc',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class,'product_id');
    }
}
