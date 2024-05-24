<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
    ];
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

}
