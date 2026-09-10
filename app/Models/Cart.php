<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'event_title',
        'event_image',
        'location',
        'ticket_tier',
        'quantity',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
