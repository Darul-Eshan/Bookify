<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'category_id',
        'description',
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

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }

            return asset('storage/' . $this->image);
        }

        return 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&auto=format&fit=crop&q=80';
    }

    /**
     * Event belongs to a Category
     */
    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}