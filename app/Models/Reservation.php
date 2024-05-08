<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
