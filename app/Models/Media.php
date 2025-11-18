<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = [
        'category_id',
        'title_ta',
        'title_en',
        'slug',
        'content_ta',
        'content_en',
        'featured_image',
        'event_date',
        'more_photos',
        'video_link',
    ];

    protected $casts = [
        'more_photos' => 'array',
        'event_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
