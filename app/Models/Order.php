<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'event_title',
        'amount',
        'quantity',
        'payment_status',
        'transaction_id',
        'payment_method',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
