<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'date_time',
        'venue',
        'price',
        'capacity',
        'image',
    ];

    protected $casts = [
        'date_time' => 'datetime',
        'price'     => 'decimal:2',
        'capacity'  => 'integer',
    ];

    /**
     * ইমেজের সঠিক URL তৈরি করার এক্সেসর
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // যদি আগে থেকেই পূর্ণাঙ্গ URL থাকে
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }
            // যদি লোকাল ফাইল পাথ হয়
            return asset('storage/' . $this->image);
        }

        // ডিফল্ট ইমেজ
        return 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&auto=format&fit=crop&q=80';
    }
}