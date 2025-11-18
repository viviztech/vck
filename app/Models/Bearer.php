<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function post()
    {
        return $this->belongsTo(\App\Models\Post::class);
    }

    public function assembly()
    {
        return $this->belongsTo(\App\Models\Assembly::class);
    }
}
