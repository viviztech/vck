<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image',
        'slug',
        'is_active',
        'sort_order',
        'price',
        'stock',
        'is_available'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_available' => 'boolean',
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($book) {
            if (empty($book->slug)) {
                $book->slug = Str::slug($book->title);
            }
        });

        static::updating(function ($book) {
            if ($book->isDirty('title') && empty($book->slug)) {
                $book->slug = Str::slug($book->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }


    public function orders()
    {
        return $this->hasMany(BookOrder::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)
                     ->where('is_active', true)
                     ->where('stock', '>', 0);
    }
}
