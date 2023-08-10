<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_item_id',
        'user_id',
        'count'
    ];

    public function productItem()
    {
        return $this->belongsTo(ProductItem::class);
    }
}
