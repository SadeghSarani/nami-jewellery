<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomField extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rel_id', 'key', 'value', 'icon'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'rel_id');
    }
}
