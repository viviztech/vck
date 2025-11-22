<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bearer extends Model
{
    protected $fillable = [
        'post_id',
        'assembly_id',
        'name_ta',
        'name_en',
        'content_ta',
        'content_en',
        'slug',
        'photo',
        'facebook',
        'x',
        'instagram',
        'youtube',
    ];

    /**
     * Get the photo URL attribute
     */
    public function getPhotoUrlAttribute()
    {
        if (!$this->photo) {
            return null;
        }

        return Storage::disk('public')->url($this->photo);
    }

    public function post()
    {
        return $this->belongsTo(\App\Models\Post::class);
    }

    public function assembly()
    {
        return $this->belongsTo(\App\Models\Assembly::class);
    }
}
