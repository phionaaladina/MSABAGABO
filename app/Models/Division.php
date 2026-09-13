<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Division extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'tagline',
        'image',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::saving(function (Division $division) {
            if (blank($division->slug) && filled($division->name)) {
                $division->slug = Str::slug($division->name);
            }
        });
    }
}
