<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'phone_number',
        'date',
        'time',
        'number_of_people',
        'table_number',
        'notes',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
