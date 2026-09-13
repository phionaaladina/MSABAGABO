<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsUpdate extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'published_date',
        'image',
        'body',
        'external_url',
        'is_published',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (NewsUpdate $newsUpdate) {
            if (blank($newsUpdate->slug) && filled($newsUpdate->title)) {
                $newsUpdate->slug = Str::slug($newsUpdate->title);
            }
        });
    }
}
