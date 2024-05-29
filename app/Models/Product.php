<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'price',
        'description',
        'status',
        'image',
    ];

    /**
     * Status produk yang tersedia.
     */
    const AVAILABLE = 'available';

    /**
     * Status produk yang habis.
     */
    const OUT_OF_STOCK = 'out_of_stock';

    /**
     * Mendapatkan label status produk.
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        return $this->status == self::AVAILABLE ? 'Tersedia' : 'Habis';
    }


    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
