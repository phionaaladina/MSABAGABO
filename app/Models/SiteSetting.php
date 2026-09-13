<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'address',
        'phones',
        'emails',
        'socials',
        'map_embed_url',
        'directions_url',
        'whatsapp_number',
    ];

    protected $casts = [
        'phones' => 'array',
        'emails' => 'array',
        'socials' => 'array',
    ];
}
