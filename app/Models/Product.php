<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'price',
        'is_discount',
        'discount_price',
        'is_available',
        'offer_expires_at',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function getFinalPriceAttribute()
    {
        return $this->is_discount && $this->discount_price
            ? $this->discount_price
            : $this->price;
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : 'https://via.placeholder.com/150';
    }

    protected $casts = [
        'offer_expires_at' => 'datetime',
        'is_discount' => 'boolean',
        'is_available' => 'boolean',
    ];
}
