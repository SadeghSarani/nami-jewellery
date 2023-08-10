<?php

namespace App\Models;

use App\Observers\InvoiceObserve;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'status',
        'user_id',
    ];

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public static function boot()
    {
        parent::boot();

       Invoice::observe(InvoiceObserve::class);
    }

    public function order()
    {
        $this->hasOne(Order::class);
    }

    public function user()
    {
      return $this->hasOne(User::class, 'id', 'user_id');
    }
}
