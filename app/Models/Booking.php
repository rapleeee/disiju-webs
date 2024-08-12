<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'event_place',
        'phone',
        'booking_date',
        'size',
        'price',
        'status',
        'date',
        'status',
        'bukti_transfer',
        'status_bukti_transfer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
