<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'color', 'code_color','price', 'quantity', 'discount_percent'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function InvoiceItem()
    {
        return $this->hasOne(InvoiceItem::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
