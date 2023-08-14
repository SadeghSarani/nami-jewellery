<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use  SoftDeletes;

    protected $fillable = [
        'product_category_id',
        'product_group_id',
        'fa_name',
        'warranty',
        'images',
        'base_image',
        'description',
        'general_specifications',
        'special_offers',
        'most_sold_products',
        'active'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function productItem()
    {
        return $this->hasMany(ProductItem::class);
    }

    public function customField()
    {
        return $this->hasMany(CustomField::class, 'rel_id', 'id');
    }

    public function invoiceItem()
    {
        return $this->hasOne(InvoiceItem::class);
    }

    public function productGroup()
    {
        return $this->hasOne(ProductGroup::class, 'id', 'product_group_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }
}
